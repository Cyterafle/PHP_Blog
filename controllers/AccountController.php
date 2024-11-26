<?php

require_once __DIR__ . '/../models/login_model.php';
require_once __DIR__ . '/../helper.php';

class AccountController {
    
    public function login() {
        require_once 'views/header.php';
        require_once 'views/login.php';
        require_once 'views/footer.php';
    }
    public function register() {
        require_once 'views/header.php';
        require_once 'views/register.php';
        require_once 'views/footer.php';
    }

    public function create_account(){
        $model = new LoginModel();
        $result = $model->register();
        require_once 'views/header.php';
        if ($result != NULL){
            echo "<p id=\"account_done\">Compte créé, redirection en cours vers la page de connexion...</p>";
            sleep(3);
            echo '<script language="javascript">window.location.href ="'.generateUrl('account','login').'"</script>';
        } else {
            echo "<p id=\"fail\">Problème lors de la création du compte, veuillez réessayer</p>";
            sleep(3);
        }
    }

    public function access_account(){
        $model = new LoginModel();
        $result = $model->connect();
        require_once 'views/header.php';
        if ($result){
            session_start();
            echo "<p id=\"connect_done\">Vous êtes connecté, redirection...</p>";
            echo '<script language="javascript">window.location.href ="'.generateUrl('home').'"</script>';
        } else {
            echo "<p id=\"connect_fail\">Problème lors de la connexion au compte, veuillez réessayer</p>";
            echo '<script language="javascript">window.location.href ="'.generateUrl('account','login').'"</script>';
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        echo '<script language="javascript">window.location.href ="'.generateUrl('home').'"</script>';
    }
}