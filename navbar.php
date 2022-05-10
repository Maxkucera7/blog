<!DOCTYPE html>
<html>
<head>
	<!-- Navbar pripraven na import do ostanich stranek -->
	<title></title>
	<style type="text/css">
			ul {
			    list-style-type: none;
			    margin: 0;
			    padding: 0;
			    overflow: hidden;
			    border: 1px solid #e7e7e7;
			    background-color: #f3f3f3;
			}

			li {
			    float: left;
			}

			li a {
			    display: block;
			    color: #666;
			    text-align: center;
			    padding: 14px 16px;
			    text-decoration: none;
			}

			li a:hover:not(.active) {
			    background-color: #ddd;
			}

			li a.active {
			    color: white;
			    background-color: #4CAF50;
			}


	</style>
</head>
<body>
	<ul>
	  <li><a class="active" style="background-color: purple;" href="index.php">Home</a></li>
	  <li><a href="blog.php">Blog</a></li>

	  
	  <?php
	  if($_SESSION){

			if($_SESSION["role"] > 0){
				echo '<li><a href="create.php">Create post</a></li>';
			}

			echo '<li><a href="logout.php">Logout</a></li>';
		
		}?>


</ul>

</body>
</html>
