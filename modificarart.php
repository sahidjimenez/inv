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

	try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
	}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
	}

	$statement = $conexion->prepare('SELECT	* FROM usuarios WHERE nombre =:usuario');
	$statement->execute(array(':usuario'=>$usuario));
	$resultado = $statement->fetch();

$idusuario = $resultado['idusuarios'];

	

	if ($_SERVER['REQUEST_METHOD'] =='POST' ){

		echo "boton presionado";
	}else{
		echo "no se";
	}



require'views/modificarart.view.php';
	
?>