<?php 
	
	session_start();

	//inicializace proměnných pro vložení do databáze

 	$name =  $_POST["name"];  
 	$role =  $_POST["role"];
 	


 	




 	//připojovací údaje

 	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "blog_db";


				$conn = mysqli_connect($servername, $username, $password, $dbname);

				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "UPDATE users SET role='".$role."' WHERE name='".$name."'";

				if (mysqli_query($conn, $sql)) {
				    header('Location: index.php');
        			exit;
				} else {
				    echo "Error updating record: " . mysqli_error($conn);
				}

				mysqli_close($conn);


?>
