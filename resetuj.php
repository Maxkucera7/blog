<?php 
	
	session_start();

	//inicializace proměnných pro vložení do databáze

 	$email =  $_POST["email"];  
 	$pass =  $_POST["Password"];
 	$question =  $_POST["question"];


 	




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

	$sql = "SELECT otazka_odpoved FROM users WHERE email = '".$email."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {	

	    	//kontrola jestli sedí otazka zadaná s otazkou z databaze a nasledna zmena hesla / vraceni uzivatele zpet

	    	if($row["otazka_odpoved"] == $question){

	    		// pokud je odpoved spravna, tak update hesla v databazi
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "UPDATE users SET password='".$pass."' WHERE email='".$email."'";

				if (mysqli_query($conn, $sql)) {
				    header('Location: login.php');
        			exit;
				} else {
				    echo "Error updating record: " . mysqli_error($conn);
				}

				mysqli_close($conn);

	    	}else{
	    		echo "Spatna odpoved<br> ";
	        	echo "<a href='reset_pass.php'>Zkusit znovu</a>";
	    	}

    	}
	} else {
	    header('Location: login.php');
	    $_SESSION["new_pass"] = 1;
        exit;
	}

	mysqli_close($conn);


?>
