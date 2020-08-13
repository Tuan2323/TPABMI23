<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Rechercher et modifier</title>
    <link rel="stylesheet" href=styles.css>
</head>

<body>
<header></header>
<h1>Saisissez l'identifiant d'un utilisateur</h1>
  <hr>
  <form method = "post" action="modifUser.php">
   <fieldset>
       <legend>Modification des utilisateurs</legend>
       <label>Saisissez l'id de l'utilisateur</label>
       <input type="numeric" name="identifiant">

       <input type="submit" name ="modif" value="Rechercher et modifier">

   </fieldset>
</form>
<?php
//Créer la base de données
include_once 'myparam.inc.php';

$idcom = new mysqli(MYHOST,MYUSER,MYPASS, 'monform'); 
if (!$idcom) 
{
echo "Connexion impossible à la base";
exit(); 
}

if(!empty($_POST['identifiant'])){
    
    $identifiant = $idcom->escape_string($_POST['identifiant']);

    $requete = "SELECT * FROM utilisateurs WHERE id = $identifiant ";

    $result = $idcom->query($requete);
     
    $coord = $result->fetch_row(); //fetch_row - Récupère une ligne de résultat sous forme de tableau indexé

    echo "<h1> Modification d'un utilisateur</h1>";
    echo "<fieldset id=\"main\">";
    echo " <legend>Modification du formulaire :</legend>";
    echo "<form action=\"traitementUpdate.php\" method=\"post\">";
    ?>
       <label>Identifiant:</label>
    <?php
    echo "<input type=\"numeric\" name=\"identifiant\" readonly =\"true\" value=\"$coord[0]\">";
    ?>
    <br><br>
    <label>Nom:</label>
        <?php
         echo "<input type=\"text\" name=\"nom\" value=\"$coord[1]\">";
         ?>
    <br><br>
        <input type="submit" name="valider" value=" Modifier "> &nbsp&nbsp&nbsp
        <input type="reset" value="Annuler">
      
      </fieldset>
    </form>
    
    <?php 
}
else {echo "Veuillez saisir l'identifiant de l'utilisateur ";}
?>

</body>
</html>
