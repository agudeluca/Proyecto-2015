<?php 
function consultaAlumnosConMatriculaEXPORTACION(&$datosprepost,$pagina,$tipodel,&$cantidadpaginas,$configuraciones,$rol,$iduser){
require_once ('../modelo/coneccionBD.php');
	$cn=conectarBD();
	if ($tipodel == 1){
$query = $cn->prepare("SELECT count(*) as num FROM Alumnos INNER JOIN Pagos ON (Alumnos.id=Pagos.idAlumno)
                                                            INNER JOIN Cuotas ON (Pagos.idCuota=Cuotas.id) 
                                                            WHERE Cuotas.tipo='matricula' and Alumnos.eliminado=0 and Cuotas.anio = YEAR(CURRENT_DATE())");
$query->execute(); 
$consultacant = $query->fetchAll();
$cantidadalumnos=intval($consultacant[0]['num']);   //consulto la cantidad de tuplas totales sin paginar q debo mostrar
$offset=(($pagina-1)*$configuraciones['0']['cantElem']);
$sss=intval($configuraciones['0']['cantElem']);
$cantidadpaginas= intval(ceil($cantidadalumnos/$sss));  
$query2=$cn->prepare("SELECT Alumnos.nombre, Alumnos.apellido, Cuotas.fechaAlta,Cuotas.comisionCob,Cuotas.monto FROM Alumnos INNER JOIN Pagos ON (Alumnos.id=Pagos.idAlumno)
                                                            INNER JOIN Cuotas ON (Pagos.idCuota=Cuotas.id) 
                                                            WHERE Cuotas.tipo='matricula' and Alumnos.eliminado=0 and Cuotas.anio = YEAR(CURRENT_DATE()) ");
$query2->execute();
$datosprepost=1;
$alumnosConMatricula=$query2->fetchAll();
return $alumnosConMatricula;
}
else{ 
	if($tipodel == 2){
		$query = $cn->prepare("SELECT count(*) as num FROM Cuotas INNER JOIN Pagos ON (Cuotas.id=Pagos.idCuota) 
			                                  INNER JOIN Alumnos ON (Alumnos.id=Pagos.idAlumno) WHERE 1 ORDER BY Cuotas.fechaAlta");
$query->execute(); 
$consultacant = $query->fetchAll();
$cantidadalumnos=intval($consultacant[0]['num']);   //consulto la cantidad de tuplas totales sin paginar q debo mostrar
$offset=(($pagina-1)*$configuraciones['0']['cantElem']);
$sss=intval($configuraciones['0']['cantElem']);
$cantidadpaginas= intval(ceil($cantidadalumnos/$sss));  
$query2=$cn->prepare("SELECT Alumnos.apellido,Alumnos.nombre,Cuotas.numero,Cuotas.fechaAlta,Cuotas.monto,Cuotas.comisionCob,Pagos.becado FROM Cuotas INNER JOIN Pagos ON (Cuotas.id=Pagos.idCuota) 
			                                  INNER JOIN Alumnos ON (Alumnos.id=Pagos.idAlumno) WHERE 1 ORDER BY Cuotas.fechaAlta ");
$query2->execute();
$datosprepost=2;
$alumnosConMatricula=$query2->fetchAll();
return $alumnosConMatricula;
	}
	else{
       if($tipodel == 3){
		$query = $cn->prepare("SELECT count(*) as num FROM (SELECT * FROM Cuotas WHERE Cuotas.mes < MONTH(CURRENT_DATE) AND Cuotas.anio <= year(CURRENT_DATE)) as ta1,(SELECT *
						     FROM Alumnos 
                             WHERE 1) as alu2 WHERE NOT EXISTS (SELECT * 
                                                                FROM Pagos 
                                                                where Pagos.idCuota=ta1.id and Pagos.idAlumno = alu2.id)
								                                ORDER BY ta1.anio DESC,ta1.mes DESC");
$query->execute(); 
$consultacant = $query->fetchAll();
$cantidadalumnos=intval($consultacant[0]['num']);   //consulto la cantidad de tuplas totales sin paginar q debo mostrar
$offset=(($pagina-1)*$configuraciones['0']['cantElem']);
$sss=intval($configuraciones['0']['cantElem']);
$cantidadpaginas= intval(ceil($cantidadalumnos/$sss));  
$query2=$cn->prepare("SELECT * FROM (SELECT * FROM Cuotas WHERE Cuotas.mes < MONTH(CURRENT_DATE) AND Cuotas.anio <= year(CURRENT_DATE)) as ta1,(SELECT *
						     FROM Alumnos 
                             WHERE 1) as alu2 WHERE NOT EXISTS (SELECT * 
                                                                FROM Pagos 
                                                                where Pagos.idCuota=ta1.id and Pagos.idAlumno = alu2.id)
								                                ORDER BY ta1.anio DESC,ta1.mes DESC ");
$query2->execute();
$datosprepost=3;
$alumnosConMatricula=$query2->fetchAll();
return $alumnosConMatricula;




}
else {
if ($tipodel == 5){
$query = $cn->prepare("SELECT count(*) as num FROM Pagos inner join Cuotas on (Cuotas.id=Pagos.idCuota) 
WHERE Pagos.id_user=? GROUP by  MONTH(Pagos.FechaAlta),year(Pagos.FechaAlta)");
$query->execute(array($iduser)); 
$consultacant = $query->fetchAll();
$cantidadalumnos=intval($consultacant[0]['num']);   //consulto la cantidad de tuplas totales sin paginar q debo mostrar
$offset=(($pagina-1)*$configuraciones['0']['cantElem']);
$sss=intval($configuraciones['0']['cantElem']);
$cantidadpaginas= intval(ceil($cantidadalumnos/$sss));  
$query2=$cn->prepare("SELECT sum(Cuotas.comisionCob) as comision,year(Pagos.fechaAlta) as ano,month(Pagos.fechaAlta) as mes FROM Pagos inner join Cuotas on (Cuotas.id=Pagos.idCuota) WHERE Pagos.id_user=:user GROUP by MONTH(Pagos.fechaAlta),year(Pagos.fechaAlta)");
$query2->bindValue(':user', $iduser);
$query2->execute();
$datosprepost=5;
$alumnosConMatricula=$query2->fetchAll();

return $alumnosConMatricula;
}
else{
	$datosprepost=4;
}}

    }
}



}
?>

