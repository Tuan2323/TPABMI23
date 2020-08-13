<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Résultat du formulaire</title>
  </head>
  
  <body>

  <header></header>
  <h1>La liste des utilisateurs inscrits</h1>
  <hr>
  <form method = "post" action="listeProdSoc.php.php">
   <fieldset>
       <legend>Liste societe</legend>
       <label>Saisissez un produit</label>
       <input type="text" name="produit">

       <input type="submit" value="Rechercher">

   </fieldset>
</form>

  <?php
//Inclusion des paramètres de connexion
include_once("myparam.inc.php");

$idcom = new mysqli(MYHOST,MYUSER,MYPASS, 'tp23'); 
if (!$idcom) 
{
echo "Connexion impossible à la base";
exit(); 
}
?>

<?php

   if(!empty($_POST['nom'])) {
   
      $nom = $idcom->escape_string($_POST['nom']);

$requete = "SELECT * FROM product WHERE nom LIKE '$nom%' ORDER BY id ";

$result = $idcom->query($requete);

if ($result->num_rows > 0) {


   echo('<table border="1">
    <colgroup width =150 span=12></colgroup>
	<thead> <!-- En-tête du tableau -->
   <tr>
       <th>Id</th>
       <th>Nom</th>
       <th>Prénom</th>
       <th>Date de naissance</th>
	   <th>Lieu de naissance</th>
	   <th>Adresse postale</th>
	   <th>Code postal</th>
	   <th>Email</th>
     <th>Site</th>
     <th>Téléphone</th>
	   <th>Semestre</th>
	   <th>Niveau HTML</th>
     <th>Connaissances</th>
     <th>Actions</th>
       </tr>
    </thead>
    <tbody> <!-- Corps du tableau --> ');
    //print_r($result->fetch_array());
    while($donnees = $result->fetch_assoc()) {
        echo ('<tr>');
       echo ('<td>'.$donnees['id'].'</td>');
       echo ('<td>'.$donnees['nom'].'</td>');
       echo ('<td>'.$donnees['prenom'].'</td>');
       echo ('<td>'.$donnees['ladate'].'</td>');
       echo ('<td>'.$donnees['lieu'].'</td>');
       echo ('<td><a href="modifUtilisateur.php" target="_blank">Modifier</a></td>');
       echo('</tr>');
   }
       echo('<tbody>');
       echo('</table>');
      } else {
        echo "0 results";
    }
$idcom->close(); 
}
else {
    //echo "Veuillez remplir la formulaire";
    echo "<script language=\"javascript\">";
    echo "alert('Veuillez remplir la formulaire')";
    echo"</script>";
}
  ?>
  
  </body>
</html>