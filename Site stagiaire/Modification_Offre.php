<?php
    require_once('Database.php');

    if(isset($_POST))
    {
        if(isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['descri']) && !empty($_POST['descri']) && isset($_POST['skills']) && !empty($_POST['skills']) && isset($_POST['duree']) && !empty($_POST['duree']) && isset($_POST['remuneration']) && !empty($_POST['remuneration']) && isset($_POST['embauche']) && !empty($_POST['embauche']) && isset($_POST['places']) && !empty($_POST['places'])) 
        {              
            $id = strip_tags($_GET['id']);
            $titre = strip_tags($_POST['titre']);
            $descri = strip_tags($_POST['descri']);
            $skills = strip_tags($_POST['skills']);
            $duree = strip_tags($_POST['duree']);
            $remuneration = strip_tags($_POST['remuneration']);
            $embauche = strip_tags($_POST['embauche']);
            $places = strip_tags($_POST['places']);

            $sql = "UPDATE `internship` SET `TITLE`=:titre, `DESCRIPTION`=:descri, `SKILLS`=:skills, `DURATION`=:duree, `REMUNERATION`=:remuneration, `OFFER_DATE`=:embauche, `PLACES_NUMBER`=:places WHERE `ID_OFFERS`=:id;";

            $query = $bdd->prepare($sql);

            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':descri', $descri, PDO::PARAM_STR);
            $query->bindValue(':skills', $skills, PDO::PARAM_STR);
            $query->bindValue(':duree', $duree, PDO::PARAM_STR);
            $query->bindValue(':remuneration', $remuneration, PDO::PARAM_STR);
            $query->bindValue(':embauche', $embauche, PDO::PARAM_STR);
            $query->bindValue(':places', $places, PDO::PARAM_STR);
            $query->bindValue(':id', $id, PDO::PARAM_INT);

            $query->execute();

            header('Location: Tableau_Offre.php');
        }
    }

    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $id = strip_tags($_GET['id']);
        $sql = "SELECT * FROM `internship` WHERE `ID_OFFERS`=:id;";
        $query = $bdd->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch();

    }

    require_once('Close.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf=8" />
    <title>Adopte a stag</title>

    <!-- Lien vers les fichiers CSS -->
    <link rel="stylesheet" href="Css/Main_Nav.css">
    <link rel="stylesheet" href="Css/Creation_Formulaire.css">

    <!-- Script pour Bootstrap CCS et JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- PWA -->
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="images\ziak.png">
    <meta name="apple-mobile-web-app-status-bar" content="white">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="white">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="App.js"></script>
</head>

<!-- Corps de la page -->

<body id="main">
    <?php
        if(isset($_COOKIE['User_profil'])){
            $data = json_decode($_COOKIE['User_profil'], true);
        };
    ?>
    <!-- Barre de navigation -->
    <nav>
        <div id="barredenav">
            <a href="Acceuil2.html"><img src="Images\aaslogo3.png" alt="" id="imgnav"></a>
            <a id="btnmenu" class="btn btn-outline-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 20">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg> MENU</a>

                <?php if(!isset($_COOKIE['User_profil'])){ ?>
                    <button type="button" class="btn btn-outline-dark" onclick="self.location.href='Authentification.php'"><i class="bi bi-at"></i> S'authentifier
                <?php }; ?>
                <div id="espacebouton">
                    <?php if(isset($_COOKIE['User_profil'])){ ?>
                    <button type="button" class="btn btn-outline-dark" onclick="self.location.href='Compte_Utilisateur.php'"><i class="bi bi-person-circle"></i> Mon compte
                    <?php }; ?>

                    <?php if(isset($_COOKIE['User_profil'])){ ?>
                        <button type="button" class="btn btn-outline-dark" onclick="self.location.href='Deconnection.php'"><i class="bi bi-arrow-left-square"></i> Se d??connecter
                    <?php }; ?>
                </div>

            <!-- <button id="btnauth" type="button" class="btn btn-outline-dark" onclick="self.location.href='Authentification.php'">ACCOUNT <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="2 0 16 19">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg> -->
        </div>

        <!-- Menu cach?? -->

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" id="boutonsmenu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!-- L??gende avec les boutons et l'image -->

        <div class="offcanvas-body">
            <p>
                Plateform is an internship search tool. It allows you to apply to different internship offers proposed by companies.
            </p>

            <!-- Bouttons du menu -->
            <div class="cacheboutton">
                    <button type="button" class="btn btn-outline-dark" onclick="self.location.href='Accueil.php'">
                        <div class="textecacheboutton">Accueil</div>
                    </button>

                    <button type="button" class="btn btn-outline-dark">
                        <div class="textecacheboutton" onclick="self.location.href='Propos.php'">?? propos</div>
                    </button>

                    <?php if(isset($_COOKIE['User_profil'])){ ?>
                    <!-- Menu du compte administrateur -->
                        <?php if($data['Name_ROLE']=='Administrateur'){  ?>
                            <p class="cacheboutton">
                                <a class="btn btn-outline-dark" data-bs-toggle="collapse" href="#collapseAdmin" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Mon Compte - Administrateur
                                </a>
                            </p>
                            <div class="collapse" id="collapseAdmin">
                                <div class="card card-body">
                                    <a class="dropdown-item" href="Compte_Utilisateur.php">Voir mes informations</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Utilisateur.php">Consulter un compte ??tudiant</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Utilisateur.php">Consulter un compte d??l??gu??</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Utilisateur.php">Consulter un compte pilote</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Entreprise.php">Consulter une entreprise</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Offre.php">Consulter une offre</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Wishlist_Utilisateur.php">Consulter ma wish-list</a>
                                    <a class="dropdown-item" href="#">V??rifier l'avancement d'une offre</a>
                                </div>
                            </div>
                        <?php }; ?>
                    

                        <!-- Menu du compte pilote -->
                        <?php if($data['Name_ROLE']=='Pilote'){  ?>
                            <p class="cacheboutton">
                                <a class="btn btn-outline-dark" data-bs-toggle="collapse" href="#collapsePilote" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Mon Compte - Pilote
                                </a>
                            </p>
                            <div class="collapse" id="collapsePilote">
                                <div class="card card-body">
                                    <a class="dropdown-item" href="Compte_Utilisateur.php">Voir mes informations</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Utilisateur.php">Consulter un compte ??tudiant</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Utilisateur.php">Consulter un compte d??l??gu??</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Entreprise.php">Consulter une entreprise</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Offre.php">Consulter une offre</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="#">V??rifier l'avancement d'une offre</a>
                                </div>
                            </div>
                        <?php }; ?>

                        <!-- Menu du compte ??tudiant -->
                        <?php if($data['Name_ROLE']=='Etudiant'){  ?>
                            <p class="cacheboutton">
                                <a class="btn btn-outline-dark" data-bs-toggle="collapse" href="#collapseEtudiant" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Mon Compte - Etudiant
                                </a>
                            </p>
                            <div class="collapse" id="collapseEtudiant">
                                <div class="card card-body">
                                    <a class="dropdown-item" href="Compte_Utilisateur.php">Voir mes informations</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Tableau_Entreprise.php">Consulter une entreprise</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Offres.php">Consulter une offre</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="Wishlist_Utilisateur.php">Consulter ma wish-list</a>
                                    <a class="dropdown-item" href="#">V??rifier l'avancement de mes candidatures</a>
                                </div>
                            </div>
                        <?php }; ?>

                        <!-- Menu du compte d??l??gu?? -->
                        <?php if($data['Name_ROLE']=='D??l??gu??'){  ?>
                            <p class="cacheboutton">
                                <a class="btn btn-outline-dark" data-bs-toggle="collapse" href="#collapseAdmin" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Mon Compte - D??l??gu??
                                </a>
                            </p>
                            <div class="collapse" id="collapseAdmin">
                                <div class="card card-body">
                                    <a class="dropdown-item" href="Compte_Etudiant.php">Voir mes informations</a>
                                    <hr class="dropdown-divider">
                                    <?php if($data['SEARCH_STUDENT_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="Tableau_Utilisateur.php">Consulter un compte ??tudiant</a>
                                    <?php };?>
                                    <?php if($data['CREATE_STUDENT_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="Creation_Utilisateur.php">Cr??er un compte ??tudiant</a>
                                    <?php };?>
                                    <?php if($data['UPDATE_STUDENT_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="Modification_Utilisateur.php">Modifier un compte ??tudiant</a>
                                    <?php };?>
                                    <?php if($data['DELETE_STUDENT_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="Suppression_Utilisateur.php">Supprimer un compte ??tudiant</a>
                                    <?php };?>
                                    <hr class="dropdown-divider">
                                    <?php if($data['SEARCH_DELEGUATE_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="#">Consulter un compte d??l??gu??</a>
                                    <?php };?>
                                    <?php if($data['CREATE_DELEGUATE_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="#">Cr??er un compte d??l??gu??</a>
                                    <?php };?>
                                    <?php if($data['UPDATE_DELEGUATE_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="#">Modifier un compte d??l??gu??</a>
                                    <?php };?>
                                    <?php if($data['DELETE_DELEGUATE_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="#">Supprimer un compte d??l??gu??</a>
                                    <?php };?>
                                    <hr class="dropdown-divider">
                                    <?php if($data['SEARCH_PILOT_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="Tableau_Utilisateur.php">Consulter un compte pilote</a>
                                    <?php };?>
                                    <?php if($data['CREATE_PILOT_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="Creation_Utilisateur.php">Cr??er un compte pilote</a>
                                    <?php };?>
                                    <?php if($data['UPDATE_PILOT_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="Modification_Utilisateur.php">Modifier un compte pilote</a>
                                    <?php };?>
                                    <?php if($data['DELETE_PILOT_ACCOUNT']=='1'){  ?>
                                    <a class="dropdown-item" href="Suppression_Utilisateur.php">Supprimer un compte pilote</a>
                                    <?php };?>
                                    <hr class="dropdown-divider">
                                    <?php if($data['SEARCH_COMPANY']=='1'){  ?>
                                    <a class="dropdown-item" href="Tableau_Entreprise.php">Consulter une entreprise</a>
                                    <?php };?>
                                    <?php if($data['CREATE_COMPANY']=='1'){  ?>
                                    <a class="dropdown-item" href="Creation_Entreprise.php">Ajouter une entreprise</a>
                                    <?php };?>
                                    <?php if($data['UPDATE_COMPANY']=='1'){  ?>
                                    <a class="dropdown-item" href="Modification_Entreprise.php">Modifier une entreprise</a>
                                    <?php };?>
                                    <?php if($data['DELETE_COMPANY']=='1'){  ?>
                                    <a class="dropdown-item" href="Suppression_Entreprise.php">Supprimer une entreprise</a>
                                    <?php };?>
                                    <?php if($data['EVALUATE_COMPANY']=='1'){  ?>
                                    <a class="dropdown-item" href="#">Evaluer une entreprise</a>
                                    <?php };?>
                                    <hr class="dropdown-divider">
                                    <?php if($data['SEARCH_OFFERS']=='1'){  ?>
                                    <a class="dropdown-item" href="Tableau_Offre.php">Consulter une offre</a>
                                    <?php };?>
                                    <?php if($data['CREATE_OFFERS']=='1'){  ?>
                                    <a class="dropdown-item" href="Creation_Offre.php">Ajouter une offre</a>
                                    <?php };?>
                                    <?php if($data['UPDATE_OFFERS']=='1'){  ?>
                                    <a class="dropdown-item" href="Modification_Offre.php">Modifier une offre</a>
                                    <?php };?>
                                    <?php if($data['DELETE_OFFERS']=='1'){  ?>
                                    <a class="dropdown-item" href="Suppression_Offre.php">Supprimer une offre</a>
                                    <?php };?>
                                </div>
                            </div>
                        <?php };?>

                    <?php }; ?>

                </div>

            </div>
        </div>
    </nav>

    <!-- Contenu de la page -->
    <div id="uppercreaetudiant">
        <h2 id="titrepage">Cr??ation d'une offre</h2>
        <button type="button" class="btn btn-dark" onclick="self.location.href='Tableau_Offre.php'"><i class="bi bi-arrow-left"></i> Retour au tableau</button>
    </div>

    <form method="post">
        <div class="container-md">
            <h3 class="titreformulaire">Descriptif de l'offre</h3>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Titre de l'offre</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" id="titre" name="titre" value="<?= $result['TITLE'] ?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" id="descri" name="descri" value="<?= $result['DESCRIPTION'] ?>">
            </div>

            <h3 class="titreformulaire">Contenu</h3>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Skills recquis (merci de les s??parer par une virgule)</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" id="skills" name="skills" value="<?= $result['SKILLS'] ?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Dur??e du stage</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" id="duree" name="duree" value="<?= $result['DURATION'] ?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">R??mun??ration</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" id="remuneration" name="remuneration" value="<?= $result['REMUNERATION'] ?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Date d'embauche sous format (aaaa-mm-jj)</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" id="embauche" name="embauche" value="<?= $result['OFFER_DATE'] ?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nombre de places disponibles</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" id="places" name="places" value="<?= $result['PLACES_NUMBER'] ?>">
            </div>
            
            <input type="hidden" name="id" value="<?= $result['id'] ?>">

            <button type="submit" class="btn btn-outline-success">Envoyer</button>
        </div>
    </form>




</body>


</html>