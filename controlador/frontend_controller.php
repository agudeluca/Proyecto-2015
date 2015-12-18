<?php
$mostrofallo=false;
//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
require("../modelo/funciones1.php");
require ("../modelo/consultaConf.php");
require("../modelo/setearTwig.php");
require('../modelo/chequearInicioDeSesion.php');
session_start();
if (!empty($_GET['flag']) && $_GET['flag'] == 'true'){
			CerrarSesion();
		}
if(!empty($_SESSION['nombreusuario'])){
	
	header ("Location:controlador_login.php");				//Chekear si tiene sesion iniciada. If true redireccionar a backend
		}

if (!empty($_POST['usuario'])&&(!empty($_POST['token']&&(!empty($_SESSION['token']))&&($_POST['token']==$_SESSION['token'])))){  
    $mostrofallo=iniciar_sesion($id,$rol,htmlentities($_POST["usuario"]),htmlentities($_POST["clave"]));                                             //verificar si se quiso iniciar sesion
	if(!$mostrofallo){
		$_SESSION['nombreusuario'] = htmlentities($_POST["usuario"]);
    		$_SESSION['rol'] = $rol;
        $_SESSION['id'] = $id;
		header ("Location: controlador_login.php");
	}
}

$configuraciones=consultaConf();                  //consulta la configuracion y devuelve en $configuraciones
$token=md5(uniqid(microtime(), true));
$_SESSION['token']=$token;
$twig=setearTwig();      //seteo twig en $template 
if ($configuraciones['0']['habilitada']){
	//if(!$mostrofallo){                                       //si la pagina esta habilitada la muestro normalmente
   		$template = $twig->loadTemplate("index.html");
   	    //}
   	//else{
   	//	$template = $twig->loadTemplate("index-fallo.html");
   	//}	
   	$template->display(array('titulo' => $configuraciones['0']['titulo'],
						'descripcion' => $configuraciones['0']['descripcion'],
						'contacto' => $configuraciones['0']['mailContacto'], 
						'fallo' => $mostrofallo,
						'token'=>$token
						));
}
else{    

       $template = $twig->loadTemplate("frontend-desabilitado.html");
   	$template->display(array('titulo' => $configuraciones['0']['titulo'],
						'descripcion' => $configuraciones['0']['descripcion'],
						'contacto' => $configuraciones['0']['mailContacto'], 
						'mensaje' => $configuraciones['0']['textoDeshab'],
						'fallo' => $mostrofallo,
						'token'=>$token

						));
                            //si la pagina esta deshabilitada debo mostrar el mensaje......debo dejar habilitado el login???
}

?>