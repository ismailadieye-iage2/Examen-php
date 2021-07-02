<?php
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        //Get correspond a un chargement de page
        if(isset($_GET["page"])){
            if($_GET["page"]=="catalogue"){
                require_once PATH_ROOT."views/article/catalogue.html.php";
            }elseif($_GET["page"]=="detail"){
                require_once PATH_ROOT."views/article/detail.article.html.php";
            }
        }
    }else{
        //Post correspond a un traitement de formulaire
    
    }
    ?>