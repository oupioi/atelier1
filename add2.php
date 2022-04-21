<html>
<head>
	<title>Ajouter nouvel utilisateur</title>
</head>
<?php include 'header.html' ?>
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$nom = mysqli_real_escape_string($mysqli, $_POST['nom']);
	$priorite = mysqli_real_escape_string($mysqli, $_POST['priorite']);
	$etat = mysqli_real_escape_string($mysqli, $_POST['etat']);
		
	// checking empty fields
	if(empty($id) || empty($nom) || empty($priorite)|| empty($etat)) {
				
		if(empty($id)) {
			echo "<font color='red'>Le champ id est absent.</font><br/>";
		}
		
		if(empty($nom)) {
			echo "<font color='red'>Le champ non est absent.</font><br/>";
		}
		
		if(empty($priorite)) {
			echo "<font color='red'>Le champ priorite est absent.</font><br/>";
		}
		if(empty($etat)) {
			echo "<font color='red'>Le champ etat est manquant.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO demande(id,nom,priorite,etat) VALUES('$id','$nom','$priorite','$etat')");
		
		//display success message
		echo "<font color='green'>Votre tâche à bien était ajouter.";
		echo "<br/><a href='add.php'>Retour</a>";
	}
}
?>
</body>
</html>