<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estil/login.css">
    <title>Login</title>
</head>
<body>

<div class="login-container">
    <h2>Iniciar Sesió</h2>

    
    <a href="index.php?action=home" class="boto">HOME</a>
    <a href="index.php?action=registrarse" class="boto">REGISTRARSE</a>

    
    <form action="index.php?action=login" method="post" class="login-form">
        <input type="text" name="correu" placeholder="Correo electrónico" value="<?php echo isset($_POST['correu']) ? htmlspecialchars($_POST['correu']) : ''; ?>" required>
        <br><br>
        <input type="password" name="password" placeholder="Contraseña" required>
        <br><br>
        <input type="submit" name="LOGIN" value="LOGIN" class="button">
    </form>
</div>


</body>
</html>
