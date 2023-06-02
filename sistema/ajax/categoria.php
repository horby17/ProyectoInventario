<?php 
require_once "../modelos/Categoria.php";
//creamos un objeto q va a ser instancia a la tabla categoria 
$categoria=new Categoria();
//declaramos tres variables si exixten envian los datos por medio del metodo post el cual transmite datos de una página PHP a otra. 
$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
//implementamos las peticiones ajax por medio del metodo get envía la información en la propia URL luego creamos los case posible y mediante la tecnologia java script enviaremos la operacion y ejecutamos sierta intrucciones mediante la tecnologia ajax 
switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcategoria)){
			$rspta=$categoria->insertar($nombre,$descripcion);
			echo $rspta ? "Categoría registrada" : "Categoría no se pudo registrar";
		}
		else {
			$rspta=$categoria->editar($idcategoria,$nombre,$descripcion);
			echo $rspta ? "Categoría actualizada" : "Categoría no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$categoria->desactivar($idcategoria);
 		echo $rspta ? "Categoría Desactivada" : "Categoría no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$categoria->activar($idcategoria);
 		echo $rspta ? "Categoría activada" : "Categoría no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$categoria->mostrar($idcategoria);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$categoria->listar();
 		//Vamos a declarar un array para almacenar todos los registros q vamos a utilizar y implementamos botenes uno color verde si esta activa la categoria y otro de color rojo si esta desactivada
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idcategoria.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idcategoria.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->descripcion,
 				"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables a la hora de listar y paginar utilizando datatables  
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>