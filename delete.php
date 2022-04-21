<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM demande WHERE id=$id");

//redirecting to the display page (login.php in our case)
header("Location:login.php");
?>