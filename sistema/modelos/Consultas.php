<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
//funcion comprafecha espera dos parametros fechainicio y fecha fin para conocer el rango de fecha a la hora de listar compras por fechas
	public function comprasfecha($fecha_inicio,$fecha_fin)
	{
		$sql="SELECT DATE(i.fecha_hora) as fecha,u.nombre as usuario, p.nombre as proveedor,i.tipo_comprobante,i.serie_comprobante,i.num_comprobante,i.total_compra,i.impuesto,i.estado FROM ingreso i INNER JOIN persona p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario WHERE DATE(i.fecha_hora)>='$fecha_inicio' AND DATE(i.fecha_hora)<='$fecha_fin'";
		return ejecutarConsulta($sql);		
	}

	public function ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente)
	{
		$sql="SELECT DATE(v.fecha_hora) as fecha,u.nombre as usuario, p.nombre as cliente,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin' AND v.idcliente='$idcliente'";
		return ejecutarConsulta($sql);		
	}

	public function totalcomprahoy()
	{
		//utilizamos una consulta sql ultilizando la funcion de agregado sum(sumar)q agarre todos los campos tota compra en fecha actual si no hay compras actuales mostrara el valor 0 y se va a renombrar total compras de la tabla ingreso usando la funcion date para octener año fecha y hora de las compras
		$sql="SELECT IFNULL(SUM(total_compra),0) as total_compra FROM ingreso WHERE DATE(fecha_hora)=curdate()";
		return ejecutarConsulta($sql);
	}

	public function totalventahoy()
	{

		$sql="SELECT IFNULL(SUM(total_venta),0) as total_venta FROM venta WHERE DATE(fecha_hora)=curdate()";
		return ejecutarConsulta($sql);
	}

	public function comprasultimos_10dias()
	{
		//concatenamos para obtener fecha del campo fecha_hora, usamos sum para obtener el total compras de la tabla ingeso de manera desendentes y usando limit obtendremos los 10 primeras dias 
		$sql="SELECT CONCAT(DAY(fecha_hora),'-',MONTH(fecha_hora)) as fecha,SUM(total_compra) as total FROM ingreso GROUP by fecha_hora ORDER BY fecha_hora DESC limit 0,10";
		return ejecutarConsulta($sql);
	}

	public function ventasultimos_12meses()
	{
		$sql="SELECT DATE_FORMAT(fecha_hora,'%M') as fecha,SUM(total_venta) as total FROM venta GROUP by MONTH(fecha_hora) ORDER BY fecha_hora DESC limit 0,10";
		return ejecutarConsulta($sql);
	}
}

?>