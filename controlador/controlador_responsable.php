<?php

session_start();
require("../modelo/funciones1.php");
//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
if (!empty($_GET['flag']) && $_GET['flag'] == 'true'){
      CerrarSesion();
    }
if(empty($_SESSION['nombreusuario'])){
  header ("Location: ../controlador/controlador_login.php");         //Chekear si tiene sesion iniciada. If true redireccionar a backend
    }
if(!soyadmin($_SESSION['rol'])){
  header("Location: ../controlador/controlador_login.php");
}
if (!empty($_POST['nombre'])){ 

  $nombre=  htmlentities($_POST['nombre']); 
  $apellido=htmlentities($_POST['apellido']); 
  $mail=htmlentities($_POST['mail']); 
  $fecha_nacimiento=htmlentities($_POST['fecha_nacimiento']); 
  $sexo=htmlentities($_POST['sexo']); 
  $tipo=htmlentities($_POST['tipo']);
  $telefono=htmlentities($_POST['telefono']);
  $direccion=htmlentities($_POST['direccion']); 
  $usuario=htmlentities($_POST['usuario']);
  $password=htmlentities($_POST['password']);                                             //verificar si se quiso iniciar sesion
  require('../modelo/modelo_responsable.php');
  $acerto=false;
  $fallo_usuario=guardar_usuario($usuario,$password);
  if ($fallo_usuario) {
      //fallo por el usuario
  }
  else{
      
        $fallo=guardar_responsable($tipo,$nombre,$apellido,$fecha_nacimiento,$sexo,$mail,$telefono,$direccion,$usuario,$password);
        if($fallo){
        
    }
    else{
            $acerto=true;
            $responsables=obtener_responsables();
            //fallo por el mail
    }
  }
}

require ("../modelo/consultaConf.php");                   //consulta la configuracion y devuelve en $configuraciones
$configuraciones=consultaConf();
require("../modelo/setearTwig.php");      //seteo twig en $template 
         $twig=  setearTwig(); 

if ($configuraciones['0']['habilitada']){
		


  //if(!$mostrofallo){                                       //si la pagina esta habilitada la muestro normalmente
      $template = $twig->loadTemplate("alta_alumnos.html");
    //}
    //else{
    //  $template = $twig->loadTemplate("index-fallo.html");
    //} 
    $template->display(array('titulo' => $configuraciones['0']['titulo'],
            'descripcion' => $configuraciones['0']['descripcion'],
            'contacto' => $configuraciones['0']['mailContacto'],
            'tipo' => $_SESSION['rol'], 
            'responsables' => $responsables,
            'fallo_responsable' => $fallo,
            'fallo_usuario' => $fallo_usuario,
            'acerto_responsable' => $acerto
            ));
}
else{                                      //si la pagina esta deshabilitada debo mostrar el mensaje......debo dejar habilitado el login???
  
}

?>