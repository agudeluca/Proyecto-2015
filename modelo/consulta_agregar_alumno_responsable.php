<?php
	require_once("../modelo/coneccionBD.php");
        $cn=conectarBD();
	$query = $cn->prepare("INSERT INTO AlumnoResponsable (idAlumno, idResponsable) VALUES (?,?)");
	$aux=$query->execute(array($idAlumno,$idResposable)); 
	if($aux){

                    $agrego_responsable=true;
            }

?>