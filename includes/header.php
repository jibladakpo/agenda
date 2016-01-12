<?php 
if (isset ( $_SESSION ['admin_id'] )) {
echo'<!DOCTYPE html>
<html>

   <LINK rel="stylesheet" href="styles/General.css" /> 

  
    <div id="header">
      <p><a href="#">Consultation externe - CHIC des Andaines</a></p>
    </div>
    
    <nav class="navbar">
      
      <p id="accueil.php"><a href="">accueil</a></p>
      <p id="docteur"><a href="docteur.php">Médecins</a></p>
      <p id="patient"><a href="patient.php">Patients</a></p>
      <p id="rdv"><a href="rendez-vous.php">Rendez-vous</a></p>
      <p id="deconnexion"><a href="deconnexion.php">Déconnexion</a></p>
    </nav>
  
  
</html>';}
 
else {header ('location: index.php');}

	