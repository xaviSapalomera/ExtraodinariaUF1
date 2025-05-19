<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR ARITCLES</title>
    <link rel="stylesheet" href="./estil/insert.css">
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" />
</head>
<body>    

<form class="boto" action="index.php" method="get">
    <input type="submit" name="action" value="ACTUALITZAR">
</form>

<form class="boto" action="index.php" method="get">
    <input type="submit" name="action" value="ELIMINAR">
</form>

<form class="boto" action="index.php" method="get">
    <input type="submit" name="action" value="home">
</form>

<hr style="width:100%;margin-left:0;margin-top: 0;"> 
<?php
$missatge = $_SESSION['missatge'] ?? null;
unset($_SESSION['missatge']);
?>



    <form class="form" action="index.php?action=crearArticle" method="post">
    
    <input class="input" type="text" name="titol" placeholder="TITOL">
    
    <br>
    <br>
    
    <br>
    
    <textarea class="input" id="cos" name="cos" placeholder="COS" rows="10" cols="50" style="resize: none;"></textarea><br><br>

    <br>
    <br>
<input type="hidden" name="action" value="crearArticle">
<input style="margin-left: 150px; font-size:40px" type="submit" value="Crear Article">

    </form>


</body>
</html>