<?php
session_start();
require('../modelo/funciones1.php');
//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
require ('../modelo/consultaConf.php');
require("../modelo/setearTwig.php"); 
require('../modelo/insertar_usuario.php');
if(empty($_SESSION['nombreusuario'])){
    header ("Location: ../frontend_controller.php");	
  
}
   if (soyadmin($_SESSION['rol'])){
       $fallo=false;
       if(!empty($_POST['nombre_usuario'])){
       		if(!empty($_SESSION['token'])){
              if($_SESSION['token']==$_POST['token']){
                  $fallo=insertarUsuario(htmlentities($_POST['nombre_usuario']),htmlentities($_POST['pass']), htmlentities($_POST['rol']));
              }          
          }
       }
          $token=md5(uniqid(microtime(), true));
          $_SESSION['token']=$token;
          $configuraciones=consultaConf();       //consulta la configuracion y devuelve en $configuraciones
          $twig=setearTwig();              //seteo twig en $template 
          $template = $twig->loadTemplate("alta_usuario.html");
        	$template->display(array('datos' => $configuraciones['0'],
						                        'tipo'=>$_SESSION['rol'],
                                    'fallo'=>$fallo,
                                    'info'=>$_POST,
                                    'token'=>$token
						                        ));
}   
   else {
      header ("Location: ../controlador/controlador_login.php");
  }              
?>