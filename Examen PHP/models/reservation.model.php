<?php
    //REQUETES PARAMETRES
    function select_reservation_un_client(int $id_client): array{
        //1-Ouverture de la connexion
        $pdo=open_connexion();
        //2-Ecriture d'une requete  parametré
        $req="select * from reservation r, bien b, user cl 
                where r.bien_id=b.id_bien and r.client_id=cl.id and cl.id=?";
        //3-Execution d'une requete select  parametre
        $stm=$pdo->prepare($req);
        $stm->execute([$id_client]);
        //4-Récupération du résultat
        $result=$stm->fetchAll();
        $result=$stm->rowCount()==0?[]:$result;
        //5-Fermer la connexion
        close_connexion($pdo);
        return $result;
    }
    function select_reservation_by_etat(string $etat): array{
        //1-Ouverture de la connexion
        $pdo=open_connexion();
        //2-Ecriture d'une requete  parametré
        $req="select * from reservation r, bien b, user cl 
                where r.bien_id=b.id_bien and r.client_id=cl.id and r.etat_reservation=?";
        //3-Execution d'une requete select  parametre
        $stm=$pdo->prepare($req);
        $stm->execute([$etat]);
        //4-Récupération du résultat
        $result=$stm->fetchAll();
        $result=$stm->rowCount()==0?[]:$result;
        //5-Fermer la connexion
        close_connexion($pdo);
        return $result;
    }
    function select_reservation_un_bien(int $id_bien): array{
        //1-Ouverture de la connexion
        $pdo=open_connexion();
        //2-Ecriture d'une requete  parametré
        $req="select * from reservation r, bien b, user cl 
                where r.bien_id=b.id_bien and r.client_id=cl.id and b.id_bien=?";
        //3-Execution d'une requete select  parametre
        $stm=$pdo->prepare($req);
        $stm->execute([$id_bien]);
        //4-Récupération du résultat
        $result=$stm->fetchAll();
        $result=$stm->rowCount()==0?[]:$result;
        //5-Fermer la connexion
        close_connexion($pdo);
        return $result;
    }
    
?>