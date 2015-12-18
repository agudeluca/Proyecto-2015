<?php
function eliminarAlumno($id_alumno){
	require_once ("../modelo/coneccionBD.php");
$cn=conectarBD();
$query = $cn->prepare("UPDATE Alumnos
				SET eliminado=1
				WHERE id=?");
$gg=array($id_alumno);
$aux=$query->execute($gg); 
return $aux;
/*if($aux){
        $elimino_alumno=true;
	//header ("Location: ../controlador/controlador_listadoAlumnos.php");
}*/
}
?>