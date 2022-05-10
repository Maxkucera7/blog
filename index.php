<?php

session_start();

include_once "navbar.php";


?>
<!DOCTYPE html>
<html>
<head>

	<title>Blogovací systém</title>

	<link rel="stylesheet" href="css.css">
	<script src="imports/jquery-3.3.1.min.js"></script>


</head>
<body>

	<center>

	<?php

	//oznámení uživateli, že je přihlášen

		if($_SESSION){
		echo "<h2>".$_SESSION["name"]."</h2>";
		echo "<br>Jsi přihlášen, nyní můžeš být na blogu<br>";

		if($_SESSION["role"] == 2){
			echo "jsi admin<br>";


		}

		echo "<a href='logout.php'>Logout</a>";

		

		
	}
	else{


	?>
	<a href="registrace.php">Registration</a>
	<br>
	<a href="login.php">Login</a>
	<?php }?>
	<br>
	<a href="blog.php">Blog</a>
	<br><br>
	<?php
	if($_SESSION){
	if($_SESSION["role"] == 2){
	?>
			<h1>Úprava uživatelských rolí</h1>
			<h3>Role : 0 - čtenář, 1 - editor, 2 - admin</h3>

			<?php

			//vypis uzivatelu z databaze

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "blog_db";

			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT name, role FROM users";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    
			    while($row = $result->fetch_assoc()) {
			    	if($row["name"] != $_SESSION["name"]){
			    		echo '
						<form method="POST" action="zmenroli.php" style="width: 10%;">
							
							<h3 id="user">'.$row["name"].'</h3>
								  <input type="hidden" name="name" value="'.$row["name"].'">
								  <input type="number" name="role" min="0" max="2" step="1" value="'.$row["role"].'">
								  <br><br>
								  <input type="submit" value="Change">
								  	<hr>
						</form>
						';
			    	}
			        
			    }
			} else {
			    echo "0 results";
			}
			$conn->close();


			//kod na vzobrazeni vypsany uzivatelu do oddilu
			?>

	<?php	
		}}

	?>
	</center>

</body>
</html>