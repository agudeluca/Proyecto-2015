<?php

session_start();
//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
require('../modelo/funciones1.php');
require('../modelo/eliminarCuota.php');
require("../modelo/consultaConf.php");
require("../modelo/consultaCuotas.php");
require("../modelo/setearpagina.php");
require('../modelo/setearTwig.php');
if(empty($_SESSION['nombreusuario'])){
	header ("Location: ../controlador/frontend_controller.php");					//Chekear si tiene sesion iniciada. If false redireccionar a index
		}
if(soyadmin($_SESSION['rol'])||soygestion($_SESSION['rol'])){
	if(!empty($_POST['ideliminar'])){
		//var_dump($_POST['ideliminar']);
		eliminarCuota(htmlentities($_POST['ideliminar']));
	}	

	$configuraciones=consultaConf();             //consulta de configuracion
	//var_dump($ss);
	$pagina=setearPagina();
	$cuotas=consultaCuotas($configuraciones['0']['cantElem'],$cantidadpaginas,$pagina);
	//echo $pagina;
	
	$twig=setearTwig();
	//var_dump($alumnos);
	//$funcion='listado';
	//var_dump($cuotas);
	$template = $twig->loadTemplate('listado-cuotas.html');
	$template->display(array('titulo' => $configuraciones['0']['titulo'],
							'contacto' => $configuraciones['0']['mailContacto'],
							'tipo' => $_SESSION['rol'],
	                        'cuotas' => $cuotas,
	                        'cantpaginas' => $cantidadpaginas,
	                        'paginaactual' => $pagina,
							));
}
else{
	header ("Location: ../controlador/controlador_login.php");
}

?>