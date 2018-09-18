<?php session_start();

/*if (isset($_SESSION['usuario'])) {
	
}else{
	header('Location: inicio.php');
}
*/

if ($_SERVER['REQUEST_METHOD'] =='POST' ) {

	$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
	
	$usuario=$_SESSION['usuario'];
	$errores='';
	$agregado='';
	//significa que 1 = no (no esta ocupado)

	try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
		}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
		}

		$statement = $conexion->prepare('SELECT	* FROM usuarios WHERE nombre =:usuario');
		$statement->execute(array(':usuario'=>$usuario));
		$resultado = $statement->fetch();
		$idusuario = $resultado['idusuarios'];
		

	if (empty($nombre)) {
			$errores .='<li> Por favor rellena todos los datos correctamente</li>';
	}else{

		try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
		}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
		}

		$statement = $conexion->prepare('SELECT	* FROM personas WHERE nombre =:nombre LIMIT 1 ');
		$statement->execute(array(':nombre'=>$nombre));
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores .='<li> La persona ya existe</li>';
		}

		if ($errores =='') {

			
		$statement = $conexion->prepare('INSERT INTO personas 
			(idpersonas,nombre,usuarios_idusuarios) 
			VALUES (null,:nombre,:idusuario)');

		$statement ->execute(array(
			':nombre'=> $nombre,
			':idusuario'=> $idusuario
			));
		$resultado = $statement->fetch();

			$agregado .='<li> La persona se a agregado</li>';
			//header('Location: game.php');
		}

	}

}

require'views/agregarper.view.php';

?>