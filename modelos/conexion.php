<?php

function hacerListado($consulta) {
	$servidor = "localhost";
	$usuario = "root";
	$contrasena = "";
	$baseDeDatos = "degustabox_prueba";
	$enlace = mysqli_connect($servidor, $usuario, $contrasena, $baseDeDatos);
	if (mysqli_connect_errno()) {
		die("Error de conexión: " . mysqli_connect_error());
	}
	mysqli_set_charset($enlace, 'utf8');
	$resultado = mysqli_query($enlace, $consulta);
	$listado = [];
	if ($resultado) {
		while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
			$listado[] = $fila;
		}
	}
	mysqli_free_result($resultado);
	mysqli_close($enlace);
	return $listado;
}

function ejecutarConsulta($consulta) {
	$servidor = "localhost";
	$usuario = "root";
	$contrasena = "";
	$baseDeDatos = "degustabox_prueba";
	$enlace = mysqli_connect($servidor, $usuario, $contrasena, $baseDeDatos);

	if (mysqli_connect_errno()) {
		die("Error de conexión: " . mysqli_connect_error());
	}
	mysqli_set_charset($enlace, 'utf8');
	$resultado = mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	return $resultado;
}

function obtainAllTasks() {
	$consulta = "SELECT * FROM task_table";
	$usuarios = hacerListado($consulta);
	return $usuarios;
}
?>
