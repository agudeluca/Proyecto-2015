<?php
function iniciar_sesion(&$id,&$rol,$usuario,$clave){
    require_once ("../modelo/coneccionBD.php");
    $cn=conectarBD();
    $query = $cn->prepare("SELECT * FROM Usuarios WHERE username=? and password=? and habilitado=TRUE");
    $query->execute(array($usuario,$clave)); 
    $rows = $query->fetchAll();
    //print_r($rows);

    if($query->rowCount()==1){
       //session_destroy(); 
       //session_start();
       foreach ($rows as $row) {
       		// $_SESSION['nombreusuario'] = $row['username'];
    		//$_SESSION['rol'] = $row['rol'];
        //$_SESSION['id'] = $row['id'];
        $id=$row['id'];
        $rol=$row['rol'];
    	//echo $_SESSION['nombreusuario'];

    	//echo $_SESSION['rol'];
    	}
      $mostrofallo=false;
             
    }
    else{
       $mostrofallo=true;
    }
    return $mostrofallo;
}
?>