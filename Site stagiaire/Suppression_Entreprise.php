<?php
    require_once('Database.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = strip_tags($_GET['id']);
        $sql = "DELETE FROM `company` WHERE `ID_COMPANY`=:id;";

        $query = $bdd->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        header('Location: Tableau_Entreprise.php');
    }

    require_once('Close.php');
?>