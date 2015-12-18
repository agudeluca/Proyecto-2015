<?php
session_start();
require("../modelo/funciones1.php");
//require("../modelo/coneccionBD.php");
//conectarBD($cn);

if (!empty($_GET['flag']) && $_GET['flag'] == 'true'){
			CerrarSesion();
		}
if(empty($_SESSION['nombreusuario'])){
	header ("Location: ../controlador/controlador_login.php");					//Chekear si tiene sesion iniciada. If true redireccionar a backend
		}
if(soyadmin($_SESSION['rol'])){
$fallo=false;
$acerto=false;
if (!empty($_POST['nombre'])){ 

	$nombre=  htmlentities($_POST['nombre']); 
	$apellido=  htmlentities($_POST['apellido']); 
	$dni=  htmlentities($_POST['dni']); 
	$mail=htmlentities($_POST['mail']); 
	$fecha_ingreso=htmlentities($_POST['fecha_ingreso']); 
	$fecha_nacimiento=htmlentities($_POST['fecha_nacimiento']); 
	$fecha_egreso=htmlentities($_POST['fecha_egreso']); 
	$sexo=htmlentities($_POST['sexo']); 
	$direccion=htmlentities($_POST['direccion']);  
        $lat=htmlentities($_POST['lat']);  
        $long=htmlentities($_POST['lon']);  
	$responsables=htmlentities($_POST['responsables']);                                           //verificar si se quiso iniciar sesion
	require('../modelo/modelo_alumno.php');
	
	$fallo=guardar_alumno($nombre,$apellido,$dni,$fecha_nacimiento,$sexo,$mail,$direccion,$fecha_ingreso,$fecha_egreso,$responsables,$lat,$long);
	if ($fallo) {
	}
	else{
		$acerto=true;
	}
}


require ("../modelo/consultaConf.php");                   //consulta la configuracion y devuelve en $configuraciones
$configuraciones=consultaConf();
require("../modelo/setearTwig.php");      //seteo twig en $template 
         $twig=  setearTwig(); 

	require('../modelo/modelo_responsable.php');
		$responsables=obtener_responsables();
	//if(!$mostrofallo){                                       //si la pagina esta habilitada la muestro normalmente
   		$template = $twig->loadTemplate("alta_alumnos.html");
   	//}
   	//else{
   	//	$template = $twig->loadTemplate("index-fallo.html");
   	//}	
   	$template->display(array('titulo' => $configuraciones['0']['titulo'],
						'descripcion' => $configuraciones['0']['descripcion'],
						'contacto' => $configuraciones['0']['mailContacto'],
						'tipo' => $_SESSION['rol'], 
						'responsables' => $responsables,
						'fallo' => $fallo,
						'acerto' => $acerto
						));
}
else{
	header ("Location: ../controlador/controlador_login.php");                                      //si la pagina esta deshabilitada debo mostrar el mensaje......debo dejar habilitado el login???
	
}

?>

