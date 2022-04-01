<?php
session_start();
require_once 'Database.php';


if (isset($_POST['username'])) {
    $mail = $_POST['username'];
}
if (isset($_POST['password'])) {
    $mdp = $_POST['password'];
}

if($bdd == null) {
    header("Location: Authentification.php");
}
else
{
    $req = "SELECT * FROM user 
    INNER JOIN be  
    ON user.ID_PERSON = be.ID_PERSON
    INNER JOIN role
    ON be.ID_ROLE = role.ID_ROLE
    INNER JOIN has
    ON role.ID_ROLE = has.ID_ROLE
    INNER JOIN permission
    ON has.ID_PERMISSION = permission.ID_PERMISSION
    INNER JOIN promotions
    ON user.ID_PROMOTIONS = promotions.ID_PROMOTIONS
    where LOGIN = '$mail' and PASSWORD = '$mdp';"; // requete SQL
    echo($req);
    $resultat = $bdd->query($req); //execution de la requete
    if (!$resultat){ // Si erreur requete
        echo "Erreur de requete";
        die;
    }
    $recipes = $resultat->fetch(); // On recupére les données.
    if (count($recipes) === 0){
        echo "<div>Erreur de connexion ! <br> <a href='Authentification.php'>Retour à l'authentification</a></div>";
    }
    else{
        $resultat->closeCursor();
        $data = json_encode($recipes);
        echo $data;
        setcookie('User_profil', $data, time() + 3600, '/');
    }

    header("Location: Compte_Utilisateur.php");
}
?>