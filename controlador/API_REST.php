<?php
// Activamos las sesiones para el funcionamiento de flash['']
@session_start();
 
require '../Slim/Slim.php';
require_once('../modelo/consultas_para_API.php');

// El framework Slim tiene definido un namespace llamado Slim
// Por eso aparece \Slim\ antes del nombre de la clase.
\Slim\Slim::registerAutoloader();
 
// Creamos la aplicación.
$app = new \Slim\Slim();
$response = $app->response();
$response->header('Access-Control-Allow-Origin', '*');
// Indicamos el tipo de contenido y condificación que devolvemos desde el framework Slim.
//$app->contentType('text/html; charset=utf-8');

////////////////////////////////////////////
// Definición de rutas en la aplicación:
// Ruta por defecto de la aplicación /home
////////////////////////////////////////////
 
/*$app->get('/home', function() {
            echo "Pagina de gestión API REST de mi aplicación.";
        });*/
 
$app->get('/fechas_cuotas_no_pagas_por/:alumno/anio/:anio', function($alumno,$anio) {
            $cuotas_no_pagas=consultar_cuotas_no_pagas_de_alumno(htmlentities($alumno),htmlentities($anio));
             echo json_encode($cuotas_no_pagas);
        });
 

$app->get('/fechas_cuotas_pagas_por/:alumno/anio/:anio', function($alumno,$anio){
            $cuotas_pagas=consultar_cuotas_pagas_de_alumno(htmlentities($alumno),htmlentities($anio));
            echo json_encode($cuotas_pagas);
        });

$app->get('/montos_mensuales_del_anio/:anio', function($anio){
            $montos=consultar_montos_para_API(htmlentities($anio));
    //var_dump($montos);
        $arr=array_column($montos, 'monto_por_mes');
        foreach ($montos as $clave=>$valor){
        //echo $clave+1;
        //var_dump($valor);
            if(is_null($valor['monto_por_mes'])){
                $arr[$clave]=0;
            }
            else{
                $arr[$clave]=intval($valor['monto_por_mes']);
            }
        }
        echo json_encode($arr);
        });

$app->run();
?>