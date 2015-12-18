<?php
function obtenerAlumno($alumno){
	
              require_once ("../modelo/coneccionBD.php");
$cn=conectarBD();      
                    $direcciones = $cn->prepare("SELECT latitud, longitud, nombre, apellido FROM Alumnos WHERE id=?");
               
                    $aux2=$direcciones->execute(array($alumno)); 
                  
    
	$aux = $direcciones->fetchAll();
       
	return $aux;
}

?>