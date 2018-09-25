<?php  session_start();

if (isset($_SESSION['usuario'])) {
	
}else{
	header('Location: inicio.php');
}

$errores='';
$usuario=$_SESSION['usuario'];


$nombreP = $_POST['nombreP'];
$nombreA = $_POST['nombreA'];
$cantidad = $_POST['cantidad'];
$idarticulo = $_POST['id'];
$idprestamo = $_POST['idprestamo'];

/*
	echo $nombreP;
	echo $nombreA;
	echo $cantidad;
	echo $idarticulo;
	echo $idprestamo;

*/

	
if (!empty($nombreP) AND !empty($nombreA) AND !empty($cantidad) AND !empty($idprestamo) and !empty($idprestamo)  ) {

	try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
	}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
	}

	$statement = $conexion->prepare('SELECT	* FROM usuarios WHERE nombre =:usuario');
	$statement->execute(array(':usuario'=>$usuario));
	$resultado = $statement->fetch();

	$idusuario = $resultado['idusuarios'];

	$statement = $conexion->prepare('UPDATE	articulos SET cantidad=:cantidad WHERE idarticulos =:idarticulo');
	$statement->execute(array(':cantidad'=>$cantidad,':idarticulo'=>$idarticulo));
	$resultado = $statement->fetch();

	$statement = $conexion->prepare('DELETE FROM prestamo WHERE idprestamo=:idprestamo ');
	$statement->execute(array(':idprestamo'=>$idprestamo));
	$resultado = $statement->fetch();

	
	header('Location: inicio.php');
}else{

	echo "algo esta mal";
}

?>