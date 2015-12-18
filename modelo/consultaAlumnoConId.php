<?php

 function consultaAlumnoConId($idalu){
     require_once ("../modelo/coneccionBD.php");
$cn=conectarBD();
    $query = $cn->prepare("SELECT * FROM Alumnos WHERE id=?");
    $query->execute(array($idalu)); 
    $alumno = $query->fetchAll();
 return $alumno;
 }
?>