<?php
//var_dump($_POST);
require_once ("../modelo/coneccionBD.php");

function consulta_modificar_cuota($anio,$mes,$numero,$monto,$tipo,$comisionCob,$idCuotaParaModificar){
	$cn=conectarBD();
	$cons1= $cn->prepare("SELECT id FROM Cuotas WHERE anio=? AND mes=? AND tipo=? AND NOT (id=?)");
	$cons1->execute(array($anio,$mes,$tipo,$idCuotaParaModificar));
	//var_dump($_POST);
	$rows=$cons1->fetchAll();
	//var_dump($rows);
    $error=$cons1->errorInfo();
	//var_dump($error);
	if (count($rows) != 0) {
		$fallo=true;
		//echo 'entre';
	}
	else{
		$fallo=false;
		$query = $cn->prepare("UPDATE Cuotas
						SET anio=?,mes=?,numero=?,monto=?,tipo=?,comisionCob=?,eliminada=false
						WHERE id=?");
		$gg=array($anio,$mes,$numero,$monto,$tipo,$comisionCob,$idCuotaParaModificar);                                
		$query->execute($gg); 
		//$aux=$query->errorInfo();
		//var_dump($aux);
		//header ("Location: ../controlador/controlador_administrarCuotas.php");
	}
	return $fallo;
}
?>