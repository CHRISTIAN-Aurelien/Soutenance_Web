<?php
require_once 'Database.php';

$data = json_decode($_COOKIE['User_profil'], true);

if (isset($_GET['id'])) {
    $Wishlist = $_GET['id'];
}
$id_person = $data['ID_PERSON'];

    $req = "DELETE FROM wish WHERE wish.ID_PERSON='$id_person' && wish.ID_OFFERS = '$Wishlist'"; // requete SQL
    $resultat = $bdd->query($req); //execution de la requete
    if (!$resultat){ // Si erreur requete
        echo "Erreur de requete";
        die;
    }
    $GLOBALS['recipes'] = $resultat->fetchAll(); // On recupére les données.
        $resultat->closeCursor();

    header("Location: Wishlist_Utilisateur.php")
?>