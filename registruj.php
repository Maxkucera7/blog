<?php 


session_start();


	//inicializace proměnných pro vložení do databáze
 	$name =  $_POST["name"];
 	$email =  $_POST["email"];  
 	$pass =  $_POST["Password"];  
 	$note =  $_POST["note"];  
 	$question =  $_POST["question"];



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

	$sql = "INSERT INTO users (name, email, password, poznamka, otazka, otazka_odpoved)
	VALUES ('".$name."', '".$email."', '".$pass."', '".$note."', 'Your mothers name ','".$question."')";

	if ($conn->query($sql) === TRUE) {

	   		header('Location: index.php');
        	exit;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}


	mysqli_close($conn);    


?>
