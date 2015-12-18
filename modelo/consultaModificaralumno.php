<?php

function consultaModificaralumno($id,$numdoc,$nombre,$apellido,$fechaNac,$sexo,$email,$dire,$fechaIng,$fechaEg){
require_once ("../modelo/coneccionBD.php");
$cn=conectarBD();
    
    $query = $cn->prepare("UPDATE Alumnos
				SET numeroDoc=?,nombre=?,apellido=?,fechaNacimiento=?,sexo=?,mail=?,direccion=?,fechaIngreso=?,fechaEgreso=?
				WHERE id=?");
$gg=array($numdoc,$nombre,$apellido,$fechaNac,$sexo,$email,$dire,$fechaIng,$fechaEg,$id);                                
$aux=$query->execute($gg); 
}
?>