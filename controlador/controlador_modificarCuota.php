<?php

session_start();
//require_once ("../modelo/coneccionBD.php");
//conectarBD($cn);
require("../modelo/consultaConf.php");
require('../modelo/setearTwig.php');
require('../modelo/consultaMeses.php');
require("../modelo/consultaCuotaConId.php");
require('../modelo/consultaModificarCuota.php');
//var_dump($_SESSION['rol']);
if(empty($_SESSION['nombreusuario'])){						//Chekear si tiene sesion iniciada. If false redireccionar a index
	header ("Location: ../index.php");
	}								
	elseif($_SESSION['rol']=='consulta'){			//si el usuario no es administrador no darle permiso
		header ("Location: ../controlador/controlador_login.php");					
}

if(empty($_POST['idCuotaParaModificar'])){
	if(empty($_POST['idCuotaCarga'])){
		
		header ("Location: ../controlador/controlador_administrarCuotas.php");
	}
	else{$idCuota=htmlentities($_POST['idCuotaCarga']);
	//echo '</br></br></br></br></br></br>';
}}
	else{
		if(!empty($_SESSION['token'])){
              if($_SESSION['token']==$_POST['token']){
					$fallo=consulta_modificar_cuota(htmlentities($_POST['anio']),htmlentities($_POST['mes']),htmlentities($_POST['numero']),htmlentities($_POST['monto']),htmlentities($_POST['tipo']),htmlentities($_POST['comisionCob']),htmlentities($_POST['idCuotaParaModificar']));
					
					$idCuota=htmlentities($_POST['idCuotaParaModificar']);
					//echo 'sakjdpsandnsaondosajn';
				}
		}
}
$cuota=consuta_cuota_con_id($idCuota);        
						
$configuraciones=consultaConf();        //consulta de configuracion
$twig=setearTwig();
$token=md5(uniqid(microtime(), true));
          $_SESSION['token']=$token;	
$meses=consulta_meses();
$template = $twig->loadTemplate('modificar-cuota.html');
$template->display(array('datos' => $configuraciones[0],
                        'cuota' => $cuota[0],
                        'tipo' => $_SESSION['rol'],
						'meses'=>$meses,
						'fallo'=>$fallo,
						'idcuota'=>$idCuota,
						'token'=>$token
						));

?>