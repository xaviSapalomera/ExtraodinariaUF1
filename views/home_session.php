
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Articles</title>
    <link rel="stylesheet" href="./estil/estil_sesion.css">
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" />
</head>
<body>

<div class="header">
<form method="get" action="index.php">
    <input type="hidden" name="action" value="logout">
    <button type="submit" class="icon_logout" name="Logout"></button>
</form>

<form  action="index.php" method="GET">
    <input class="boto_header" name="action" type="submit" value="INSERTAR">
</form>

<form action="index.php" method="GET">
    <input class="boto_header" name="action" type="submit" value="ACTUALITZAR">
</form>

<form action="index.php" method="GET">
    <input class="boto_header" name="action" type="submit" value="ELIMINAR">
</form>

<form action="index.php" method="GET">
    <input class="boto_header" name="action" type="submit" value="HOME">
</form>
</div>

<div style="margin-top: 30px">
   
</div>

</body>
</html>