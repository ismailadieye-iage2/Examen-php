<?php
    //REQUETES PARAMETRES
    function select_bien_disponible(): array{
        //1-Ouverture de la connexion
        $pdo=open_connexion();
        //2-Ecriture d'une requete  parametré
        $req="select * from bien where etat=1";
        //3-Execution d'une requete select  parametre
        $stm=$pdo->prepare($req);
        $stm->execute();
        //4-Récupération du résultat
        $result=$stm->fetchAll();
        $result=$stm->rowCount()==0?[]:$result;
        //5-Fermer la connexion
        close_connexion($pdo);
        return $result;
    }
    function select_bien_by_id(int $id_bien): array{
        //1-Ouverture de la connexion
        $pdo=open_connexion();
        //2-Ecriture d'une requete  parametré
        $req="select * from bien b, proprietaire p where b.proprio_id=p.id_proprio and b.id_bien=?";
        //3-Execution d'une requete select  parametre
        $stm=$pdo->prepare($req);
        $stm->execute([$id_bien]);
        //4-Récupération du résultat
        $result=$stm->fetch();
        $result=$stm->rowCount()==0?[]:$result;
        //5-Fermer la connexion
        close_connexion($pdo);
        return $result;
    }
    
?>