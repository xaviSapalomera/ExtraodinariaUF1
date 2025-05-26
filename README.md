# PRÀCTICA 4 – Gestió d’usuaris i articles amb PHP i MySQL

## 🔐 Per què he escollit Sessions i no Cookies?

He decidit utilitzar **sessions** en lloc de **cookies** per motius de **seguretat**. Les dades de les sessions es guarden al servidor, mentres que les cookies es desen al navegador del client. Això implica que:

- Les sessions no poden ser modificades fàcilment per l’usuari.
- La informació sensible (com el `id` de l’usuari o el token de validació) no queda exposada al client.
- És més segur per gestionar autenticació, permisos i accés a recursos protegits.

## 🔄 Gestió de rutes (routing)

Per simplificar el control de la navegació dins de la pàgina, he utilitzat una única entrada principal al sistema: `index.php`.

A través del paràmetre `action` (via `$_GET['action']`)


LOGIN E REGISTRARSE

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'registrarse') {

    include './controller/controlador_registrarse.php';

    if(isset($_POST['nom']) && isset($_POST["cognom"]) && isset($_POST['dni']) && isset($_POST['nickname']) && isset($_POST["email"]) && isset($_POST['contrasenya'])){
        
        $nom = $_POST["nom"];

        $cognom = $_POST['cognom'];

        $nickname = $_POST['nickname'];

        $dni = $_POST['dni'];
        
        $email_POST = $_POST["email"];

        $contrasenya = $_POST['contrasenya'];

        $recontrasenya = $_POST['recontrasenya'];
        

        registrarse($nom,$cognom,$dni,$nickname,$email_POST,$contrasenya,$recontrasenya);

    }
    echo $mensage;
    exit; 
}
```
```php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'login') {

    include './controller/controlador_login.php';
    
    logearUsuari(
        $_POST['correu'],
        $_POST['password']);
    exit;
}
```

Tots els metodes/formularis dintre de aquests `session` estan protegeix, sol poden utilitzar aquests metodes usuaris logeats

```php

if((isset($_SESSION['correu']))){

```

Tambe les vistes amb  vistes protegides `$_SESSION['correu']`

```php
//Mostrar les vistes quan el usuari esta logeat
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_SESSION['correu'])) {
        
        switch ($action) {
            // Per accedir a la vista home_session.php
            case 'home':

                include 'views/home_session.php';

                include './controller/controlador_index_session.php';
               
                break;
            // Per accedir a la vista de crear articles    
                case 'INSERTAR':

                include 'views/insert.php';
                break;
            // Per accedir a la vista de actualitzar articles
                case 'ACTUALITZAR':

                include './views/update.php';

                include './controller/controlador_index_session.php';

                break;
            // Per accedir a la vista d'eliminar articles
                case 'ELIMINAR':

                include './views/delete.php';

                include './controller/controlador_index_session.php';
            // Per defecte es la vista home session
            default:

            include './controller/controlador_index_session.php';
            
            

                header('Location: index.php?action=home');
                break;
        }
    } else {
        // Si el usuari no esta logeat
        switch ($action) {
            // Per accedir a la vista home.php
            case 'home':
                include 'views/home.php';
                break;
            // Per accedir a la vista login.php            
            case 'login':
                include 'views/login.php';
                break;
            // Per accedir a la vista registrarse.php
            case 'registrarse':
                include 'views/registrarse.php';
                break;
            // Per defecte es la vista home
            default:
                include 'views/home.php';
                break;
        }
    }
```

# PART CONTROLADOR
Example de controlador:

```php
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


```

# PART DE BASE DE DADES  

Totes les funcions del Model tenen la conexio a base de dades com aquests example:

```php

try {
	$connexio = new PDO('mysql:host=localhost;dbname=pt04_Xavi_Gallego', 'root', '');

} catch (PDOException $e) {

	die(''. $e->getMessage());

}
```
