<?php
$bd = mysqli_connect('localhost','root','');
if ($bd->connect_error) {
	die("Incapaz de conectar a servidor MySQL: ".mysqli_error());
}

if (!mysqli_select_db($bd,"login")) {
	die("Incapaz de seleccionar base de datos: ".mysqli_error());
}