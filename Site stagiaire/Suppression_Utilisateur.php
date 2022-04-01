<?php
    require_once('Database.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = strip_tags($_GET['id']);
        $sql = "DELETE FROM `user` WHERE `ID_PERSON`=:id;";

        $query = $bdd->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        header('Location: Tableau_Utilisateur.php');
    }

    require_once('Close.php');
?>