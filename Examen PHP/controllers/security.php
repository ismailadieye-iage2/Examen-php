<?php
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        //Get correspond a un chargement de page
        if(isset($_GET["page"])){
            if($_GET["page"]=="inscription"){
                require_once PATH_ROOT."views/security/register.html.php";
            }elseif($_GET["page"]=="login"){
                require_once PATH_ROOT."views/security/login.html.php";
            }elseif($_GET["page"]=="logout"){
                deconnexion();
                require_once PATH_ROOT."views/security/login.html.php";
            }elseif($_GET["page"]=="show.users"){
                require_once PATH_ROOT."views/security/show.user.html.php";
            }elseif($_GET["page"]=="accueil.client"){
                require_once PATH_ROOT."views/security/accueil.client.html.php";
            }elseif($_GET["page"]=="accueil.admin"){
                require_once PATH_ROOT."views/security/accueil.admin.html.php";
            }
        }
    }else{
        //Post correspond a un traitement de formulaire
        if(isset($_POST["btn_submit"])){
            //Au clic d'un formulaire
            if($_POST["btn_submit"]=="btn_login"){
               se_connecter($_POST);
            }elseif($_POST["btn_submit"]=="btn_register"){
                inscription($_POST);
            }
        } 
    }
    function se_connecter(array $data){
         //Traitement de connexion
                //Tableau d'erreurs
                $arr_error=[];
                //Validation du champ login
                valide_email($data["login"],$arr_error,"login","le champ login est obligatoire");
                valide_password($data["password"],$arr_error,"password","le password est obligatoire");
                if(valide_form($arr_error)){
                    //Pas d'erreurs le formulaire est valide
                    //Appell d'une fonction du modele user
                    $user=select_user_by_login_password($data["login"], $data["password"]);
                    if (count($user)==0){
                        $arr_error["error_login"]="Login ou mot de passe incorrect";
                        $_SESSION["arr_error"]=$arr_error;
                        //Redirection
                        header("location:".WEB_ROOT."?controller=security&page=login");
                    }else{
                        //Stockage de l'utilisateur connecté dans la session
                        $_SESSION["user_connect"]=$user;
                        if($user["role"]=="ROLE_CLIENT"){
                            header("location:".WEB_ROOT."?controller=security&page=accueil.client");
                        }elseif($user["role"]=="ROLE_ADMIN"){
                            header("location:".WEB_ROOT."?controller=security&page=accueil.admin");
                        }
                    }
                }else{
                    //Le formulaire n'est pas valide 
                    //Stockage des erreurs dans la session
                    $_SESSION["arr_error"]=$arr_error;
                    //Redirection
                    header("location:".WEB_ROOT."?controller=security&page=login");
                }
    }

    function inscription(array $data){
         //Traitement d'inscription
                //Tableau d'erreurs
                $arr_error=[];
                valide_champ($data["nom"], $arr_error, "nom", "le nom est obligatoire.");
                valide_champ($data["prenom"], $arr_error, "prenom", "le prenom est obligatoire.");
                //Validation du champ login
                valide_email($data["login"],$arr_error,"login","le champ login est obligatoire");
                valide_password($data["password"],$arr_error,"password","le password est obligatoire");
                if(valide_form($arr_error)){
                    //Pas d'erreurs le formulaire est valide
                    //Vérification de l'existance du login en bd
                    $is_exist=login_exist($data["login"]);
                    if ($is_exist==true){
                        $arr_error["login"]="le login existe déja";
                        $_SESSION["arr_error"]=$arr_error;
                        //Redirection
                        header("location:".WEB_ROOT."?controller=security&page=inscription");
                    }else{
                        // Login existe pas
                        unset($data["controller"]);
                        unset($data["btn_submit"]);
                        $data["nom_complet"]=$data["nom"]." ".$data["prenom"];
                        unset($data["nom"]);
                        unset($data["prenom"]);
                        insert_user($data);
                        se_connecter($data);
                    }
                }else{
                    //Le formulaire n'est pas valide 
                    //Stockage des erreurs dans la session
                    $_SESSION["arr_error"]=$arr_error;
                    //Redirection
                    header("location:".WEB_ROOT."?controller=security&page=inscription");
                }
    }

?>