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


	

	$str = $_GET['name'];

	/*
		$req is a sql request : select main information about the show
		=> popularity
		=> poster_path
		=> last_air_date
		=> in_production
		=> number_of_episodes
		=> number_of_seasons
		=> overview
	*/
	$req = "SELECT poster_path,popularity,last_air_date,in_production,number_of_episodes,number_of_seasons,overview FROM series WHERE name =  '$str'";

	$res = requete_bdd($bdd, $req);
	

	function requete_bdd($bdd, $req){

		/* 
			
			------- ARGUMENTS
			$req is a string
			$bdd is the database

			------- RETURNED RESULT
			$data is an array that'll contain the request result


		*/
		

		$statement = $bdd->prepare($req);
		$statement->execute();
		$data = $statement->fetchAll();
		return ($data);
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>

		<!-- STYLESHEETS -->
		<link rel="stylesheet" type="text/css" href="css/search.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/serie.css"/>

		<title>
			<?php
				echo $_GET["name"]; // show title
			?>
		</title>
	</head>

	<body>
		<header>
			<div class="logo">
				<img src="img/reduced-logo.gif" alt="Logo Netflex" id="logo"/>
			</div>

				<h1>
					Netflex - Informations Série
				</h1>
		</header>

		<div id="container">

			<div class='row'>
				<div class='col-lg-4'>
					<?php
						// poster
						echo "<img class='img-rounded' alt='Poster Path' src='https://image.tmdb.org/t/p/w342" . $res[0]["poster_path"] . "'/>";
					?>
				</div>
				<div class='col-lg-4'>
					<h2>
						<?php
							// show title
							echo $_GET["name"];
						?>
					</h2>
					<p>
						<?php
						/*
							print:
							if the shows is in production
							if not, print the last air date
						*/
						if($res[0]["in_production"] == 1){
							echo "<p>En production</p>";
						}else{
							echo "<p>Terminée le " . $res[0]["last_air_date"] ."</p>";
						}
						?>
					</p>
					<h3>
						Résumé
					</h3>
					<?php

						/* main information about the show
						- overview
						- number of seasons
						- number of episodes
						- popularity of the show
						*/
						echo "<p class='resume'>" . $res[0]["overview"] ."</p>";
						echo "<p><span class='important'>Nombre de saisons: " . $res[0]["number_of_seasons"]. "</span>";
						echo "<span class='important'>Nombre d'épisodes: " . $res[0]["number_of_episodes"]. "</span></p>";
						echo "<p>Score: " . $res[0]["popularity"] . "</p>";

					?>	

					<div class="episodes_nav">
					<!-- menu that allows the user to go an specific episode of the show -->
						<label class="selectlabel">Saison : </label>
						<!-- select menu for the seasons of the show -->
						
						<select id="seasons_menu" name="seasons_menu">
							<?php
								$req = "SELECT id FROM series WHERE name = '$str'";

								// will return the id of the show
								$res = requete_bdd($bdd, $req);

								$serie_id = $res[0]['id']; // the show id

								$req = "SELECT season_id FROM seriesseasons WHERE series_id = '$serie_id'";

								// will return the seasons id for the show
								$result = requete_bdd($bdd,$req);

								$i = 0;
								while($i < sizeof($result)){
									// the boucle will print the season number of the show as long as there are in the $result from the last request

									$seasonid = $result[$i]['season_id'];
									$req = "SELECT name FROM seasons WHERE id = '$seasonid'";
									//will return the seasons number for the show
									$res = requete_bdd($bdd,$req);	
								
									foreach ($res as $key) {
										echo "<option>" . $key['name'] . "</option>";
									}
									$i++;
								}
							?>
						</select>
						

						<label class="selectlabel">Episode :</label>
						<!-- select menu for the episodes of the show based on the season selected -->
						<select id="episodes_menu" name="episodes_menu">
							<?php
							if(isset($_GET["seasonOK"])){
								$season = $_GET["seasons_menu"];
							echo "<option>" . $season . "</option>"; 
							}
							
							$req = "SELECT id FROM series WHERE name = '$str'";

								// will return the id of the show
								$res = requete_bdd($bdd, $req);
							?>
						</select>
					</div>				
				</div>
			</div>
			
		</div>


			
		</div>

		<footer>
			
		</footer>
		<!-- jquery script --><script type="text/javascript" src="js/jquery-3.1.1.js"></script>
		<!-- bootstrap script --><script type="text/javascript" src="js/bootstrap.js"></script>
		<!-- search script --><script type="text/javascript" src="js/search.js"></script>
	</body>
</html>	


<?php
	//close connection
	$bdd = null;
?>