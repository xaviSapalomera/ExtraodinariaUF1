<?php
// Xavi Gallego Palau


session_start();


// Acciona els metodes del index.php (per defecte el valor es home)
$action = $_GET['action'] ?? 'home';

// Metodes que sol funcionen si estas logeat

// Per accionar el formulari de registrarse
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

// Per accionar el formulari de logearse
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'login') {

    include './controller/controlador_login.php';
    
    logearUsuari(
        $_POST['correu'],
        $_POST['password']);
    exit;
}



//Metodes per els usuaris logeats
if((isset($_SESSION['correu']))){
        // Per accionar el formulari de borrar l'article
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'borrarArticle') {
            include './controller/controlador_delete.php';

            $id = $_POST['id'];

            $mensaje = borrarArticle($id);
            header('Location: index.php?action=ELIMINAR'); 
            echo $mensaje;
            exit;
            
        }
        // Per accionar el formulari d'actualitzar els articles
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'actualizarArticle') {
            include './controller/controlador_update.php';

            $id = $_POST['id'];
            $titol = $_POST['titol'] ?? '';
            $cos = $_POST['cos'] ?? '';

            actualitzarArticle($titol,$cos,$id);
            header('Location: index.php?action=ACTUALITZAR'); 
            exit;
        }
        // Per accionar el formulari de crear articles
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'crearArticle') {
            include './controller/controlador_insert.php';
            $titol = $_POST['titol'] ?? '';
            $cos = $_POST['cos'] ?? '';
            $_SESSION['missatge'] = crearArticle($titol, $cos); 
            header('Location: index.php?action=home'); 
            exit;

        }
        // Per accionar el formulari de tanca sessio
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $action === 'logout') {
            session_unset();
            session_destroy();
            header('Location: index.php?action=home');
            exit;
        }
}




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
}
?>