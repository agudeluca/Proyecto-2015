<?php
function consultaAlumnos($cantxpagina,&$cantidadpaginas,$pagina){
	require_once ("../modelo/coneccionBD.php");
$cn=conectarBD();
	$query = $cn->prepare("SELECT count(*) as num FROM Alumnos WHERE eliminado=FALSE");
	$query->execute(); 
	$consultacant = $query->fetchAll();

	$cantidadalumnos=intval($consultacant[0]['num']);   //consulto la cantidad de tuplas totales sin paginar q debo mostrar

	//var_dump($consultacant);
	//var_dump($cantidadalumnos);
	//var_dump($pagina);

	$offset=(($pagina-1)*$cantxpagina);
	//var_dump($offset);
	$sss=intval($cantxpagina);
	$cantidadpaginas= intval(ceil($cantidadalumnos/$sss));  //calculo cuantas paginas debo mostrar
	//var_dump($cantidadpaginas);
	$query2=$cn->prepare("SELECT * FROM Alumnos WHERE eliminado=FALSE ORDER BY fechaAlta LIMIT :cantidad OFFSET :offset ");
	$query2->bindValue(':cantidad', $sss, PDO::PARAM_INT);
	$query2->bindValue(':offset', $offset, PDO::PARAM_INT);
	$query2->execute();
	//$error=$query2->errorInfo();
	//var_dump($error);

	$alumnos=$query2->fetchAll();
	//var_dump($alumnos);
	return $alumnos;
}
?>
