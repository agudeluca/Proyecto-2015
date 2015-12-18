<?php
session_start();
//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
require('../modelo/funciones1.php');
require ('../modelo/consultaConf.php');
require("../modelo/setearTwig.php");
require('../modelo/condicionalumno.php');
require('../modelo/registrar_pago.php');
 require('../modelo/consultarnombreAlumno.php');
 require("../modelo/setearpagina.php");
 require ('../modelo/consultaCuotasImpagasDeAlumno.php');
 require('../modelo/consultaCuotasPagasDeAlumno.php');
 require('../modelo/consulta_usuarios_gestion.php');
 require('../modelo/consulta_id_user_gestion.php');
if(empty($_SESSION['nombreusuario'])){
    header ("Location: ../controlador/frontend_controller.php");	
  
}
if ((soyadmin($_SESSION['rol'])||soygestion($_SESSION['rol']))){
     if(!empty($_REQUEST['idalumno'])||(!empty($_POST['idalumnopagar']))||(!empty($_POST['idalumnobecar']))){
        // var_dump($_POST);
		 $ok=false;
         $pagina=setearPagina();
         condicion_alumno($idalumno,$debobecar,$ok);
         $agrego=false;
         //var_dump($_POST);
          if($ok&&(!empty($_POST['idcuotas']))){
              $idcuotas=$_POST['idcuotas'];
               //var_dump($idcuotas);
              if(!empty($_SESSION['token'])){
                  if($_SESSION['token']==$_POST['token']){
       		           $agrego=registrar_pago($idalumno,$idcuotas,$debobecar,htmlentities($_POST['user']));
                  }
               }   
              //var_dump($_POST['idcuotas']);
          }
          //var_dump($_POST);
          $configuraciones=consultaConf();
          $token=md5(uniqid(microtime(), true));
          $_SESSION['token']=$token;  
          $nombrealu=consulta_nombre_alumno($idalumno);
          $cuotas_impagas=consulta_cuotas_impagas_de_alumno($configuraciones['0']['cantElem'],$cantidadpaginas,$pagina,$idalumno);
          $cuotas_pagas=consulta_cuotas_pagas_de_alumno($idalumno);
          if(soyadmin($_SESSION['rol'])){
              $user_gestion=consultar_usuarios_gestion();
          }
          else{
            $user_gestion=consultar_id_user_gestion($_SESSION['nombreusuario']);
          } 
          //var_dump($user_gestion);
          //var_dump($cuotas_pagas);
           //consulta la configuracion y devuelve en $configuraciones
                //seteo twig en $template 
          //if ($configuraciones['0']['habilitada']){
	             $twig=setearTwig();
               $template = $twig->loadTemplate("elegir_cuota.html");
   	            $template->display(array('datos'=>$configuraciones['0'], 
						                  'tipo'=>$_SESSION['rol'],
                              'users'=>$user_gestion,
						      						'agrego'=>$agrego,
						                  'cuotas_impagas'=>$cuotas_impagas,
                              'cuotas_pagas'=>$cuotas_pagas,
                              'nombrealumno'=>$nombrealu,
                              'idalumno'=>$idalumno,
                              'paginaactual'=>$pagina,
                              'cantpaginas'=>$cantidadpaginas,
                              'token'=>$token
						                    ));
          //}
          //else{  //else de pagina deshabilitada
         // }
    }
    else {
      header ("Location: ../controlador/controlador_registrarPagoElegirAlumno.php");

}}   
   else {
      header ("Location: ../controlador/controlador_login.php");
  }              
?>