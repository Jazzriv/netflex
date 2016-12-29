<?php
	try{
		//open connection
		$bdd = new PDO(
			"mysql:host=localhost;dbname=netflex",
			"root",
			""
		);

		$bdd->exec("SET NAMES 'UTF8'");
	} 
	catch(PDOException $e){
		echo $e->getMessage();
	}					
?>

<!doctype html>
	<head>
		<meta charset="utf-8"/>

		<!-- STYLESHEETS -->
		<link rel="stylesheet" type="text/css" href="index.css"/>


		<title>Netflex - Projet informatique</title>
	</head>

	<body>
		<header>
			<img src="../img/logo.png" alt="Logo Netflex" id="logo" />
		</header>

		<div id="overlay"></div>
		<div id="main-container">

	
			<div id="content">
				<!-- subscription div / popup content-->
				<div class="panel" id="popup">
					<h2>S'inscrire</h2>
					<img class="close" src="../img/close.png" alt="Fermer la fenêtre"/>
					<form id="subform" method="POST" action="test.php">
						<label for="identifier2">Nom d'utilisateur :</label>
						<input type="text" name="identifier2" id="identifier2">
						<label for="password2">Mot de passe :</label>
						<input type="password" name="password2" id="password2" placeholder="Mot de passe">
						<input type="password" name="password3" placeholder="Confirmer le mot de passe">
						<label for="email">Adresse email :</label>
						<input type="email" name="email" id="email" placeholder="Adresse mail">
						<input type="submit" value="Inscription" name="subbtn">
					</form>
				</div>
			</div>


				<!-- connection div -->
				<div class="panel" id="connection">
					<h2>Se connecter</h2>
					<form id="conform" method="POST" action="accueil.php">
						<input type="text" name="identifier1" placeholder="Nom d'utilisateur">
						<input type="password" name="password1" placeholder="Mot de passe">
						<input type="submit" value="Connexion" name="conbtn">
					</form>
					<div id="popupbtn"><p>Pas encore inscrit ?</p></div>
				</div>
			</div>

		</div>

		<!-- SCRIPTS -->
		<!-- popup script --><script type="text/javascript" src="popup.js"></script>
		<!-- jquery script --><script type="text/javascript" src="jquery-3.1.1.js"></script>
		<?php
			//close connection
			$bdd = null;
		?>
	</body>
</html>