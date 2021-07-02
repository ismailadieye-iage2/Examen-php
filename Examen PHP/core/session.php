<?php
    function open_session(){
        //vérification de l'existence de la session
        if(session_status()==PHP_SESSION_NONE){
            //ouvrir la session
            session_start();
        }
    }
    function is_connect():bool{
        return isset($_SESSION["user_connect"]);
    }
    function is_client():bool{
        return is_connect() && $_SESSION["user_connect"]["role"]=="ROLE_CLIENT";
    }
    function is_admin():bool{
        return is_connect() && $_SESSION["user_connect"]["role"]=="ROLE_ADMIN";
    }
    function deconnexion(){
        unset($_SESSION["user_connect"]);
        session_destroy();
    }
?>