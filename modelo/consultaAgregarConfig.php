<?php
function actualizarconfig($titulo,$descripcion,$mailContacto,$cantElem,$habilitada,$textoDeshab){
	require_once ('../modelo/coneccionBD.php');
	$cn=conectarBD();
$query = $cn->prepare("UPDATE Configuracion 
	                    SET titulo = ?, descripcion = ?, mailContacto = ?, cantElem = ?, habilitada = ?, textoDeshab = ? 
	                   WHERE 1");
           $query->execute(array($titulo,$descripcion,$mailContacto,$cantElem,$habilitada,$textoDeshab)); 
}
?>