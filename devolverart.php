<?php session_start();

if (isset($_SESSION['usuario'])) {
	
}else{
	header('Location: inicio.php');
}

$errores='';
$usuario=$_SESSION['usuario'];
$nombre='';

	try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
	}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
	}

	$statement = $conexion->prepare('SELECT	* FROM usuarios WHERE nombre =:usuario');
	$statement->execute(array(':usuario'=>$usuario));
	$resultado = $statement->fetch();

	$idusuario = $resultado['idusuarios'];



if ($_SERVER['REQUEST_METHOD'] =='POST' ) {

	$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);




	try{
		$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
	}catch  (PDOException $e){
				echo "Error: ". $e->getMessage();			
	}
	
	$statement = $conexion->prepare('
		SELECT idpersonas,nombre FROM prestamo INNER JOIN personas ON prestamo.personas_idpersonas = personas.idpersonas  WHERE nombre =:nombre and usuarios_idusuarios =:idusuario LIMIT 1 ');
	
	$statement ->execute(array(
		':nombre'=>$nombre,
		':idusuario'=>$idusuario
	));

	$resultado = $statement ->fetch();

	$idpersona=$resultado['idpersonas'];

	if ($resultado != true) {
		$errores.='La persona no tiene ningun prestamo';
	}else{
		
		
		$statement = $conexion->prepare('SELECT personas.nombre, articulos.nombre, prestamo.cantidad,articulos.idarticulos,prestamo.idprestamo FROM prestamo INNER JOIN articulos ON prestamo.articulos_idarticulos = articulos.idarticulos INNER JOIN personas ON prestamo.personas_idpersonas = personas.idpersonas WHERE personas.nombre = :nombre AND articulos.usuarios_idusuarios = :idusuario');
		
		$statement ->execute(array(
			':nombre'=>$nombre,
			':idusuario'=>$idusuario
		));

		$resultadoN = $statement->fetch();
		$nombreP = $resultadoN[0];
		$nombreA = $resultadoN[1];
		$cantidad = $resultadoN[2];
		$idarticulo = $resultadoN[3];
		$idprestamo = $resultadoN[4];

		

	}

}
require'views/devolverart.view.php';

?>