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


/* Metodo para buscar en la base de datos el nombre del personal*/
	$statement_personas = $conexion->prepare('
		SELECT nombre FROM personas WHERE usuarios_idusuarios =:idusuario'
	);
	$statement_personas->execute(array(':idusuario'=>$idusuario));
	$resultado_personas = $statement_personas->fetchAll();
/* -------------------------------------------------------------*/
/* Metodo para buscar en la base de datos las nuevas ubicaciones*/
	$statement_ubicacion = $conexion->prepare('
		SELECT ubicacion FROM ubicacion WHERE usuarios_idusuarios =:idusuario'
	);
	$statement_ubicacion->execute(array(':idusuario'=>$idusuario));
	$resultado_ubicacion = $statement_ubicacion->fetchAll();
/* -------------------------------------------------------------*/	

/* Metodo para buscar en la base de datos el nombre del articulo*/
	$statement_articulos = $conexion->prepare('SELECT DISTINCT descripcion FROM articulos WHERE usuarios_idusuarios = :idusuario'
	);
	$statement_articulos->execute(array(':idusuario'=>$idusuario));
	$resultado_articulos = $statement_articulos->fetchAll();
/* -------------------------------------------------------------*/	


if ($_SERVER['REQUEST_METHOD'] =='POST' ) {

	
	$articulo = filter_var(strtolower($_POST['articulo']),FILTER_SANITIZE_STRING);
	$ubicacionMostrar="";
	
	
   	
	if (empty($articulo) ) {
			$errores .='<li> Por favor rellena todos los datos correctamente</li>';
	}else{

		try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
		}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
		}
			

		$statement_checar_articulo = $conexion->prepare('SELECT idarticulos,descripcion FROM articulos WHERE descripcion =:nombre LIMIT 1 ');
		$statement_checar_articulo->execute(array(':nombre'=>$articulo));
		$resultado_checar_articulo = $statement_checar_articulo->fetch();

		$idarticulo= $resultado_checar_articulo['idarticulos'];

		if ($resultado_checar_articulo != true) {
			$errores.='El articulo no existe';
		}
				
		

		if ($errores =="") {

			
			$statement = $conexion->prepare('SELECT descripcion FROM articulos WHERE descripcion = :articulo');
			$statement ->execute(array(':articulo'=>$articulo));
			$resultado = $statement->fetchAll();

			/*
			echo "<pre>";
			print_r($resultado);
			echo "</pre>";

			
			foreach ($resultado as $valor) {
				echo $valor['descripcion'];
			}
			*/
			$contar = count($resultado);
			//echo $contar;
			
			if ($contar <= 1) {
				$valoresMostrar="si se crea";
				//echo "el array tiene un solo valor ";

				$statement = $conexion->prepare('SELECT articulos.idarticulos,articulos.descripcion,articulos.cantidad,ubicacion.ubicacion,ocupado.ocupado FROM articulos INNER JOIN ubicacion ON articulos.ubicacion_idubicacion = ubicacion.idubicacion INNER JOIN ocupado ON articulos.ocupado_idocupado=ocupado.idocupado WHERE articulos.descripcion = :articulo');
				$statement ->execute(array(':articulo'=>$articulo));
				$resultado = $statement->fetch();
				print_r($resultado);

				$ubicacionMostrar=$resultado[3];
				$cantidadMostrar=$resultado[2];
				$descripcionMostrar=$resultado[1];
				
				if ($resultado[4]=="no") {
					$ocupadoMostrar = "No esta fuera de bodega";
				}else{
					$ocupadoMostrar= "Esta fuera de bodega";
				}



			}else{
				$valoresMostrar="si se crea"; 
				$statement = $conexion->prepare('SELECT articulos.idarticulos,articulos.descripcion,articulos.cantidad,ubicacion.ubicacion,ocupado.ocupado FROM articulos INNER JOIN ubicacion ON articulos.ubicacion_idubicacion = ubicacion.idubicacion INNER JOIN ocupado ON articulos.ocupado_idocupado=ocupado.idocupado WHERE articulos.descripcion = :articulo');
				$statement ->execute(array(':articulo'=>$articulo));
				$resultados = $statement->fetchAll();
				$contarResultados = count($resultados)-1;
				//echo "contar resultados ".$contarResultados;


				$descripcionMostrar=$resultados[0][1];


				foreach ($resultados as $resultado) {
					echo '<pre>';
					print_r($resultado);
					echo '</pre>';
				}

				for ($i=0; $i <=$contarResultados ; $i++) { 
					echo $holi=$resultados[$i][3]."<br> ";
				$ubicacionMostrar.=$holi;
				}

			}			
		}
	}
}


require'views/prestarart.view.php';

?>