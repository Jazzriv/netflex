<!--

	Author : Olivia
	Last modification: 02/01/2017

-->



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

	
	$search = $_GET["search"];
	
	/* 
		the request will search for the shows title that'll contain $search
	*/
	$req = "SELECT name,popularity,poster_path FROM series WHERE name LIKE '%$search%'";

	$res = requete_bdd($bdd, $req);
		

	function requete_bdd($bdd, $req){
		/* 
			
			------- ARGUMENTS
			$req is a string
			$bdd is the database

			------- RETURNED RESULT
			$data is an array that'll contain the request result

		*/
		$statement = $bdd->query($req);
		$data = $statement->fetchAll();
		return ($data);
	}

?>

<html>
	<head>
		<meta charset="utf-8"/>

		<!-- STYLESHEETS -->
		<link rel="stylesheet" type="text/css" href="css/search.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>

		<title>Recherche - Netflex</title>
	</head>

	<body>
		<header>
			<div class="logo">
				<img src="img/reduced-logo.gif" alt="Logo Netflex" id="logo"/>
			</div>
				<h2>
					Vous avez recherché : 
					<?php
						echo $search;
					?>
				</h2>
		</header>

		<div id="container">
			
			<?php
				$i = 1;
				echo "<div class='row'>";
				while($i < sizeof($res)){
					
					foreach ($res as $value) {
						if(($i % 3) == 0){
							echo "<div class='row'>";
						}
						/* 
							serie.php is a dynamic page that shows the show information based on its title

							each serie (image + name) is contained in a bootstrap column and has the class 'serie'

							the serie page is dynamic : its unique for each show via the following boucle
						*/
						
						echo "<div class='col-xs-4 serie'><img class='img-rounded' src='https://image.tmdb.org/t/p/w92" . $value["poster_path"];
						echo "'/><p class='serietitle'><a href='serie.php?name=" . urlencode($value["name"]) . "'>" . $value["name"] . "</a></p></div>";

						if(($i % 3) == 0){
							echo "</div>";
						}
						$i++;
					}					
				}
				echo "</div>";

				
				
			?>
			
		</div>

		<footer>
			
		</footer>
		<!-- jquery script --><script type="text/javascript" src="js/jquery-3.1.1.js"></script>
		<!-- bootstrap script --><script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>	


<?php
	//close connection
	$bdd = null;
?>