<?php
    //REQUETES NON PARAMETRES
    function select_user_by_login_password(string $login, string $password): array{
        //1-Ouverture de la connexion
        $pdo=open_connexion();
        //2-Ecriture d'une requete non parametré
        $req="select * from user where login='$login' and password='$password'";
        //3-Execution d'une requete select non parametre
        $stm=$pdo->query($req);
        //4-Récupération du résultat
        $result=$stm->fetch();
        $result=$stm->rowCount()==0?[]:$result;
        //5-Fermer la connexion
        close_connexion($pdo);
        return $result;
    }
    function login_exist(string $login):bool{
        //1-Ouverture de la connexion
        $pdo=open_connexion();
        //2-Ecriture d'une requete non parametré
        $req="select * from user where login='$login'";
        //3-Execution d'une requete select non parametre
        $stm=$pdo->query($req);
        //4-Récupération du résultat
        $result=$stm->rowCount()==0?false:true;
        //5-Fermer la connexion
        close_connexion($pdo);
        return $result;
    }
    function select_all_users(): array{
        //1-Ouverture de la connexion
        $pdo=open_connexion();
        //2-Ecriture d'une requete non parametré
        $req="select * from user";
        //3-Execution d'une requete select non parametre
        $stm=$pdo->query($req);
        //4-Récupération du résultat
        $result=$stm->fetchAll();
        //5-Fermer la connexion
        close_connexion($pdo);
        return $result;
    }
    //Requetes de mise à jour
    function insert_user(array $user):int {
        extract($user);//extrait un tableau associatif
        //1-Ouverture de la connexion
        $pdo=open_connexion();
        //2-Ecriture d'une requete non parametré
        $req="insert into user(nom_complet, login, password, role) value('$nom_complet','$login','$password','$role')";
        //3-Execution d'une requete MAJ(insert, update, delete) non parametre
        $result=$pdo->exec($req);
        //4-Récupération du résultat
        //5-Fermer la connexion
        close_connexion($pdo);
        return $result==false?0:$result;
    }
    //REQUETES PARAMETRES
    
    $user=[
        "nom_complet"=>"Ismaila Dieye",
        "login"=>"ismailadieye@gmail.com",
        "password"=>"dieye",
        "role"=>"ROLE_ADMIN"
    ];
    
?>