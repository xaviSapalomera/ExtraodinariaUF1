<?php

include './model/model_articles.php';

//Actulitza el titol o cos, o els dos a la vegada
function actualitzarArticle($titol,$cos,$id){
    // Si ha introduit el id el guarda en la variable ID
    if (isset($id) && is_numeric($id)) {
        $id = $_POST['id'];
        
        // Si ha introduit el titol i no esta buit
        if (isset($titol) && !empty($titol)) {
            $titol = $_POST['titol'];
            echo 'El titol actualitzat correctament';
            // Actualitza el titol
            actualitzarperTitol($id,$titol);
        }
        // Si ha introduit el cos i no esta buit
        if (isset($cos) && !empty($cos)) {
            $cos = $_POST['cos'];
            echo 'El cos actualitzat correctament';
            // Actualitza el cos
            actualitzarPerCos($id,$cos);
        }
        // Si ha introduit el titol i cos, i no estan buits
        if (isset($titol) && isset($cos) && !empty($titol) && !empty($cos)) {
            
            //Actualitza el titol i el cos
            actualitzarPerTitolICos($id, $titol, $cos);
            echo "Titol i Cos actualitzats correctament.";
        } else {
            echo "El titol o el cos no a sigut introduit";
        }
    } else {
        echo "El id es obligatori";
    }
}




//mostrar tots els articles
function mostrarArticles(){

    
        $articles = mostrarTotsArticles();
    
        
        
             
        foreach ($articles as $article) {
            
            echo '<article style="border: 2px solid black; padding: 30px; border-radius: 30px;">';
            
            echo "<p> ID: " . htmlspecialchars($article['id']) . "</p>";
            
            echo "<p> TITOL: " . htmlspecialchars($article['titol']) . "</p>";
            
            echo "<p> COS: " . htmlspecialchars($article['cos']) . "</p>";

        
            echo '</article>';
        }
    }
?>
