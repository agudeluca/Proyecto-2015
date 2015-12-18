<?php
require_once ("../modelo/coneccionBD.php");
function elininar_usuario($id_usuario){
	$cn=conectarBD();
$query = $cn->prepare("UPDATE Usuarios
				SET habilitado=0
				WHERE id=?");
$gg=array($id_usuario);
$aux=$query->execute($gg); 

return $aux;/*if($aux){

	header ("Location: ../controlador/controlador_listado_usuarios.php");
}*/
  }
?>