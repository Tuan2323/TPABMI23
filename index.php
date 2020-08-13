<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Mon app web</title>
    <link rel="stylesheet" href=styles.css>
</head>

<body>
<header></header>
<h1> Les 4 fantastiques</h1>
<fieldset id="main">
    <legend>Notre formulaire :</legend>
    <form action="index.php" method="post">
        <label>Nom de l'employé</label>
        <input type="text" name="nom" value="NOM"><br><br>
        <label>Produit:</label>
        <input type="text" name="produit" value="Anouchka"><br><br>
        
        <br><br>
        <input type="submit" name="valider" value=" Envoyer "> 
        <input type="reset" value="Annuler">
    </form>
</fieldset>
<br>

<?php
//Créer la base de données
include_once 'myparam.inc.php';
//Connexion au serveur de la bdd
$idcom = new mysqli(MYHOST, MYUSER, MYPASS, "monform");

//Test si la connexion est valide
if (!$idcom) {
    echo "Connexion impossible";
    exit();
} 
if(!empty($_POST['nom']) 
         && !empty($_POST['prenom']) 
         && !empty($_POST['ladate']) 
         && !empty($_POST['lieu'])
         && !empty($_POST['adressepostale']) 
         && !empty($_POST['cp']) 
         && !empty($_POST['email']) 
         && !empty($_POST['site'])
         && !empty($_POST['telephone'])
         ){
        $nom = $idcom->escape_string($_POST['nom']);
        $prenom = $idcom->escape_string($_POST['prenom']);
        $datenaissance = $_POST['ladate'];
        $lieu = $idcom->escape_string($_POST['lieu']);
        $adressepostale = $idcom->escape_string($_POST['adressepostale']);
        $cp = $idcom->escape_string($_POST['cp']);
        $email = $idcom->escape_string($_POST['email']);
        $site = $idcom->escape_string($_POST['site']);
        $telephone = $idcom->escape_string($_POST['telephone']);
        $semestre = $_POST['semestre'];
        $niveauhtml = $_POST['niveauhtml'];

        $result = "";
        foreach ($_POST['connaissances'] as $val) {
            $result .= $val . ',';
        }
        $connaissances = $idcom->escape_string($result);

        //Requete
        $requete = "Insert Into utilisateurs (nom, prenom,  ladate,  lieu, adressepostale, cp, email, site, telephone, semestre, niveauhtml, connaissances )
                VALUES
                ('$nom', '$prenom', '$datenaissance ',  '$lieu','$adressepostale', '$cp', '$email', '$site', '$telephone', '$semestre', '$niveauhtml', '$connaissances')";

        //Envoyer la requete
        $result = $idcom->query($requete);

        //Vérifier que la requete est bien éxécutée
        if ($result) {
            //echo "Vous avez bien été enregistré au numéro :" . $idcom->insert_id;
            echo "<script language=\"javascript\">";
            echo "alert('Vous avez bien été enregistré au numéro :.$idcom->insert_id' )";
            echo"</script>";
        } else {
            echo "Erreur " . $idcom->error;
        }

        //Fermer la connexion au serveur
        $idcom->close();
    }

    else {
        //echo "Veuillez remplir la formulaire";
        echo "<script language=\"javascript\">";
        echo "alert('Veuillez remplir la formulaire')";
        echo"</script>";
    }

?>

<footer> Formulaire fait par les 4 EZMIABAN </footer>
</body>
</html>
