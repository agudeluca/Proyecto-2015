<?php
require_once ("../modelo/coneccionBD.php");
//
function eliminarCuota($idCuota){
$cn=conectarBD();
$query = $cn->prepare("UPDATE Cuotas
				SET eliminada=1
				WHERE id=?");
$gg=array($idCuota);
$aux=$query->execute($gg); 
return $aux;
//var_dump($aux);
/*if($aux){

	header ("Location: ../controlador/controlador_administrarCuotas.php");
}*/
}
?>