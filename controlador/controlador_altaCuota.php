<?php
session_start();
require('../modelo/funciones1.php');
//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
require('../modelo/insertarCuota.php');
require ('../modelo/consultaConf.php');
require("../modelo/setearTwig.php");
require ('../modelo/consultaMeses.php');
if(empty($_SESSION['nombreusuario'])){
    header ("Location: ../controlador/frontend_controller.php");	
  
}
   if (soyadmin($_SESSION['rol'])||soygestion($_SESSION['rol'])){
       $fallo=false;
      // var_dump($_POST);
       if(!empty($_POST['mes'])){
        //var_dump($_POST);
          if(!empty($_SESSION['token'])){
              if($_SESSION['token']==$_POST['token']){
                 $fallo=insertar_cuota(htmlentities($_POST['anio']),htmlentities($_POST['mes']), htmlentities($_POST['numero']), htmlentities($_POST['monto']),htmlentities($_POST['tipo']),htmlentities($_POST['comisionCob']));
       		     }
          }
       }
       $configuraciones=consultaConf(); //consulta la configuracion y devuelve en $configuraciones        
       $meses=consulta_meses();
       //var_dump($meses);
       $token=md5(uniqid(microtime(), true));
          $_SESSION['token']=$token;
      $twig=setearTwig();//seteo twig en $template 

	$template = $twig->loadTemplate("alta_cuota.html");
   	$template->display(array('datos' => $configuraciones['0'],
						'tipo'=>$_SESSION['rol'],
						'meses'=>$meses,
						'fallo'=>$fallo,
						'info'=>$_POST,
            'token'=>$token
						));

}   
   else {
      header ("Location: ../controlador/controlador_login.php");
  }              
?>