<?php
 	session_start();

 		if($_SESSION["role"] =="Employe"){
 			header('Location: inter.php');
 		}

?>
<html>
<?php include 'header.html' ?>

<body>
	<h1 id='inter'>Assigner une tâche</h1>
	<div id="frm">
		<form action="add2.php" method="post" name="form1">
			<table>
				<tr> 
					<td><b>ID : </b></td>
					<td><input type="text" name="id"></td>
				</tr>
				<tr> 
					<td><b>Nom : </b></td>
					<td><input type="text" name="nom"></td>
				</tr>
				<div>
					<tr>
						<label><b>Choisir un etat:</b></label>
						<SELECT  name="etat" size="1">
						<OPTION value="Non assignés">Non assignés
						<OPTION value="En cours de réalisation">En cours de réalisation
						<OPTION value="En attente">En attente 
						<OPTION value="Terminée">Terminée
					</tr>
				</div>
				<div>
					<tr>
					<label><b>Choisir une urgence :</b></label>
						<SELECT  name="priorite" size="1">
						<OPTION value="1">1 : Peu Urgent
						<OPTION value="2">2 : Urgent
						<OPTION value="3">3 : Très urgent 
					</tr>
				</div>


					<td><input type="submit" name="Submit" value="Ajouter" id='btn'></td>
				</tr>

			</table>
		</form>
	</div>
</body>
</html>
