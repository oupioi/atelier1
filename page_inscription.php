<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>S'inscrire</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="frm">
		<form action="inscription.php" method="POST">
			<h1>S'inscrire</h1>
			<p>
				<label>Username :</label>
				<input type="text" id="user" name="user">
			</p>
			<p>
				<label>Password :</label>
				<input type="password" id="pass" name="pass">
			</p>
	        <SELECT name="role" size="1">
	        <OPTION>Employe
	        <OPTION>Utilisateur
	        <OPTION>Responsable 
			<p>
				<input type="submit" id="btn" name="submit">
			</p>
		</form>
	</div>

</body>
</html>