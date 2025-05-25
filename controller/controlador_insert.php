<?php 
// Xavi Gallego Palau


include './model/model_articles.php';
include './model/model_usuaris.php';
session_start();



// Per introduir nous articles
function crearArticle($titol,$cos){

    try{

    if (!isset($_SESSION['correu'])) {
    return 'Sessió no iniciada o usuari no loguejat.';
    }
    
    if(isset($titol) && isset($cos)){
            
        

    // Buscar el usuari a la base de dades amb la session
    $usuari = filtrarUsuariPerCorreu($_SESSION['correu']); 

    if ($usuari) {
        $usuariID = $usuari['id']; 
        $comprovacio = introduirArticles($titol, $cos, date("Y-m-d"),$usuariID);

        if ($comprovacio) {
            return 'Se ha creat el article correctament';
        } else {
            return 'Error al introduir les dades.';
            
        }
    } else {
        return 'Usuari no trobat.';
        
    }
    }else{

        return 'Falten camps';
        
    }
    }catch(Exception $e){
        return 'Error'. $e;
        
    }
}
?>