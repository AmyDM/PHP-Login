<?php require 'database.php'; 

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])){

	$sql = "INSERT INTO usuarios (email, password) VALUES(:email, :password)";
	$state = $conn->prepare($sql);
	$state->bindParam(':email', $_POST['email']);
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$state->bindParam(':password', $password);

if ($state->execute()) {
	
	$message = 'Ha creado un nuevo usuario';

	} else{
	
	$message = 'Ha ocurrido un error';	
}
}

?>

<html>
<head> 
<meta charset="utf-8">
<title> Registro </title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>

<?php require 'partials/header.php' ?>

<?php if(!empty($message)): ?>

<p> <?= $message ?> </p>
<?php endif; ?>

<h1> Registro </h1>

<span> o <a href="ingreso.php"> Ingresar</a></span>

<form action="registro.php" method="POST">
<input type="text" name="email" placeholder="Ingrese un nuevo email">
<input type="password" name="password" placeholder="Ingrese una contraseña">
<input type="password" name="confirm_password" placeholder="Confirme su contraseña">
<input type="submit" value="Ingresar">
</form>

</body>
</html>
