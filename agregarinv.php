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

/* Metodo para buscar en la base de datos el nombre del personal*/
	$statement_ubicacion = $conexion->prepare('
		SELECT ubicacion FROM ubicacion WHERE usuarios_idusuarios =:idusuario'
	);
	$statement_ubicacion->execute(array(':idusuario'=>$idusuario));
	$resultado_ubicacion = $statement_ubicacion->fetchAll();
/* -------------------------------------------------------------*/
/* Metodo para buscar en la base de datos el nombre del personal*/
	$statement_familia = $conexion->prepare('
		SELECT familia FROM familia WHERE usuarios_idusuarios =:idusuario'
	);
	$statement_familia->execute(array(':idusuario'=>$idusuario));
	$resultado_familia = $statement_familia->fetchAll();
/* -------------------------------------------------------------*/	
/* Metodo para buscar en la base de datos el nombre del personal*/
	$statement_subfamilia = $conexion->prepare('
		SELECT subfamilia FROM subfamilia WHERE usuarios_idusuarios =:idusuario'
	);
	$statement_subfamilia->execute(array(':idusuario'=>$idusuario));
	$resultado_subfamilia = $statement_subfamilia->fetchAll();
/* -------------------------------------------------------------*/
/* Metodo para buscar en la base de datos el nombre del personal*/
	$statement_unidad = $conexion->prepare('
		SELECT unidad FROM unidad WHERE usuarios_idusuarios =:idusuario'
	);
	$statement_unidad->execute(array(':idusuario'=>$idusuario));
	$resultado_unidad = $statement_unidad->fetchAll();
/* -------------------------------------------------------------*/

	

if ($_SERVER['REQUEST_METHOD'] =='POST' ) {

	$descripcion = filter_var(strtolower($_POST['descripcion']),FILTER_SANITIZE_STRING);
	$marca = filter_var(strtolower($_POST['marca']),FILTER_SANITIZE_STRING);
	$cantidad = filter_var(strtolower($_POST['cantidad']),FILTER_SANITIZE_STRING);
	$sububicacion = filter_var(strtolower($_POST['sububicacion']),FILTER_SANITIZE_STRING);
	$unidad = filter_var(strtolower($_POST['unidad']),FILTER_SANITIZE_STRING);
	$ubicacion= filter_var(strtolower($_POST['ubicacion']),FILTER_SANITIZE_STRING);
	$familia= filter_var(strtolower($_POST['familia']),FILTER_SANITIZE_STRING);
	$subfamilia = filter_var(strtolower($_POST['subfamilia']),FILTER_SANITIZE_STRING);

	$ocupado=1;
	$errores='';
	$agregado='';//significa que 1 = no (no esta ocupado)
/*
	echo "-------------";
	echo "<br";
	echo 'descripcio: '.$descripcion;
	echo "<br>";
	echo 'marca: '.$marca;
	echo "<br>";
	echo 'cantidad: '.$cantidad;
	echo "<br>";
	echo 'sububicacion: '.$sububicacion;
	echo "<br>";
	echo 'unidad: '.$unidad;
	echo "<br>";
	echo 'ubicacion: '.$ubicacion;
	echo "<br>";
	echo 'familia: '.$familia;
	echo "<br>";
	echo 'subfamilia: '.$subfamilia;
	echo "<br>";
	echo 'usuarios: '.$usuario;
	echo "<br>";

*/	

	try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
		}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
		}

		
	if (empty($descripcion) or empty($marca) or empty($cantidad)or empty($sububicacion) or empty($unidad) or empty($ubicacion) or empty($familia) or empty($subfamilia) ) {
			$errores .='<li> Por favor rellena todos los datos correctamente</li>';
	}else{

		try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
		}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
		}

		$statement = $conexion->prepare('SELECT	* FROM articulos WHERE descripcion =:descripcion LIMIT 1 ');
		$statement->execute(array(':descripcion'=>$descripcion));
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores .='<li> El Articulo ya existe</li>';
		}

		$statement = $conexion->prepare('SELECT	* FROM ubicacion WHERE ubicacion =:ubicacion AND usuarios_idusuarios =:idusuario LIMIT 1');
		$statement->execute(array(':ubicacion'=>$ubicacion,':idusuario'=>$idusuario));
		$resultado = $statement->fetch();
		$ubicacion = $resultado['idubicacion'];

		$statement = $conexion->prepare('SELECT	* FROM familia WHERE familia =:familia AND usuarios_idusuarios =:idusuario LIMIT 1');
		$statement->execute(array(':familia'=>$familia,':idusuario'=>$idusuario));
		$resultado = $statement->fetch();
		$familia = $resultado['idfamilia'];

		$statement = $conexion->prepare('SELECT	* FROM subfamilia WHERE subfamilia =:subfamilia AND usuarios_idusuarios =:idusuario LIMIT 1' );
		$statement->execute(array(':subfamilia'=>$subfamilia,':idusuario'=>$idusuario));
		$resultado = $statement->fetch();
		$subfamilia = $resultado['idsubfamilia'];

		$statement = $conexion->prepare('SELECT	* FROM unidad WHERE unidad =:unidad AND usuarios_idusuarios =:idusuario LIMIT 1');
		$statement->execute(array(':unidad'=>$unidad,':idusuario'=>$idusuario));
		$resultado = $statement->fetch();
		$unidad = $resultado['idunidad'];

		if ($errores =='') {

			
		$statement = $conexion->prepare('INSERT INTO articulos (idarticulos,descripcion,marca,cantidad,sububicacion,ocupado_idocupado,usuarios_idusuarios,unidad_idunidad,ubicacion_idubicacion,familia_idfamilia,subfamilia_idsubfamilia) 
			VALUES (null,:descripcion,:marca,:cantidad,:sububicacion,:ocupado,:idusuario,:unidad,:ubicacion,:familia,:subfamilia)');

		$statement ->execute(array(
			':descripcion'=> $descripcion,
			':marca'=> $marca,
			':cantidad'=> $cantidad,
			':sububicacion'=> $sububicacion, 
			':ocupado'=> $ocupado,
			':idusuario'=> $idusuario,
			':unidad'=>$unidad,
			':ubicacion'=>$ubicacion,
			':familia'=>$familia,
			':subfamilia'=>$subfamilia
			));
		$resultado = $statement->fetch();

			$agregado .='<li> El Articulo se a agregado</li>';
			//header('Location: game.php');
				
		}

	}

}

require'views/agregarinv.view.php';

?>