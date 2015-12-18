<?php 
function consultaAlumnosPropios(&$datosprepost,&$pagina,$tipodel,$nombreusuario,&$cantidadpaginas,$configuraciones,$token,$sessiontoken){
require_once ('../modelo/coneccionBD.php');
	$cn=conectarBD();
	if (((empty($tipodel))  || $tipodel == 1)and ($token==$sessiontoken)){
$query = $cn->prepare("SELECT count(*) as num 
	                    FROM Alumnos INNER JOIN Pagos ON (Alumnos.id=Pagos.idAlumno) 
	                                 INNER JOIN Cuotas ON (Pagos.idCuota=Cuotas.id) 
	                                 INNER JOIN AlumnoResponsable ON (Alumnos.id = AlumnoResponsable.idAlumno) 
	                                 INNER JOIN Responsables ON (Responsables.id= AlumnoResponsable.idResponsable) 
	                                 INNER JOIN UsuarioResponsable ON (UsuarioResponsable.idResponsable=Responsables.id) 
	                                 INNER JOIN Usuarios ON (Usuarios.id=UsuarioResponsable.idUsuario) 
	                    WHERE Cuotas.tipo='matricula' and Alumnos.eliminado=0 and Cuotas.anio = YEAR(CURRENT_DATE()) and Usuarios.username=?");
$query->execute(array($nombreusuario));
$consultacant = $query->fetchAll();
$cantidadalumnos=intval($consultacant[0]['num']);   //consulto la cantidad de tuplas totales sin paginar q debo mostrar
$offset=(($pagina-1)*$configuraciones['0']['cantElem']);
$sss=intval($configuraciones['0']['cantElem']);
$cantidadpaginas= intval(ceil($cantidadalumnos/$sss)); 
$query2=$cn->prepare("SELECT * 
	                    FROM Alumnos INNER JOIN Pagos ON (Alumnos.id=Pagos.idAlumno) 
	                                 INNER JOIN Cuotas ON (Pagos.idCuota=Cuotas.id) 
	                                 INNER JOIN AlumnoResponsable ON (Alumnos.id = AlumnoResponsable.idAlumno) 
	                                 INNER JOIN Responsables ON (Responsables.id= AlumnoResponsable.idResponsable) 
	                                 INNER JOIN UsuarioResponsable ON (UsuarioResponsable.idResponsable=Responsables.id) 
	                                 INNER JOIN Usuarios ON (Usuarios.id=UsuarioResponsable.idUsuario) 
	                    WHERE Cuotas.tipo='matricula' and Alumnos.eliminado=0 and Cuotas.anio = YEAR(CURRENT_DATE()) and Usuarios.username=:user LIMIT :cantidad OFFSET :offset");
$query2->bindValue(':cantidad', $sss, PDO::PARAM_INT);
$query2->bindValue(':offset', $offset, PDO::PARAM_INT);
$query2->bindValue(':user', $nombreusuario);
$query2->execute();
$datosprepost=1;
$alumnosConMatricula=$query2->fetchAll();
return $alumnosConMatricula;
}
else{
	if (($tipodel == 2)and ($token==$sessiontoken)){
		$query = $cn->prepare("SELECT count(*) as num FROM Cuotas 
			                         INNER JOIN Pagos ON (Cuotas.id=Pagos.idCuota) 
			                         INNER JOIN Alumnos ON (Alumnos.id=Pagos.idAlumno)
                                     INNER JOIN AlumnoResponsable ON (Alumnos.id = AlumnoResponsable.idAlumno) 
	                                 INNER JOIN Responsables ON (Responsables.id= AlumnoResponsable.idResponsable) 
	                                 INNER JOIN UsuarioResponsable ON (UsuarioResponsable.idResponsable=Responsables.id) 
	                                 INNER JOIN Usuarios ON (Usuarios.id=UsuarioResponsable.idUsuario) 
                                     WHERE Cuotas.tipo='matricula' and Alumnos.eliminado=0 and Cuotas.anio = YEAR(CURRENT_DATE()) and Usuarios.username=? ORDER BY Cuotas.fechaAlta ");


	
$query->execute(array($nombreusuario));
$consultacant = $query->fetchAll();
$cantidadalumnos=intval($consultacant[0]['num']);   //consulto la cantidad de tuplas totales sin paginar q debo mostrar
$offset=(($pagina-1)*$configuraciones['0']['cantElem']);
$sss=intval($configuraciones['0']['cantElem']);
$cantidadpaginas= intval(ceil($cantidadalumnos/$sss)); 
$query2=$cn->prepare("SELECT * FROM Cuotas 
			                         INNER JOIN Pagos ON (Cuotas.id=Pagos.idCuota) 
			                         INNER JOIN Alumnos ON (Alumnos.id=Pagos.idAlumno)
                                     INNER JOIN AlumnoResponsable ON (Alumnos.id = AlumnoResponsable.idAlumno) 
	                                 INNER JOIN Responsables ON (Responsables.id= AlumnoResponsable.idResponsable) 
	                                 INNER JOIN UsuarioResponsable ON (UsuarioResponsable.idResponsable=Responsables.id) 
	                                 INNER JOIN Usuarios ON (Usuarios.id=UsuarioResponsable.idUsuario) 
                                     WHERE Cuotas.tipo='matricula' and Alumnos.eliminado=0 and Cuotas.anio = YEAR(CURRENT_DATE()) and Usuarios.username=:user ORDER BY Cuotas.fechaAlta  LIMIT :cantidad OFFSET :offset");
$query2->bindValue(':cantidad', $sss, PDO::PARAM_INT);
$query2->bindValue(':offset', $offset, PDO::PARAM_INT);
$query2->bindValue(':user', $nombreusuario);
$query2->execute();
$datosprepost=2;
$alumnosConMatricula=$query2->fetchAll();
return $alumnosConMatricula;
}
else{
	$query = $cn->prepare("SELECT count(*) as num FROM (SELECT * FROM Cuotas WHERE Cuotas.mes < MONTH(CURRENT_DATE) AND Cuotas.anio <= year(CURRENT_DATE)) as ta1,(SELECT AlumnoResponsable.idAlumno,Alumnos.nombre,Alumnos.apellido,Alumnos.numeroDoc
 FROM Usuarios  INNER JOIN UsuarioResponsable ON (Usuarios.id = UsuarioResponsable.idUsuario) 
                INNER JOIN AlumnoResponsable  ON ( UsuarioResponsable.idResponsable = AlumnoResponsable.idResponsable)
                INNER JOIN Alumnos ON (Alumnos.id = AlumnoResponsable.idAlumno) 
                WHERE Usuarios.username=?) as tat2 WHERE NOT EXISTS (SELECT * FROM Pagos where Pagos.idCuota=ta1.id and Pagos.idAlumno= tat2.idAlumno) ORDER BY ta1.anio DESC,ta1.mes DESC");
	
$query->execute(array($nombreusuario));
$consultacant = $query->fetchAll();

$cantidadalumnos=intval($consultacant[0]['num']);   //consulto la cantidad de tuplas totales sin paginar q debo mostrar
$offset=(($pagina-1)*$configuraciones['0']['cantElem']);
$sss=intval($configuraciones['0']['cantElem']);
$cantidadpaginas= intval(ceil($cantidadalumnos/$sss)); 
$query2=$cn->prepare("SELECT * FROM (SELECT * FROM Cuotas WHERE Cuotas.mes < MONTH(CURRENT_DATE) AND Cuotas.anio <= year(CURRENT_DATE)) as ta1,(SELECT AlumnoResponsable.idAlumno,Alumnos.nombre,Alumnos.apellido,Alumnos.numeroDoc
 FROM Usuarios  INNER JOIN UsuarioResponsable ON (Usuarios.id = UsuarioResponsable.idUsuario) 
                INNER JOIN AlumnoResponsable  ON ( UsuarioResponsable.idResponsable = AlumnoResponsable.idResponsable)
                INNER JOIN Alumnos ON (Alumnos.id = AlumnoResponsable.idAlumno) 
                WHERE Usuarios.username=:user) as tat2 WHERE NOT EXISTS (SELECT * FROM Pagos where Pagos.idCuota=ta1.id and Pagos.idAlumno= tat2.idAlumno) ORDER BY ta1.anio DESC,ta1.mes DESC LIMIT :cantidad OFFSET :offset");
$query2->bindValue(':cantidad', $sss, PDO::PARAM_INT);
$query2->bindValue(':offset', $offset, PDO::PARAM_INT);
$query2->bindValue(':user', $nombreusuario);
$query2->execute();
$datosprepost=3;
$alumnosConMatricula=$query2->fetchAll();
return $alumnosConMatricula;
}

}}
?>