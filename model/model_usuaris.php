<?php

//Per crear usuaris
function crearUsuari($dni,$nom,$cognom,$nickname,$email,$contrasenya){

	try{
		$connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');

		$inserta_Usuaris = $connexio->prepare('INSERT INTO usuaris(dni,nickname,nom,cognom,email,contrasenya) VALUES (?,?,?,?,?,?)');

		$inserta_Usuaris->execute([$dni,$nickname,$nom,$cognom,$email,$contrasenya]);

	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}

}

//Mostrar tots els usuaris
function mostrarUsuaris(){
	try{
		$connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');

		$stmt = $connexio->prepare('SELECT nom,cognom,dni,email,contrasenya FROM usuaris');
		
		$stmt->execute();

		$resultats = $stmt->fetchAll();

		return $resultats;

	}catch(PDOException $e){

		echo "Error: ". $e->getMessage();
	
	}
}
// Funcio per buscar usuari per email i password
function buscarUsuari($email, $password){
	try{
		$connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');
		
		$connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $connexio->prepare('SELECT email, contrasenya FROM usuaris WHERE email = ?');
		
		$stmt->execute([$email]);

		$usuari = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($usuari) {
			
			if ($password == $usuari['contrasenya']) {
				return true;
			} else {
				return false; 
			}
		} else {
			return false; 
		}
		
	} catch(PDOException $e){
		echo "Error: " . $e->getMessage();
		return false;
	}
}

// Funcio per filtrar usuari per correu
function filtrarUsuariPerCorreu($correu) {
    try {
        $connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');
        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $connexio->prepare('SELECT id, email, contrasenya FROM usuaris WHERE email = ?'); 
        $stmt->execute([$correu]);
        
        $usuari = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuari) {
            return $usuari;
        } else {
            return null;
        }
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



?>