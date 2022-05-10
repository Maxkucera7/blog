<?php

session_start();
include_once "navbar.php";

$_SESSION["new_pass"] = 0;
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
			<h1 class="hlavni_nadpis" style="text-decoration:underline;">Login</h1>
			
			<form method="POST" action="loguj.php">

			 	<h3>E-mail</h3>
			  	<input type="text" class="inputy" name="email" placeholder="E-mail" required><br>
			  	<h3>Password</h3>
			  	<input type="Password"id="Password" class="inputy" name="Password" placeholder="Password" required>

			  	<br><br>
			    <input type="submit" id="sub" value="Log-in">
			    <br>
			    <br>
			    <a href='reset_pass.php'>Zapomenute heslo?</a>

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
