<!-- Xavi Gallego -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALITZAR ARTICLES</title>
    <link rel="stylesheet" href="./estil/update.css">
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" />
</head>
<body>
<header>

<form class="boto" action="index.php" method="GET">
    <input type="submit" name="action" value="INSERTAR">
</form>

<form class="boto" action="index.php" method="GET">
    <input type="submit" name="action" value="ELIMINAR">
</form>

<form class="boto" action="index.php" method="GET">
    <input type="submit" name="action" value="HOME">
</form>
</header>

<hr style="width:100%;text-align:left;margin-left:0;margin-top: 0;"> 
    
<form class="form" action="index.php?action=actualizarArticle" method="post">
    <input class="input" type="number" name="id" placeholder="ID">
    <input class="input" type="text" name="titol" placeholder="TITOL">
    <input class="input" type="text" name="cos" placeholder="COS">
    <input type="submit" value="ACTUALITZAR">
</form>

    <br>

    <br>

    <div style="margin-bottom: 400px"></div>


</body>
</html>