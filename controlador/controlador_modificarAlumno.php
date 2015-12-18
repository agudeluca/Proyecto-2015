<?php

session_start();

//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
require("../modelo/consultaConf.php");             //consulta de configuracion
require("../modelo/consultaAlumnoConId.php");//traigo la informacion del alumno para modificar

require("../modelo/consultaAlumnoResponsableConId.php");
require('../modelo/setearTwig.php');
require('../modelo/modelo_responsable.php');
$responsables=obtener_responsables();

if(empty($_SESSION['nombreusuario'])){						//Chekear si tiene sesion iniciada. If false redireccionar a index
	header ("Location: ../index.php");
	}								
	elseif($_SESSION['rol']!='administracion' ){			//si el usuario no es administrador no darle permiso
		header ("Location: ../controlador_login.php");					
}

if(!empty($_POST['idalumnoParaModificar'])){
	require('../modelo/consultaModificaralumno.php');
	$idalu=  htmlentities($_POST['idalumnoParaModificar']);
               $numdoc= htmlentities($_POST['numdoc']);
               $nombre= htmlentities($_POST['nombre']);
               $apellido= htmlentities($_POST['apellido']);
               $fechaNac= htmlentities($_POST['fechaNac']);
               $sexo= htmlentities($_POST['sexo']);
               $email=htmlentities($_POST['email']) ;
               $dire= htmlentities($_POST['dire']);
               $fechaIng= htmlentities($_POST['fechaIng']);
               $fechaEg= htmlentities($_POST['fechaEg']);
        consultaModificaralumno( $idalu,$numdoc,$nombre,$apellido,$fechaNac,$sexo,$email,$dire,$fechaIng,$fechaEg);
        

}
if(!empty($_POST['idalumnoCarga'])){
	$idalu=  htmlentities($_POST['idalumnoCarga']);
}
$alumno_responsable=  consultaAlumnoResponsableConId($idalu);
$alumno=consultaAlumnoConId($idalu);
$configuraciones=consultaConf(); //consulta de configuracion
	        $twig=  setearTwig(); 



$template = $twig->loadTemplate('modificar-alumno.html');
$template->display(array('config' => $configuraciones[0],
                        'alumno' => $alumno[0],
                        'alumno_responsable' => $alumno_responsable[0],
			'responsables' => $responsables,
                        'tipo' => $_SESSION['rol']
						));

?>