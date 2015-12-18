<?php
require_once ("../modelo/coneccionBD.php");
function consultar_usuarios_gestion(){
	$cn=conectarBD();
	$query = $cn->prepare("SELECT id,username FROM Usuarios WHERE rol='gestion'");
	$query->execute(); 
	$consulta= $query->fetchAll();
	return $consulta;
}




?>