<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Mon formulaire</title>
    <link rel="stylesheet" href=styles.css>
</head>

<body>
<header></header>
<h1> Mon premier formulaire</h1>
<fieldset id="main">
    <legend>Notre formulaire :</legend>
    <form action="index.php" method="post">
        <label>Nom:</label>
        <input type="text" name="nom" value="MINKOUE OBAME"><br><br>
        <label>Prénom:</label>
        <input type="text" name="prenom" value="Anouchka"><br><br>
        <label>Date:</label>
        <input type="date" name="ladate"><br><br>
        <fieldset>
            <legend>Lieu de naissance:</legend>
            <input type="radio" name="lieu" value="Saint Denis">Saint Denis
            <input type="radio" name="lieu" value="Reste du monde">Reste du monde
        </fieldset>
        <br><br>
        <label>Adresse postale:</label><textarea rows="2" col="30" name="adressepostale"
                                                 value="">Je suis ici et là...</textarea>
        <br><br>
        <label>Code postal:</label><input type="text" pattern="[0-9]{5}" placeholder="Saissisez 5 chiffres maximum"
                                          name="cp" value="76190">
        <br><br>
        <label>E-mail:</label><input type="email" name="email" value="example@gmail.com">
        <br><br>
        <label>Site:</label><input type="url" name="site" value="https://www.google.com">
        <br><br>
        <label>Téléphone:</label>
        <input type="text" name="telephone" pattern="0[6-7][0-9]{8}" value="0658898531"
               placeholder="Exemple : 0602030405 sans espace ni tirets">
        <br><br>
        <label>Semestre:</label>
        <select name="semestre" size=3>
            <option>S1</option>
            <option selected>S2</option> <!--Selection par défaut du choix S2 -->
            <option>S3</option>
            <option>S4</option>
        </select>
        <br><br>
        <label>Niveau en HTML:</label>
        <input type="range" name="niveauhtml" value="" max="10" min="0" step="1">
        <br><br>
        <fieldset id="fconnaissances">
            <legend>Connaissances:</legend>
            <input type="checkbox" checked="checked" name="connaissances[]" value="HTML">HTML
            <!--Selection par défaut du choix HTML -->
            <input type="checkbox" name="connaissances[]" value="CSS">CSS
            <input type="checkbox" name="connaissances[]" value="Formulaires">Formulaires
            <input type="checkbox" name="connaissances[]" value="JavaScript">JavaScript
        </fieldset>
        <br><br>
        <input type="submit" name="valider" value=" Envoyer "> &nbsp&nbsp&nbsp
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

<footer> Formulaire réalisé dans le cadre du TP 2 de la formation de développeurs intégrateurs et codeurs web</footer>
</body>
</html>
