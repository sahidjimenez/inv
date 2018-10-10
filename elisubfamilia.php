<?php session_start();

if (isset($_SESSION['usuario'])) {
	
}else{
	header('Location: inicio.php');
}

$valor = $_POST['eliminar'];
 echo $valor;

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

		$statement = $conexion->prepare('DELETE FROM subfamilia  WHERE usuarios_idusuarios =:idusuario and idsubfamilia = :valor ');
		$statement->execute(array(':idusuario'=>$idusuario,':valor'=>$valor));
		$resultado = $statement->fetchAll();

		//print_r($resultado);
		
header('Location: buscarsubfamilia.php' );

?>