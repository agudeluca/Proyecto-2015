<?php 
require_once ("../modelo/coneccionBD.php");
function consulta_meses(){
$cn=conectarBD();
$query = $cn->prepare("SELECT * FROM Meses");
$query->execute(); 
$meses = $query->fetchAll();
return $meses;
}
?>