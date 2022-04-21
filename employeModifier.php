<?php
//connexion à la database
$db = new PDO('mysql:host=localhost;dbname=atelier_professionnel','root','root');
//check de $_POST de update
if(isset($_POST['update']))
{	

	$id = $_POST['id'];
	$etat = $_POST['etat'];
	
	// check si les champs ne sont pas vide		
		if(empty($etat)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
				
	 else {	
		//mettre à jour la table
		$sql = "UPDATE demande SET etat='$etat' WHERE id=$id";
		$result  = $db->prepare($sql);
		$result->execute();
		
		//redirection
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selectionner les données avec l'id qui vient de la page index
$sql="SELECT etat FROM demande WHERE id=$id";
$result=$db->prepare($sql);
$result->execute();

// la fonction retourne les données sous forme de tableau
while($res = $result->fetch())
{

	$etat = $res['etat'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>
<?php include 'header.html' ?>
<body>
	<div id="frm">
	<form name="form1" method="post" action="employeModifier.php">
		<table border="0">
			<div>
				<tr>
					<label>Choisir un état : </label>
					<SELECT name="etat">
					<OPTION value="Non assignées">--Non assignées--
					<OPTION value="En cours de réalisation">--En cours de réalisation--
					<OPTION value="En attente">--En attente--
					<OPTION value="Terminée">--Terminée--
				</tr>
			</div>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Mettre à jour"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>