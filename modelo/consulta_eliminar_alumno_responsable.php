<?php

require_once ("../modelo/coneccionBD.php");
$cn=conectarBD();
$cons1= $cn->prepare("SELECT alumno_responsable FROM AlumnoResponsable WHERE idAlumno=?");
	$cons1->execute(array($_POST['id_alumno_eliminar']));
	//var_dump($dni);
	$rows=$cons1->fetchAll();
	//var_dump($rows);
	//var_dump($error);
	if (count($rows) == 1) {
		$ultimo_responsable=true;
		//echo 'entre';
	}
	else{

            $query = $cn->prepare("DELETE FROM AlumnoResponsable
                                            WHERE idAlumno=? and idResponsable=?");
            $gg=array($_POST['id_alumno_eliminar'],$_POST['idResponsableEliminar']);
            $aux=$query->execute($gg); 
            if($aux){

                    $elimino_responsable=true;
            }
        }
?>