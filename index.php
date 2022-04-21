<?php
 	session_start();
 		if($_SESSION["role"] !="Responsable"){
 			header('Location: inter.php');
 		}
 				
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM demande ORDER BY id "); // using mysqli_query instead
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
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['id']."</td>";
		echo "<td>".$res['nom']."</td>";
		echo "<td>".$res['etat']."</td>";	
		echo "<td>".$res['priorite']."</td>";
		echo "<td>".$res['idEmploye']."</td>";
		echo "<td><a href=\"edit.php?id=$res[id]\">Modifier</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Supprimer</a></td>";		
	}
	?>
	</table>
	</div>

	<div id='divb'>
		<a href="add.php"><button id="button">Assigner une tâche</button></a>
	</div>
</body>
</html>