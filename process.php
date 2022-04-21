<?php  


	if(isset($_POST['submit'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

$host = 'localhost';
$db   = 'atelier_professionnel';
$user1 = 'root';
$pass1 = 'root';
$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user1, $pass1, $options);
} 
catch (\PDOException $e) {
    print"ERREUR:".$e;
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
$stmt = $pdo->query("SELECT * FROM users WHERE username  = '$user' and password='$pass' ");
$row= $stmt->fetch();



		if ($row) {
		
//ici on vérifie si le mot de passe correspond à celui qui est dans la BDD
			
				
				session_start();
 				
 				$_SESSION["role"]=$row['role'];
 				$_SESSION["id"]=$row['id'];
 				
				header('Location: inter.php');
				

			}
			
		
		else{
			echo "Mot de passe ou username pas valide ";


		}


	}


