<?php session_start();



if (isset($_SESSION['usuario'])) {
	
}else{
	header('Location: inicio.php');
}

$errores='';
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
	}catch(PDOException $e){
		echo "Error".$e->getMessage();
	}

/* Metodo para buscar en la base de datos el nombre del personal*/
	$statement_personas = $conexion->prepare('
		SELECT nombre FROM personas WHERE usuarios_idusuarios =:idusuario'
	);
	$statement_personas->execute(array(':idusuario'=>$idusuario));
	$resultado_personas = $statement_personas->fetchAll();
/* -------------------------------------------------------------*/	

/* Metodo para buscar en la base de datos el nombre del articulo*/
	$statement_articulos = $conexion->prepare('SELECT articulos.descripcion,articulos.cantidad,ubicacion.ubicacion FROM articulos INNER JOIN ubicacion ON articulos.ubicacion_idubicacion= ubicacion.idubicacion WHERE articulos.usuarios_idusuarios = :idusuario'
	);
	$statement_articulos->execute(array(':idusuario'=>$idusuario));
	$resultado_articulos = $statement_articulos->fetchAll();
/* -------------------------------------------------------------*/	


if ($_SERVER['REQUEST_METHOD'] =='POST' ) {

	$persona = filter_var(strtolower($_POST['persona']),FILTER_SANITIZE_STRING);
	$articulo = filter_var(strtolower($_POST['articulo']),FILTER_SANITIZE_STRING);
	$cantidad = filter_var(strtolower($_POST['cantidad']),FILTER_SANITIZE_STRING);
	$date = $_POST['date'];
   	echo $date;
   	
	if (empty($persona)or empty($articulo) ) {
			$errores .='<li> Por favor rellena todos los datos correctamente</li>';
	}else{

		try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
		}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
		}

		$statement_checar_persona = $conexion->prepare('SELECT idpersonas,nombre FROM personas WHERE nombre =:nombre LIMIT 1 ');
		$statement_checar_persona ->execute(array(':nombre'=>$persona));
		$resultado_checar_persona = $statement_checar_persona->fetch();

		$idpersona=$resultado_checar_persona['idpersonas'];

		if ($resultado_checar_persona != true) {
			$errores.='El personal no existe';
		}	
		

		$statement_checar_articulo = $conexion->prepare('SELECT idarticulos,descripcion FROM articulos WHERE nombre =:nombre LIMIT 1 ');
		$statement_checar_articulo->execute(array(':nombre'=>$articulo));
		$resultado_checar_articulo = $statement_checar_articulo->fetch();

		$idarticulo= $resultado_checar_articulo['idarticulos'];

		if ($resultado_checar_articulo != true) {
			$errores.='El articulo no existe';
		}
				
		$statement_checar_cantidad = $conexion->prepare('SELECT cantidad FROM articulos WHERE nombre =:nombre LIMIT 1 ');
		$statement_checar_cantidad->execute(array(':nombre'=>$articulo));
		$resultado_checar_cantidad = $statement_checar_cantidad->fetch();

		$cantidad_vieja=$resultado_checar_cantidad['cantidad'];

		$cantidad_nueva=$cantidad_vieja-$cantidad;
		$ocupado=2;


		if ($cantidad >= 1 && $cantidad <= $resultado_checar_cantidad['cantidad']) {

		}else{
			$errores.='valor invalido';
		}

		if ($errores =="") {

			$statement = $conexion->prepare('INSERT INTO prestamo 
				(idprestamo,cantidad,articulos_idarticulos,personas_idpersonas)
				VALUES
				(NULL,:cantidad,:idarticulo,:idpersona)');
			$statement->execute(array(
				':cantidad'=>$cantidad,
				':idarticulo'=>$idarticulo,
				':idpersona'=>$idpersona
			));
			$resultado_ = $statement->fetch();

			$statement = $conexion->prepare('UPDATE articulos SET cantidad=:cantidad, ocupado_idocupado=:ocupado WHERE idarticulos= :idarticulo');
			$statement->execute(array(
				':cantidad'=>$cantidad_nueva,
				':ocupado'=>$ocupado,
				':idarticulo'=>$idarticulo
			));
			$resultado = $statement->fetch();
			header('Location: prestarart.php');
		}
	}
}


require'views/prestarart.view.php';

?>