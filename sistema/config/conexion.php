<?php 
require_once "global.php";//incluimos el archivo gobal php donde tenemos todas as constantes de conexion a nuestra bd utilizando require_once

//Mysqli es un controlador de bd utilizado en php para proporcionar interfaz con base de datos MSQL
$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);//constantes definidas en nuestra conexion.php

mysqli_query( $conexion, 'SET NAMES "'.DB_ENCODE.'"');

//Si tenemos un posible error en la conexión lo mostramos
if (mysqli_connect_errno())
{
	printf("Falló conexión a la base de datos: %s\n",mysqli_connect_error());
	exit();
}
//funciones para hacer peticiones a la base dde datos y evaluamos si exixte peticiones al metodo ejecutar consulta esto es para q si queremos ejecutar cualquier consulta tenemos q llamar a una de las funciones declaradas
if (!function_exists('ejecutarConsulta'))
{
	function ejecutarConsulta($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);
		return $query;
	}

	function ejecutarConsultaSimpleFila($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);		
		$row = $query->fetch_assoc();
		return $row;
	}

	function ejecutarConsulta_retornarID($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);		
		return $conexion->insert_id;			
	}

	function limpiarCadena($str)
	{
		global $conexion;
		$str = mysqli_real_escape_string($conexion,trim($str));
		return htmlspecialchars($str);
	}
}
 ?>