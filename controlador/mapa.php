<?php

session_start();
require('../modelo/funciones1.php');
//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
require("../modelo/consultaConf.php");
require("../modelo/setearpagina.php");
require('../modelo/setearTwig.php');
require("../modelo/consultaAlumnos.php");

if(empty($_SESSION['nombreusuario'])){
	header ("Location: frontend_controller.php");					//Chekear si tiene sesion iniciada. If false redireccionar a index
		}
if(soyadmin($_SESSION['rol'])){	
	$pagina=setearPagina();
	$configuraciones=consultaConf(); //consulta de configuracion
	        $twig=  setearTwig(); 
   
	$alumnos=consultaAlumnos($configuraciones['0']['cantElem'],$cantidadpaginas,$pagina)  ;       
	
	$template = $twig->loadTemplate('listado-recorrido.html');
	$template->display(array('titulo' => $configuraciones['0']['titulo'],
							'contacto' => $configuraciones['0']['mailContacto'],
							'tipo' => $_SESSION['rol'],
	                        'alumnos' => $alumnos,
	                        'cantpaginas' =>$cantidadpaginas ,
	                        'paginaactual' => $pagina
							));
}
else{
	header ("Location: ../controlador/controlador_login.php");
}

?>