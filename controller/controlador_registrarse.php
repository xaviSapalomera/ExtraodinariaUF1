<?php
// Xavi Gallego Palau


$emailValidad = null;
    include './model/model_usuaris.php';

// Funcio per crear un usuari
function registrarse($nom,$cognom,$dni,$nickname,$email,$contrasenya,$recontrasenya){

    if(isset($_POST['nom']) && isset($_POST["cognom"]) && isset($_POST['dni']) && isset($_POST["email"]) && isset($_POST['contrasenya'])){

        if($contrasenya !== $recontrasenya){
            echo 'Les contrasenyes no coencideixen';
            return;
        }

        $contrasenya = $_POST['contrasenya'];

        $contrasenya_hash = hash('sha256', $contrasenya);

        $emailValidad = comprobarEmail($email);

        // Comprobar que el email es unic
        if($emailValidad){
    
            crearUsuari($dni,$nom,$cognom,$nickname,$email,$contrasenya_hash);


            header('Location: index.php?action=login');
    
        }else if (!$emailValidad){
        
            echo '<p style="text-align: center;">' . 'El usuari ja existeix' . '</p>';

        }
        
    }
    else{
        echo 'Faltan camps per emplenar';
        return;
    }
}
        
// Funcio per comprobar si el usuari existeix
function comprobarEmail($email_POST){


$usuaris = mostrarUsuaris();

        foreach($usuaris as $usuari){
        
            if($usuari['email'] == $email_POST){

                return false;

            }else{

                return true;
                

            }
        
        } 
    } 
?>