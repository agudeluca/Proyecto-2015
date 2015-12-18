<?php 
function consultaConf(){
require_once ("../modelo/coneccionBD.php");
    $cn=conectarBD();
$query = $cn->prepare("SELECT * FROM Configuracion");
$query->execute(); 
$configuraciones = $query->fetchAll();
return $configuraciones;
}
?>