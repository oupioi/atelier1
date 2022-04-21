<?php  
session_start();

	if(isset($_POST['submit'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$role = $_POST['role'];

		$db = new PDO('mysql:host=localhost;dbname=atelier_professionnel','root','root');

		$sql = "SELECT * FROM users WHERE username  = '$user' ";
		$result = $db->prepare($sql);
		$result->execute();

		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users(username,password,role) VALUES ('$user','$pass','$role')";
		$req = $db->prepare($sql);
		$req->execute();
		echo "Enregistrement effectué ";
	}

?>

