<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Mon app web</title>
    <link rel="stylesheet" href=styles.css>
</head>

<body>
<header></header>
<h1> Les 4 fantastiques EZMIABAN </h1>
<fieldset id="main">
    <legend> EZMIABAN : </legend>
    <br>
    <form action="index.php" method="post">
        <label>Nom de l'employé :</label>
        <input type="text" name="nom" value=""><br><br>
        <label>Produit:</label>
        <input type="text" name="produit" value=""><br><br>
        <fieldset>
            <legend>Action</legend>
            <input type="radio" name="action" value="modifprix">modif
            <input type="radio" name="action" value="affiche">affiche
        </fieldset>
        <br>
        <label>Lieu :</label>
        <input type="text" name="lieu" value=""><br><br>
        <br>

        <label>Liste des commandes :</label>
        <br>
        <br>
        <label>Date de debut </label>
        <input type="date" name="dated"><br><br>
        <label>Date de fin</label>
        <input type="date" name="datef"><br><br>

        <input type="submit" name="valider" value=" Envoyer "> 
        
        <input type="reset" value="Annuler">
    </form>
</fieldset>
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
if(!empty($_POST['nom']) 
         && empty($_POST['produit']) 
         && empty($_POST['action']) 
         && empty($_POST['lieu'])
         && empty($_POST['dated']) 
         && empty($_POST['datef']) 
         ){
        $nom = $idcom->escape_string($_POST['nom']);
     
       /*  $requete = "SELECT Employees.EmployeeID , Orders.EmployeeID, Orders.OrderID, Orders.CustomerID
        FROM Employees
        INNER JOIN Orders  
        ON Employees.EmployeeID = Orders.EmployeeID
        WHERE Employees.EmployeeID = $nom"; */

        $requete = "SELECT orders.OrderID,employees.FirstName ,employees.LastName,customers.CompanyName 
        FROM orders ,customers,employees 
        WHERE orders.EmployeeID= employees.EmployeeID 
        and orders.CustomerID=customers.CustomerID 
       /* and employees.firstName='$prenom' */
        and employees.lastName='$nom'";
        

        $result = $idcom->query($requete);
        while ($reponse = $result->fetch_array(MYSQLI_ASSOC)){
            echo "<br/>";
            echo "Nom de l'employé :" .$reponse ['LastName']." <label> Numero de commande : </label> ".$reponse ['OrderID'] ."  Client :". $reponse ['CompanyName'] ;
        }
         }
        
     if($_POST['action'] == "modifprix"){

     
  if(empty($_POST['nom']) 
        && !empty($_POST['produit']) 
        && !empty($_POST['action']) 
        && empty($_POST['lieu'])
        && empty($_POST['dated']) 
        && empty($_POST['datef']) 
        ){
     
       $produit = $idcom->escape_string($_POST['produit']);
       $action = $idcom->escape_string($_POST['action']);
       
  
       $requete = "SELECT UnitPrice , ProductName
       FROM Products
       WHERE ProductName = '$produit'";
       
       $result = $idcom->query($requete);
       
       $reponse = $result->fetch_row();
           echo "<br/>";
           echo  $reponse ['ProductName']." ".$reponse ['UnitPrice'] ;

           echo "<h1> Modification prix</h1>";
           echo " <fieldset id=\"main\">";
           echo " <legend>Modification du prix :</legend>";
           echo "<form action=\"traitementUpdate.php\" method=\"post\">";
           ?>
              <label>prix de base :</label>
           <?php
           echo "<input type=\"numeric\" name=\"Prix\" readonly =\"true\" value=\"$reponse[0]\">";
           ?>
           <br>
               <label>nom :</label>
           <?php
           echo "<input type=\"numeric\" name=\"prod\" readonly =\"true\" value=\"$reponse[1]\">";
           ?>
           
           <br><br>
           <label>prix modifie:</label>
               <?php
                echo "<input type=\"numeric\" name=\"prix\" value=\"$reponse[0]\">";
                ?>
           <br><br>
               <input type="submit" name="valider" value=" Modifier "> 
               <input type="reset" value="Annuler">
             
             </fieldset>
           </form>
           
           <?php
        }
    }
    
if ($_POST['action'] == "affiche"){
       if(empty($_POST['nom']) 
         && !empty($_POST['produit']) 
         && !empty($_POST['action']) 
         && empty($_POST['lieu'])
         && empty($_POST['dated']) 
         && empty($_POST['datef']) 
         ){
        
        $produit = $idcom->escape_string($_POST['produit']);
        $action = $idcom->escape_string($_POST['action']);

        $requete0 = "SELECT ProductID FROM Products WHERE ProductName = '$produit'";
        $result0 = $idcom->query($requete0);
        while ( $reponse0 = $result0->fetch_row() ) {
            $requete1="SELECT Orders.CustomerID, Orders.OrderID, Customers.CompanyName
            FROM Orders
            INNER JOIN OrderDetails
            ON Orders.OrderID = OrderDetails.OrderID
            JOIN Customers
            ON Orders.CustomerID = Customers.CustomerID
            WHERE OrderDetails.ProductID = '$reponse0[0]' ORDER BY Customers.CompanyName ASC ";
    
    
            $result1 = $idcom->query($requete1);
          echo " <h1>$produit</h1> ";

           while( $reponse1 = $result1->fetch_row()){
    
           
               echo "<br/>";
                echo  " Nom societe : " .$reponse1 [2]." <br/> N° Commande : ".$reponse1 [1] ;
                echo "<br/>";
            }
        }

       
         }
        }
       
        if(!empty($_POST['nom']) 
         && empty($_POST['produit']) 
         && empty($_POST['action']) 
         && !empty($_POST['lieu'])
         && empty($_POST['dated']) 
         && empty($_POST['datef']) 
         ){
        $nom = $idcom->escape_string($_POST['nom']);
       
        $lieu = $idcom->escape_string($_POST['lieu']);
  
        $requete = "SELECT Orders.EmployeeID, Customers.CompanyName, Customers.ContactName, Employees.LastName
        FROM Orders
        INNER JOIN Customers
        ON Orders.CustomerID = Customers.CustomerID
        JOIN Employees
        ON Orders.EmployeeID = Employees.EmployeeID
        WHERE Orders.ShipCity = '$lieu' AND Employees.LastName = '$nom' ORDER BY  Customers.CompanyName ASC";

$result = $idcom->query($requete);
while( $reponse1 = $result->fetch_row()){

       
    echo "<br/>";
     echo  $reponse1 [0]." ".$reponse1 [1]." ".$reponse1 [2] ;
}
         }

        if(empty($_POST['nom']) 
         && empty($_POST['produit']) 
         && empty($_POST['action']) 
         && empty($_POST['lieu'])
         && !empty($_POST['dated']) 
         && !empty($_POST['datef']) 
         ){
      
        $dated = ($_POST['dated']);
        $datef = ($_POST['datef']);



        $requete = "SELECT Orders.OrderID, Products.ProductID, Products.ProductName, Orders.OrderDate, Orders.ShipAddress 
        FROM Orders 
        INNER JOIN Products 
        WHERE Orders.OrderDate 
        BETWEEN '1996-07-03 00:00:00' AND '1996-07-04 00:00:00'";

$result = $idcom->query($requete);
while( $reponse1 = $result->fetch_row()){

       
    echo "<br/>";
     echo  $reponse1 [0]." ".$reponse1 [1]." ".$reponse1 [2] ;
}
         }






















     
      

    
 
        $idcom->close();


?>

<footer> <br/>Formulaire fait par les 4 EZMIABAN </footer>
</body>
</html>
