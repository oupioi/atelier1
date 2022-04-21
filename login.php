<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page de connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 id='inter'>Login</h1>
	<?php 
		if (isset($_SESSION['user'])){
			echo "<center><h1>Vous etes connecté en tant que :". $_SESSION['user']."</h1></center>";

			$db = new PDO('mysql:host=localhost;dbname=atelier_professionnel','root','root');
			include('index.php');
		}
		else{
			?>
	<div id="frm">
		<form action="process.php" method="POST">
			<p>
				<label><b>Username :</b></label>
				<input type="text" id="user" name="user">
			</p>
			<p>
				<label><b>Password :</b></label>
				<input type="password" id="pass" name="pass">
			</p>
			<p>
				<input type="submit" id="btn" name="submit">
			</p>
		</form>
	</div>

			<?php
		}
	 ?>

</body>
</html>