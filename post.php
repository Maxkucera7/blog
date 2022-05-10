<?php

session_start();
include_once "navbar.php";

$id = $_GET["id"];

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "blog_db";

			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT name, autor, vytvoreni, text FROM posts";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    
			    while($row = $result->fetch_assoc()) {
			    		$name = $row["name"];
			    		$autor = $row["autor"];
			    		$vytvoreni =  $row["vytvoreni"];
			    		$text =  $row["text"];
			        
			    }
			} else {
			    echo "0 results";
			}
			$conn->close();


?>
<!DOCTYPE html>
<html>
<head>

	<title>Blogovací systém</title>

	<link rel="stylesheet" href="css.css">
	<script src="imports/jquery-3.3.1.min.js"></script>

</head>
<body>
	



	<center >
		<div style="width: 60%;">
			<h1 class="hlavni_nadpis" style="text-decoration:underline;"><?php echo $name; ?></h1>
			<hr style="width: 30%;">
				<p style="width: 30%;text-align: left;">Vytvořil/la<span style="float:right;"><?php echo $autor; ?> </span></p>
				<p style="width: 30%;text-align: left;">Vytvořeno<span style="float:right;"><?php echo $vytvoreni; ?> </span></p>
			
			<p style="border:1px solid grey;"><?php echo $text; ?></p>
		</div>
	
	<div style="width: 60%;">
			<h2 class="hlavni_nadpis">Konetáře</h2>
			<hr>
			<?php

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "blog_db";

				
				$conn = new mysqli($servername, $username, $password, $dbname);
				
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "SELECT autor, text FROM comments WHERE post_id = '".$id."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

				    
				    while($row = $result->fetch_assoc()) {
				    	$autor = $row["autor"];
				    	$autor = $row["autor"];
					    	if($autor == ""){
					    		$autor = "anonym";
					    	}
				    		echo '<div style="background-color: purple;color:white;font-size:140%;"> <span >'.$row["text"].'</span> __ by '.$autor.'</div><br>';
				        
				    }
				} else {
				    echo "0 results";
				}
				$conn->close();

			?>


				<h3>Napsat Komentář</h3>
			  	<textarea id="text_comentu" type="input" style="height: 110px;width:100%;"></textarea>
			  	<br><br>
			    <input type="submit" id="sub" value="Odeslat">
			    <br>


			
	</div>
	</center>

<script type="text/javascript">
	$(document).ready(function(){
		    $("#sub").click(function(){
		    	var text_coment = $("#text_comentu").val();
		    	var post = <?php echo $id; ?>;
		    	window.location = "coment.php?text="+text_coment+"&post="+post+"";
		    });
		});
</script>
</body>
</html>