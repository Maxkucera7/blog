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
		<h1 class="hlavni_nadpis">Vytvořit post</h1>

	 	<textarea id="text_comentu" type="input" style="height: 500px;width:60%;"></textarea>
		<br><br>
		<label for="name">Jméno</label>
		<input type="text" id="name" name="name">
		<input type="submit" id="sub" value="Odeslat">
		<br>
	</center>

<script type="text/javascript">
	$(document).ready(function(){
		    $("#sub").click(function(){


		    	var text = $("#text_comentu").val();
		    	var autor = "<?php echo $_SESSION["name"]; ?>";
		    	var name = $("#name").val();

		    	if(name == ""){
		    		name = autor + "_Post"; 
		    	}



		    	window.location = "postuj.php?text="+text+"&autor="+autor+"&name="+name+"";
		    });
		});
</script>
</body>
</html>