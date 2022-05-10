<?php 


session_start();


	//inicializace proměnných pro vložení do databáze
 	$text =  $_GET["text"];
 	$autor =  $_SESSION["autor"]; 
 	$name =  $_GET["name"];  




 	//připojení + zápís do databáze

 	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "blog_db";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Kontrola zdařilého připojení
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO posts (autor, text, name)
	VALUES ('".$autor."', '".$text."', '".$name."')";

	if ($conn->query($sql) === TRUE) {

	   		header('Location:blog.php');
        	exit;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}


	mysqli_close($conn);    


?>
