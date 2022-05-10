<?php 


session_start();


	//inicializace proměnných pro vložení do databáze
 	$text =  $_GET["text"];
 	$autor =  $_SESSION["name"]; 
 	$post_id =  $_GET["post"];  




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

	$sql = "INSERT INTO comments (autor, text, post_id)
	VALUES ('".$autor."', '".$text."', '".$post_id."')";

	if ($conn->query($sql) === TRUE) {

	   		header('Location:post.php?id='.$post_id.'');
        	exit;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}


	mysqli_close($conn);    


?>
