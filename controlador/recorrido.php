<?php

session_start();
require('../modelo/funciones1.php');
//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
require("../modelo/consultaConf.php");
require("../modelo/setearpagina.php");
require('../modelo/setearTwig.php');
require("../modelo/consultaAlumnos.php");

require("../modelo/consultaRecorrido.php");

if (!empty($_POST['enviar'])){ 
        $i = 0;
        foreach ($_POST['alumnos'] as $a):
			$arrayAlumno = obtenerAlumno($a)[0];
			$array[$i]['lat'] = $arrayAlumno['latitud'];
			$array[$i]['lon'] = $arrayAlumno['longitud'];
			$array[$i]['nombre'] = $arrayAlumno['apellido']." ".$arrayAlumno['nombre'];
                        $i++;
	endforeach;
}


if(empty($_SESSION['nombreusuario'])){
	header ("Location: frontend_controller.php");					//Chekear si tiene sesion iniciada. If false redireccionar a index
		}
if(soyadmin($_SESSION['rol'])){	
	$pagina=setearPagina();
	$configuraciones=consultaConf(); //consulta de configuracion
	        $twig=  setearTwig(); 
      
	$template = $twig->loadTemplate('recorrido.html');
	$template->display(array('titulo' => $configuraciones['0']['titulo'],
				 'contacto' => $configuraciones['0']['mailContacto'],
	  			'tipo' => $_SESSION['rol'],
	                        'array' => $array, 
                                'cantDir' => $i-1
	        
							));
}
else{
	header ("Location: ../controlador/controlador_login.php");
}

?>