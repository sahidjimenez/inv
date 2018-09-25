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

		$statement = $conexion->prepare('SELECT * FROM personas left JOIN prestamo ON personas.idpersonas = prestamo.personas_idpersonas left JOIN articulos ON prestamo.articulos_idarticulos = articulos.idarticulos WHERE personas.usuarios_idusuarios =:idusuario');
		$statement->execute(array(':idusuario'=>$idusuario));
		$resultado = $statement->fetchAll();

		//print_r($resultado);
		
require'views/buscarper.view.php';

?>