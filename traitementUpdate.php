<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Modification prix</title>
    <link rel="stylesheet" href=styles.css>
</head>

<body>
<h1>Modification d'un utilisateur</h1>
<br>
<?php
//Créer la base de données
include_once 'myparam.inc.php';
//Connexion au serveur de la bdd
$idcom = new mysqli(MYHOST, MYUSER, MYPASS, "tp23");

//Test si la connexion est valide
if (!$idcom) {
    echo "Connexion impossible";
    exit();
} 

    if(!empty($_POST['prix'])) {
        $prod = $_POST['prod'];
    
    
    $prix = $_POST['prix'];
  
   // echo $produit;
    //Ecrire la requete pour modifier les données d'un utilisateur
    $requete = "UPDATE Products SET
    UnitPrice = $prix
    WHERE ProductName = '$prod' ";

    //Envoyer la requete
    $result = $idcom->query($requete);

    //Vérifier que la requete est bien éxécutée
    if ($result) {
      echo "Les données ont bien été modifiées <a href=\"index.php\"> Retour </a>";
    } else {
        echo "Erreur " . $idcom->error;
    }

  


    //Fermer la connexion au serveur
    $idcom->close();

}
else {echo "Veuillez remplir correctement le formulaire ";}

?>

</body>
</html>