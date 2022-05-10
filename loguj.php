<?php 
	
	session_start();

	//inicializace proměnných pro vložení do databáze

 	$email =  $_POST["email"];  
 	$pass =  $_POST["Password"];  


 	




 	//připojení + zápís do databáze

 	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "blog_db";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT poznamka,name,role FROM users WHERE email = '".$email."' AND password = '".$pass."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
        	$_SESSION["note"] = $row["poznamka"];
			$_SESSION["name"] = $row["name"];
        	$_SESSION["role"] = $row["role"];


        	echo $_SESSION["name"];
        	header('Location: index.php');
        	exit;
    	}
	} else {
	    echo "Spatne udaje<br> ";
	        	echo "<a href='login.php'>Zkusit znovu</a>";
	}

	mysqli_close($conn);


?>
