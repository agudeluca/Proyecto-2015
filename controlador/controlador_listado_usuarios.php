<?php

session_start();
require('../modelo/funciones1.php');
//require_once ("../modelo/coneccionBD.php");
require("../modelo/consulta_usuarios.php");
//conectarBD($cn);
require("../modelo/consultaConf.php");
require("../modelo/setearpagina.php");
require('../modelo/setearTwig.php');
require('../modelo/eliminar_usuario.php');
if(empty($_SESSION['nombreusuario'])){
	header ("Location: ../contolador/frontend_controller.php");					//Chekear si tiene sesion iniciada. If false redireccionar a index
		}
if(soyadmin($_SESSION['rol'])){
	if(!empty($_POST['ideliminar'])){
		 elininar_usuario(htmlentities($_POST['ideliminar']));
	}	
	$configuraciones=consultaConf();  //consulta de configuracion
	$pagina=setearPagina();
	$usuarios=consultar_usuarios($configuraciones['0']['cantElem'],$cantidadpaginas,$pagina);
	//echo $pagina;
	
	//var_dump($alumnos);
	$twig=setearTwig();
	$template = $twig->loadTemplate('listado_usuarios.html');
	$template->display(array('titulo' => $configuraciones['0']['titulo'],
							'contacto' => $configuraciones['0']['mailContacto'],
							'tipo' => $_SESSION['rol'],
	                        'usuarios' => $usuarios,
	                        'cantpaginas' => $cantidadpaginas,
	                        'paginaactual' => $pagina,
	                        
							));
}
else{
	header ("Location: ../controlador/controlador_login.php");
}

?>