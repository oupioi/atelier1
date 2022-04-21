<?php
 	session_start();
 	
 	$idEmp = $_SESSION['id'];
 		if($_SESSION["role"] !="Employe"){
 			header('Location: inter.php');
 		}
 				
//connexion à la database
	$db = new PDO('mysql:host=localhost;dbname=atelier_professionnel','root','root');
$sql ="SELECT * FROM demande WHERE idEmploye  = '$idEmp' ORDER BY id ";
	$result  = $db->prepare($sql);
	$result->execute();
?>

<html>
<head>	
	<title>Page d'accueil</title>
</head>

<?php include 'header.html' ?>

<body>
<div id='tableau'>
	<table width='80%'>
	<tr>
		<td id='titre'>Id</td>
		<td id='titre'>Nom</td>
		<td id='titre'>Etat</td>
		<td id='titre'>Priorite</td>
		<td id='titre'>idEmploye</td>
	</tr>
	<?php 
	// la fonction retourne les données sous forme de tableau
	while($res = $result->fetch()) { 		
		echo "<tr>";
		echo "<td>".$res['id']."</td>";
		echo "<td>".$res['nom']."</td>";
		echo "<td>".$res['etat']."</td>";	
		echo "<td>".$res['priorite']."</td>";
		echo "<td>".$res['idEmploye']."</td>";
		echo "<td><a href=\"employeModifier.php?id=$res[id]\">Modifier</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Supprimer</a></td>";		
	}
	?>
	</table>
</body>
</html>