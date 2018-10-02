<?php 

session_start();

if(isset($_SESSION['usuarios_id'])){
	
	header('Location: /inicio.php');
	
}

require 'database.php'; 

if(!empty($_POST['email']) && !empty($_POST['password'])){
	
	$records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email=:email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	
	$message = '';
	
	if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
	
	$_SESSION['usuarios_id'] = $results['id'];
	header('Location: /Login/inicio.php');
	
	} else{
		$message = 'Las credenciales no coinciden';
	}
	}

?>

<html>
<head> 
<meta charset="utf-8">
<title> Ingreso </title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>

<?php require 'partials/header.php' ?>

<h1> Ingreso </h1>

<span> o <a href="registro.php"> Regístrese</a></span>


<?php if(!empty($message)): ?>

<p> <?= $message ?> </p>

<?php endif; ?>

<form action="ingreso.php" method="post">
<input type="text" name="email" placeholder="Ingrese su email">
<input type="password" name="password" placeholder="Ingrese su contraseña">
<input type="submit" value="Ingresar">
</form>

</body>
</html>
