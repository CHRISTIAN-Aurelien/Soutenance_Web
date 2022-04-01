<?php
require_once 'Database.php';

if (isset($_POST['SSA'])) {
    $SSA = $_POST['SSA'];
}
if (isset($_POST['CSA'])) {
    $CSA = $_POST['CSA'];
}
if (isset($_POST['USA'])){
    $USA = $_POST['USA'];
}
if (isset($_POST['DSA'])){
    $DSA = $_POST['DSA'];
}
if (isset($_POST['SS'])){
    $SS = $_POST['SS'];
}
if (isset($_POST['SPA'])){
    $SPA = $_POST['SPA'];
}
if (isset($_POST['CPA'])){
    $CPA = $_POST['CPA'];
}
if (isset($_POST['UPA'])){
    $UPA = $_POST['UPA'];
}
if (isset($_POST['DPA'])){
    $DPA = $_POST['DPA'];
}
if (isset($_POST['SDA'])){
    $SDA = $_POST['SDA'];
}
if (isset($_POST['CDA'])){
    $CDA = $_POST['CDA'];
}
if (isset($_POST['UDA'])){
    $UDA = $_POST['UDA'];
}
if (isset($_POST['DDA'])){
    $DDA = $_POST['DDA'];
}
if (isset($_POST['SCA'])){
    $SCA = $_POST['SCA'];
}
if (isset($_POST['CCA'])){
    $CCA = $_POST['CCA'];
}
if (isset($_POST['UCA'])){
    $UCA = $_POST['UCA'];
}
if (isset($_POST['DCA'])){
    $DCA = $_POST['DCA'];
}
if (isset($_POST['EC'])){
    $EC = $_POST['EC'];
}
if (isset($_POST['SSC'])){
    $SSC = $_POST['SSC'];
}
if (isset($_POST['SO'])){
    $SO = $_POST['SO'];
}
if (isset($_POST['CO'])){
    $CO = $_POST['CO'];
}
if (isset($_POST['UO'])){
    $UO = $_POST['UO'];
}
if (isset($_POST['DO'])){
    $DO = $_POST['DO'];
}
if (isset($_POST['SSO'])){
    $SSO = $_POST['SSO'];
}
if (isset($_POST['AOW'])){
    $AOW = $_POST['AOW'];
}
if (isset($_POST['DOW'])){
    $DOW = $_POST['DOW'];
}
if (isset($_POST['AO'])){
    $AO = $_POST['AO'];
}
if (isset($_POST['SS3'])){
    $SS3 = $_POST['SS3'];
}
if (isset($_POST['SS4'])){
    $SS4 = $_POST['SS4'];
}


    $req = "UPDATE permission SET SEARCH_COMPANY= '$SCA', CREATE_COMPANY='$CCA',UPDATE_COMPANY='$UCA',EVALUATE_COMPANY='$EC',DELETE_COMPANY='$DCA',STATS_COMPANY='$SSC',SEARCH_OFFERS='$SO',CREATE_OFFERS='$CO',UPDATE_OFFERS='$UO',DELETE_OFFERS='$DO',STATS_OFFERS='$SSO',SEARCH_PILOT_ACCOUNT='$SPA',CREATE_PILOT_ACCOUNT ='$CPA',UPDATE_PILOT_ACCOUNT ='$UPA', DELETE_PILOT_ACCOUNT ='$DPA', SEARCH_DELEGUATE_ACCOUNT ='$SDA', CREATE_DELEGUATE_ACCOUNT ='$CDA', UPDATE_DELEGUATE_ACCOUNT ='$UDA', DELETE_DELEGUATE_ACCOUNT ='$DDA', SEARCH_STUDENT_ACCOUNT ='$SSA', CREATE_STUDENT_ACCOUNT ='$CSA', UPDATE_STUDENT_ACCOUNT ='$USA', DELETE_STUDENT_ACCOUNT ='$DSA', STATS_STUDENT ='$SS', ADD_OFFER_WISHLIST ='$AOW', DELETE_OFFER_WISHLIST ='$DOW', APPLY_OFFER ='$AO', STATUS_STEP3_FEEDBACK ='$SS3', STATUS_STEP4_FEEDBACK ='$SS4' WHERE  permission.ID_PERMISSION ='3';"; // requete SQL
    $resultat = $bdd->query($req); //execution de la requete
    if (!$resultat){ // Si erreur requete
        echo "Erreur de requete";
        die;
    }
    $GLOBALS['recipes'] = $resultat->fetchAll(); // On recupére les données.
        $resultat->closeCursor();
?>

<?php
header('Location: Compte_Utilisateur.php');
?>