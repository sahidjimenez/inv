<?php session_start();

/*if (isset($_SESSION['usuario'])) {
	
}else{
	header('Location: inicio.php');
}
*/

if ($_SERVER['REQUEST_METHOD'] =='POST' ) {

	$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
	$descripcion = filter_var(strtolower($_POST['descripcion']),FILTER_SANITIZE_STRING);
	$descripcion2 = filter_var(strtolower($_POST['descripcion2']),FILTER_SANITIZE_STRING);
	$cantidad = filter_var(strtolower($_POST['cantidad']),FILTER_SANITIZE_STRING);
	$estado = filter_var(strtolower($_POST['estado']),FILTER_SANITIZE_STRING);
	$ocupado=1;
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
		

	if (empty($nombre)or empty($descripcion)or empty($cantidad)or empty($estado) ) {
			$errores .='<li> Por favor rellena todos los datos correctamente</li>';
	}else{

		try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
		}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
		}

		$statement = $conexion->prepare('SELECT	* FROM articulos WHERE nombre =:nombre LIMIT 1 ');
		$statement->execute(array(':nombre'=>$nombre));
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores .='<li> El Articulo ya existe</li>';
		}

		if ($errores =='') {

		/*	echo $nombre;
			echo "<br>";
			echo $descripcion;
			echo "<br>";
			echo $descripcion2;
			echo "<br>";
			echo $cantidad;
			echo "<br>";
			echo $estado;
			echo "<br>";
			echo $ocupado;
			echo "<br>";
			echo $idusuario;
		*/
			
		$statement = $conexion->prepare('INSERT INTO articulos 
			(idarticulos,nombre,descripcion,descripcion1,cantidad,estado_idestado,ocupado_idocupado,usuarios_idusuarios) 
			VALUES (null,:nombre,:descripcion,:descripcion2,:cantidad,:estado,:ocupado,:idusuario)');

		$statement ->execute(array(
			':nombre'=> $nombre,
			':descripcion'=> $descripcion,
			':descripcion2'=> $descripcion2,
			':cantidad'=> $cantidad,
			':estado'=> $estado, 
			':ocupado'=> $ocupado,
			':idusuario'=> $idusuario
			));
		$resultado = $statement->fetch();

			$agregado .='<li> El Articulo se a agregado</li>';
			//header('Location: game.php');
		}

	}

}

require'views/agregarinv.view.php';

?>