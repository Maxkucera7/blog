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

			<h1 class="hlavni_nadpis" style="text-decoration:underline;">Registration</h1>
			
	
			<form method="POST" action="registruj.php">

			 	<h3>Name*</h3>
			  	<input type="text"class="inputy" name="name" placeholder="Name" required><br>
			 	<h3>E-mail*</h3>
			  	<input type="text" class="inputy" name="email" placeholder="E-mail" required><br>
			  	<h3>Password*</h3>
			  	<input type="Password"id="Password" class="inputy" name="Password" placeholder="Password" required>
			  	<input type="Password"id="Password-control" class="inputy" name="Password-control" placeholder="Password control" required><br>
			  	<h3>Control question*</h3>
			  	Your mother's name
  				<br><br>
			  	<input type="text" class="inputy" name="question" placeholder="Your answer" required><br>
			  	<h3>Note</h3>
			  	<input type="text" class="inputy" name="note" placeholder="Note"><br>
			  	<br>
			    <input type="submit" id="sub" value="Register">

			</form>

	</center>

	<script type="text/javascript">

		/*

		$(document).ready(function(){
		    $("#sub").click(function(){
		    	var pass = $("#Password").text();
		    	var pass_control = $("#Password-control").text();
		        if(pass != pass_control){
		        	alert("ajaja");
		        }
		    });
		});*/

	</script>
</body>
</html>
