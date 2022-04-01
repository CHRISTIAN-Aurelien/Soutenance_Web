<?php
    require_once('Database.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = strip_tags($_GET['id']);
        $sql = "DELETE FROM `promotions` WHERE `ID_PROMOTIONS`=:id;";

        $query = $bdd->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        header('Location: Tableau_Promotions.php');
    }

    require_once('Close.php');
?>