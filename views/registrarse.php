<!-- Xavi Gallego -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="./estil/estil.css">
    <link rel="stylesheet" href="./estil/register.css">
</head>
<body>

    <a href="index.php?action=login" class="boto">LOGIN</a>
    <a href="index.php?action=home" class="boto">HOME</a>
    
<form action="index.php?action=registrarse" method="POST">
    <input type="text" name="nom" placeholder="Nom" value="<?php echo isset($_POST['nom'])?>">
    <br><br>
    <input type="text" name="cognom" placeholder="Cognom" value="<?php echo isset($_POST['cognom']); ?>">
    <br><br>
    <input type="text" name="dni" placeholder="Dni" value="<?php echo isset($_POST['dni']); ?>">
    <br><br>
    <input type="text" name="nickname" placeholder="Nickname"value="<?php echo isset($_POST['nickname']); ?>">
    <br><br>
    <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ?>">
    <br><br>
    <input type="password" name="contrasenya" placeholder="Contrasenya" value="">
    <br><br>
    <input type="password" name="recontrasenya" placeholder="Repeteix la contrasenya" value="">
    <br><br>
    <input type="submit" name="Registrarse" value="Registrarse">
    <br>
</form>



    <?php 


        
        include './controller/controlador_registrarse.php';
    ?>

</body>
</html>