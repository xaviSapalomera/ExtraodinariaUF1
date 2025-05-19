<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Articles</title>
    <link rel="stylesheet" href="./estil/delete.css">
    <link rel="stylesheet" href="./style/estil_sesion.css">
    <link rel="shortcut icon" href="icon_dtm.webp" />
</head>
<body>


<form  action="index.php" method="GET">
    <input type="submit" name="action" value="INSERTAR">
</form>

<form action="index.php" method="GET">
    <input type="submit" name="action" value="ACTUALITZAR">
</form>

<form action="index.php" method="GET">
    <input type="submit" action="action" value="HOME">
</form>

  
    <form class="form" action="index.php?action=borrarArticle" method="post">
        
        <input class="input" type="number" name="id" placeholder="ID">
        <br>
        <br>
        <input style="margin-left: 150px; font-size:40px" type="submit" value="BORRAR">
    </form>

 <br>
 <br>
 
<div style="margin-bottom: 250px"></div>


</body>
</html>