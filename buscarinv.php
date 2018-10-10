<?php session_start();


if (isset($_SESSION['usuario'])) {
	
}else{
	header('Location: inicio.php');
}


$usuario=$_SESSION['usuario'];
		
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
	}catch  (PDOException $e){
		echo "Error: ". $e->getMessage();			
	}

	$statement = $conexion->prepare('SELECT	* FROM usuarios WHERE nombre =:usuario');
	$statement->execute(array(':usuario'=>$usuario));
	$resultado = $statement->fetch();

$idusuario = $resultado['idusuarios'];

	try{
		$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
	}catch  (PDOException $e){
		echo "Error: ". $e->getMessage();			
	}

	$statement = $conexion->prepare('SELECT articulos.idarticulos, articulos.descripcion, articulos.marca, articulos.sububicacion, familia.familia, subfamilia.subfamilia, unidad.unidad, articulos.cantidad, ubicacion.ubicacion, articulos.usuarios_idusuarios FROM articulos INNER JOIN ubicacion ON ubicacion.idubicacion = articulos.ubicacion_idubicacion INNER JOIN familia ON articulos.familia_idfamilia = familia.idfamilia INNER JOIN subfamilia ON articulos.subfamilia_idsubfamilia = subfamilia.idsubfamilia INNER JOIN unidad ON articulos.unidad_idunidad = unidad.idunidad WHERE articulos.usuarios_idusuarios = :idusuario');
	$statement->execute(array(':idusuario'=>$idusuario));
	$resultado = $statement->fetchAll();

	$nombre ="celular"; 


	$statementbus = $conexion->prepare('SELECT articulos.cantidad,ubicacion.ubicacion FROM articulos INNER JOIN ubicacion ON articulos.ubicacion_idubicacion = ubicacion.idubicacion WHERE articulos.descripcion = :nombre');
	$statementbus->execute(array(':nombre'=>$nombre));
	$resultadobus = $statementbus->fetchAll();

		//print_r($resultado);
		
require'views/buscarinv.view.php';

?>