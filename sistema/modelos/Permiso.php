<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Permiso
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	
	//Implementar un método para listar los registros ya que los permisos van a estar registrados en la base de datos ya que el usuario no va apoder registar permisos ni modificar solo va a poder visualizarlos
	public function listar()
	{
		$sql="SELECT * FROM permiso";
		return ejecutarConsulta($sql);		
	}

}

?>