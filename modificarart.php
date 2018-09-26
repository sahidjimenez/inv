<?php session_start();

if (isset($_SESSION['usuario'])) {
	
}else{
	header('Location: inicio.php');
}

$errores='';
$usuario=$_SESSION['usuario'];

$idarticulo = $_POST['idarticulo'];

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$descripcion1 = $_POST['descripcion1'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];


	

	try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
	}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
	}

	$statement = $conexion->prepare('SELECT	* FROM usuarios WHERE nombre =:usuario');
	$statement->execute(array(':usuario'=>$usuario));
	$resultado = $statement->fetch();

	$idusuario = $resultado['idusuarios'];

	

require'views/modificarart.view.php';
	
?>