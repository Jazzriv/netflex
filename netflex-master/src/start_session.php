<?
session_start();

$_SESSION['name'] = $_POST['name'];
$_SESSION['password'] = $_POST['password'];
$servername = "localhost";
$username = "name";
$password = "password";

// Create connection
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