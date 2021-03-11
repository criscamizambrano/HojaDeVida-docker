<?
include_once 'conectar.php';

$bbdd->registrarHoja($_POST['nombre'], $_POST['fecha-nacimiento'], $_POST['cedula'],$_POST['direccion'], $_POST['telefono'], $_POST['email'], $_POST['nivel-academico'], $_POST['nombre-institucion'], $_POST['titulo'], $_POST['fecha-estudios'], $_POST['fecha-fin-estudios'],$_POST['titulos']);

$bbdd->close();
ob_end_flush();