<?php
function consultaInsertRegistro ($datos) {
	$indices = array_keys($datos);
	$valores = array_values($datos);
	$consulta = "INSERT INTO task_table (" . implode(", ", $indices) . ") VALUES ('" . implode("', '", $valores) . "')";

	return $consulta;
}

 ?>
