<?php require "./inc/session_start.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<?php include "./inc/head.php"; ?>
	<script src="https://kit.fontawesome.com/2ace1aec11.js" crossorigin="anonymous"></script>
</head>

<body>
	<?php

	// vamos a manejar las visatas para validar el valor que pueda tener $_GET['vista']
	if (!isset($_GET['vista']) || $_GET['vista'] == '') {
		$_GET['vista'] = 'login';
	}

	if (is_file('./vistas/' . $_GET['vista'] . '.php') && $_GET['vista'] != 'login' && $_GET['vista'] != '404') {

		include "./inc/navbar.php";
		include './vistas/' . $_GET['vista'] . '.php';
		include "./inc/script.php";
	} elseif ($_GET['vista'] === 'login') {
		include './vistas/login.php';
	} else {
		include './vistas/404.php';
	}

	?>
</body>

</html>