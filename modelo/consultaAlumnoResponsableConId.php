<?php

function consultaAlumnoResponsableConId($idalu){
    require_once ("../modelo/coneccionBD.php");
$cn=conectarBD();
$query = $cn->prepare("SELECT idResponsable FROM AlumnoResponsable  WHERE idAlumno=?");
$query->execute(array($idalu)); 
$alumno_responsable = $query->fetchAll();
return $alumno_responsable;
}


?>

