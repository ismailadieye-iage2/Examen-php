<?php
/*router gére les inclusions des controllers, 
en modéliasation chaque package représente un controller
Son role est d'intercepter les requetes*/
if(isset($_REQUEST["controller"])){
    //l'utilisateur a cliqué sur un lien du site
    if($_REQUEST["controller"]=="security"){
        require_once(PATH_ROOT."controllers/security.php");
    }elseif($_REQUEST["controller"]=="article"){
        require_once(PATH_ROOT."controllers/article.php");
    }elseif($_REQUEST["controller"]=="reservation"){
        require_once(PATH_ROOT."controllers/reservation.php");
    }
}else{
    //le visiteur arrive pour la premiere fois
    require_once PATH_ROOT."views/article/catalogue.html.php";
}
?>