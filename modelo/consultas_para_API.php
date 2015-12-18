<?php 
require_once ('../modelo/coneccionBD.php');
function consultar_cuotas_pagas_de_alumno($dni,$anio){
	$cn=conectarBD();
	$query=$cn->prepare('SELECT Pagos.fecha,Cuotas.numero
						 FROM Pagos INNER JOIN Alumnos ON (Alumnos.id=Pagos.idAlumno) INNER JOIN Cuotas ON (Cuotas.id=Pagos.idCuota)
	 					WHERE (year(fecha)=?) AND (Alumnos.numeroDoc=?) AND (Cuotas.tipo="cuota") AND Cuotas.eliminada=0');
	$query->execute(array($anio,$dni));
	return $query->fetchAll(PDO::FETCH_ASSOC);


}

function consultar_cuotas_no_pagas_de_alumno($dni,$anio){
	$cn=conectarBD();
	$query=$cn->prepare('SELECT Cuotas.numero,Cuotas.anio,Cuotas.mes
						 FROM Cuotas
	 					WHERE (Cuotas.anio=?) AND (Cuotas.tipo="cuota") AND (Cuotas.eliminada=0)
	 					AND NOT EXISTS(SELECT *
 									FROM Pagos INNER JOIN Alumnos ON (Pagos.idAlumno=Alumnos.id)
 									WHERE Alumnos.numeroDoc=? AND Pagos.idCuota=Cuotas.id	)');
	$query->execute(array($anio,$dni));
	return $query->fetchAll(PDO::FETCH_ASSOC);
}


function consultar_montos_para_API($anio){
	$cn=conectarBD();
	$query=$cn->prepare('SELECT SUM(Cuotas.monto) as monto_por_mes 
						FROM Pagos INNER JOIN Cuotas ON (Pagos.idCuota=Cuotas.id AND year(Pagos.fecha)=?) RIGHT JOIN Meses ON (month(Pagos.fecha)=Meses.idMes) 
						GROUP BY Meses.idMes 
						ORDER BY Meses.idMes');
	$query->execute(array($anio));
	return $query->fetchAll(PDO::FETCH_ASSOC);


}



?>