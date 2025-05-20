<?php 
//Xavi Gallego Palau

try {
	$connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');

} catch (PDOException $e) {

	die(''. $e->getMessage());

}


//Actualitza el titol del article
function actualitzarperTitol($id_POST, $titol) {
    try {
        $connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');
        $stm = $connexio->prepare("UPDATE articles SET titol = ? WHERE id = ?");
        $stm->execute([$titol, $id_POST]);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

// Funcio per actualitzar el cos
function actualitzarPerCos($id, $cos) {
    try {
        $connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');
        $stm = $connexio->prepare("UPDATE articles SET cos = ? WHERE id = ?");
        $stm->execute([$cos, $id]);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}


//Aquesta funcio serveix per crear Articles.
function introduirArticles($titol, $cos,$data,$userid){


	try{

		$connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');
		
		$insert_Articles = $connexio->prepare('INSERT INTO articles(titol,cos,data,user_id) VALUES (?,?,?,?)');

		$insert_Articles->execute([$titol, $cos,$data,$userid]);

		return true;


	}catch(PDOException $e){
	
		error_log("Error PDO: " . $e->getMessage());
	
	}
}

//Mostra tots els articles
function mostrarTotsArticles(){
	try{
		$connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');

		$stmt = $connexio->prepare('SELECT id,titol,cos FROM articles');
		

		$stmt->execute();

		$resultats = $stmt->fetchAll();

		return $resultats;

	}catch(PDOException $e){

		echo "Error: ". $e->getMessage();
	
	}
}

//Els articles per id
function borrarArticles($id){
	try
	{
		
		$connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');
		
		$stm = $connexio->prepare("DELETE FROM articles WHERE id=?");
		
		$stm->execute(array($id));
	
	}catch (PDOException $e){

		echo "Error " . $e->getMessage();
	
	}
}

// Actualizat el titol i el cos del article
function actualitzarPerTitolICos($id, $titol, $cos) {
    try {
        
        $connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');
        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $connexio->prepare("UPDATE articles SET titol = ?, cos = ? WHERE id = ?");
            $stmt->execute([$titol, $cos, $id]);

            if ($stmt->rowCount() > 0) {
                return true; 
            } else {
                return false; 
            }

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}
