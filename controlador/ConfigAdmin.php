
<?php
session_start();
require('../modelo/funciones1.php');
require ('../modelo/consultaConf.php');
require ('../modelo/consultaAgregarConfig.php');
require ('../modelo/setearTwig.php');
$configuraciones = consultaConf();
if(empty($_SESSION['nombreusuario'])){
    header ("Location: ../controlador/frontend_controller.php");	
}
   if (soyadmin($_SESSION['rol'])){
       if ((!empty($_POST['clave'])) and (!empty($_POST['titulo'])) and (!empty($_POST['descripcion'])) and (!empty($_POST['habilitada']))
          and (!empty($_POST['textoDeshab'])) and (!empty($_POST['mailContacto'])) and ($_POST['token']==$_SESSION['token'])){
           actualizarconfig(htmlentities($_POST['titulo']),htmlentities($_POST['descripcion']),
            htmlentities($_POST['mailContacto']),htmlentities($_POST['cantElem']),htmlentities($_POST['habilitada']),htmlentities($_POST['textoDeshab']));
           header ("Location: ConfigAdmin.php");
       }
       

       $token=md5(uniqid(microtime(), true));
      $_SESSION['token']=$token;
      $twig=setearTwig();
       $template = $twig->loadTemplate('ConfigAdmin.html');
       $template -> display(array('datos' => $configuraciones['0'],'tipo' => $_SESSION['rol'], 'token'=>$token));
       
   }
   else {
      header ("Location: ../controlador/controlador_login.php");
  }              

?>