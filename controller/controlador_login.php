<?php
// Xavi Gallego Palau


 include './model/model_usuaris.php';


// Funcio per inicia sessio
function logearUsuari($correu, $password) {

        if (empty($correu) || empty($password)) {
            echo "<p style='color:red;'>Tots els camps són obligatoris.</p>";
            return;
        }

        // Hashear la contrasenya
        $contrasenya_hash = hash('sha256', $password);

        // Verificar login
        $loginVerificat = verificarLogin($correu, $contrasenya_hash);
        functionVerificarConta($loginVerificat, $correu);
    }

// Funcio per verificar el Login
function verificarLogin($correu, $password) {
        $usuari = buscarUsuari($correu, $password);
        return !empty($usuari);
    }

// Funcio si el login es correcte obte les Sessiones necesaries
function functionVerificarConta($loginVerificat, $correu) {
        if (!$loginVerificat) {
            echo '<p style="text-align: center; color:red;">No existeix aquesta conta</p>';
        } else {
            $_SESSION['correu'] = $correu;
            $_SESSION['inici_sessio'] = time();
            $_SESSION['verificat'] = true;
            header('Location: index.php?action=home');
            exit;
        }
    }
?>

