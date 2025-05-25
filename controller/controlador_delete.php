<?php
// Xavi Gallego Palau


include './model/model_articles.php';

//Funcio per borrar el article segun el id de l'article
function borrarArticle($id){
    
    //Si el id a sigut introduit i no buit
    if(isset($id) && !empty($id)){
    borrarArticles($id);
        return "Borrat amb exit";
    }else{
        return "Error al borrar l'article";
    }
}



