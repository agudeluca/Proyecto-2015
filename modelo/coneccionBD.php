<?php 
function conectarBD(){
$db_host="localhost";//:3306";
$db_user="grupo_10";
$db_pass="DCerbxcYhyEA9X4T";
$db_base="grupo_10"; 

 $cn = new PDO("mysql:dbname=$db_base;host=$db_host",$db_user,$db_pass);
return $cn;

}
?>