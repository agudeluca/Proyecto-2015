<?php
session_start();
require ('../modelo/funciones1.php');
require('../modelo/setearTwig.php');

require ('../modelo/consultaConf.php');
require('../modelo/setearpagina.php');
require ('../modelo/consultaAlumnosPropios.php');
require ('../modelo/consultaAlumnosPropiosEXPORTACION.php');
require ('../modelo/consultaAlumnosConMatricula.php');
require ('../modelo/consultaAlumnosConMatriculaEXPORTACION.php');
require ('../modelo/setearTipoDel.php');
require ('../modelo/generarPDF.php');
if(empty($_SESSION['nombreusuario'])){
    header ("Location: ../controlador/frontend_controller.php"); 
}
$configuraciones = consultaConf();
$twig= setearTwig();
$pagina=setearPagina();
$tipodel=seteartipodel();

if ($_SESSION['rol'] == "consulta"){
    if (!empty($_GET['pdf'])){
       $datos = consultaAlumnosPropiosEXPORTACION($datosprepost,$pagina,htmlentities($_GET['pdf']),
        htmlentities($_SESSION['nombreusuario']),$cantidadpaginas,$configuraciones);
       generarpdfconsulta(htmlentities($_GET['pdf']),$datos);
  } 
    $token=md5(uniqid(microtime(), true));
$_SESSION['token']=$token;
 $alumnosConMatricula = consultaAlumnosPropios($datosprepost,$pagina,$tipodel,
      htmlentities($_SESSION['nombreusuario']),$cantidadpaginas,$configuraciones,$token,$_SESSION['token']);
      $template = $twig->loadTemplate('listadosAlumnosInformacionPropios.html');
  $template->display(array('titulo' => $configuraciones['0']['titulo'],
              'contacto' => $configuraciones['0']['mailContacto'],
              'tipo' => htmlentities($_SESSION['rol']),
                          'alumnosConMatricula' => $alumnosConMatricula,
                                'paginaactual' => $pagina,
                          'datospost' => $datosprepost,
                          'cantpaginas' => $cantidadpaginas,
                          'token'=>$token
              )); 

 
}
else{
  if ((!empty($_GET['pdf']))&&(!empty($_SESSION['token']))&&($_GET['token']==$_SESSION['token'])){
       $datos = consultaAlumnosConMatriculaEXPORTACION($datosprepost,$pagina,htmlentities($_GET['pdf']),
        $cantidadpaginas,$configuraciones,htmlentities($_SESSION['rol']),htmlentities($_SESSION['id']));
       generarpdf(htmlentities($_GET['pdf']),$datos);
  } 
  else{
      $token=md5(uniqid(microtime(), true));
$_SESSION['token']=$token;
$datos = consultaAlumnosConMatricula($datosprepost,$pagina,$tipodel,$cantidadpaginas,$configuraciones,
        htmlentities($_SESSION['rol']),htmlentities($_SESSION['id']),$token,$_SESSION['token']);
         $template = $twig->loadTemplate('listadosAlumnosConMatricula.html');
  $template->display(array('titulo' => $configuraciones['0']['titulo'],
              'contacto' => $configuraciones['0']['mailContacto'],
              'tipo' => htmlentities($_SESSION['rol']),
                          'alumnosConMatricula' => $datos,
                          'cantpaginas' => $cantidadpaginas,
                          'paginaactual' => $pagina,
                          'datospost' => $datosprepost,
                          'token'=>$token
              ));
}}
?>