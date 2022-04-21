<?php
// Inclure la coonnexion à la database
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$priorite = mysqli_real_escape_string($mysqli, $_POST['priorite']);
	$idEmploye = mysqli_real_escape_string($mysqli, $_POST['idEmploye']);
	
	
	// checking empty fields
	if(empty($priorite || empty($idEmploye))) {			
		if(empty($priorite)) {
			echo "<font color='red'>Champ priorite est manquant.</font><br/>";
		}
		if(empty($idEmploye)) {
			echo "<font color='red'>Champ idEmploye est manquant.</font><br/>";
		}			
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE demande SET priorite='$priorite',idEmploye = '$idEmploye' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is login.php
		header("Location: login.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM demande WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$priorite = $res['priorite'];
	$idEmploye= $res['idEmploye'];
}
?>
<html>
<head>	
	<title>Modification</title>
</head>
<?php include 'header.html' ?>
<body>
	<div id='tableau'>
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<div>
				<tr>
					<label>Choisir une priorité : </label>
					<SELECT name="priorite">
					<OPTION value="1">1 : Peu urgent
					<OPTION value="2">2 : Urgent
					<OPTION value="3">3 : Très urgent
				</tr>
			</div>

			<tr> 
				<td>Entrer un idEmploye de la liste ci-dessous</td>
				<td><input type="text" name="idEmploye" value="<?php echo $idEmploye;?>"></td>
			</tr>

			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Mettre à jour"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>
