<?php
	session_start();
	include_once "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>

	<title>Blogovací systém</title>

	<script src="imports/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="css.css">

</head>
<body>

	<center>	
		<h1 class="hlavni_nadpis" style="text-decoration:underline;">Blog</h1>

		<?php

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "blog_db";

			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT name, text, id FROM posts";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    
			    while($row = $result->fetch_assoc()) {
			    		echo '
							<div class="obal" style="width: 50%;border:none;border-top:0.5px solid grey;border-bottom:0.5px solid grey;">
							<div class="post" id="'.$row["id"].'" style="text-align: left;cursor: pointer;">
								<h2 class="hlavni_nadpis" >'.$row["name"].'</h2>
								<p >Vypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln c
								lankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clankuVypln clanku</p>
							</div>
							</div>
						';
			    	
			        
			    }
			} else {
			    echo "0 results";
			}
			$conn->close();


			
		?>

		
		</center>


	<script type="text/javascript">
		$(document).ready(function(){
		    $(".post").click(function(){

		    	window.location = "post.php?id="+this.id+"";

		    });
		});
	</script>	
</html>