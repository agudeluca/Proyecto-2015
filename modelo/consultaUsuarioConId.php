<?php
require_once ("../modelo/coneccionBD.php");
function consulta_usuario_con_id($iduser){
	$cn=conectarBD();
	$query = $cn->prepare("SELECT * FROM Usuarios WHERE id=?");
	$query->execute(array($iduser)); 
	$usuario = $query->fetchAll();
	return $usuario;
}


?>