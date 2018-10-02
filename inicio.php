<?php 

session_start();

require 'database.php';

if(isset($_SESSION['usuarios_id'])){

$records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE id=:id');
$records->bindParam(':id', $_SESSION['usuarios_id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

$user = null;

if(count($results) > 0){

$user = $results;

}

}

?>


<html>
<head> 
<meta charset="utf-8">
<title> Bienvenido </title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php require 'partials/header.php' ?>

<?php if(!empty($user)): ?>
<br> Bienvenido <?= $user['email']; ?>
<br> Has ingresado correctamente 
<a href="logout.php"> Cerrar sesión </a>
<?php else: ?>
<h1> Por favor inicie sesión o regístrese </h1>
<a href = "ingreso.php">Ingresar</a> o 
<a href = "registro.php">Registrarse </a>
 <?php endif; ?>

</body>
</html>
