<?php
require_once ('includes/connexion_bdd.php'); // inclure une fois le fichier header.php qui se trouve dans le dossier includes
?>

<?php



if(isset($_SESSION['admin_id'])){
	
	header('location: test_connexion.php');
	
	}else{
	
		if(isset($_POST['submit'])){
			$login = $_POST ['login'];
			$mdp = ($_POST['mdp']);
		
			if($login && $mdp){
			
				$select = $db->query("SELECT id FROM agenda_util WHERE login='$login'AND mdp='$mdp'");
				//Test du résultat de la requ�te
				if($select->fetchColumn()){
					$select = $db->query("SELECT * FROM agenda_util WHERE login='$login'AND mdp='$mdp'");
					$result = $select->fetch(PDO::FETCH_OBJ);
					$_SESSION['admin_id'] = $result->id;
					$_SESSION['admin_nom'] = $result->nom;
					$_SESSION['admin_prenom'] = $result->prenom;
					$_SESSION['admin_login'] = $result->login;
					$_SESSION['admin_mdp'] = $result->mdp;
					$_SESSION['admin_connexion'] = $result->connexion;

	     		//Acc�s � l'application
				header('location: test_connexion.php');
		 
		} else {
	     //refus authentification non valide
	     	echo '<script>alert("login ou Mot de Passe incorrect")</script>';
		}
	
		
		}else{
			
			echo '<script>alert("veuillez remplir tous les champs")</script>';
		
		}
	}

}

?>
<html>

 <LINK rel="" /> 
 
 <body>
  <form action="" method="POST">
  
  <h1>Connexion</h1>
  <div>
        
    <div><input placeholder="Login" id="login" name="login" type="text" required/>
    <input placeholder="Mot de passe" id="mdp" name="mdp" type="password" required/>
        
    </div>
    <div class="button">
        <button type="submit" name="submit">Se connecter</button>
      <button type="reset" >Annuler</button>
    </div>
     
    
</form>
</div>
</html>