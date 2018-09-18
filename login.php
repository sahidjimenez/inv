
<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: inicio.php');
}

$errores='';

if ($_SERVER['REQUEST_METHOD']== 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
	$password = $_POST['password'];

	//<----------------------------------------------------------------------------------------------------
	//$password = hash('sha512', $password);
	//<----------------------------------------------------------------------------------------------------


	try{
			$conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
	}catch  (PDOException $e){
			echo "Error: ". $e->getMessage();			
	}

	$statement = $conexion->prepare('

		SELECT * FROM usuarios WHERE nombre = :usuario AND contrasena = :password'
	);

	$statement->execute(array(
		':usuario' => $usuario,
		':password'=> $password
	));

	$resultado = $statement->fetch();
	if ($resultado!== false) {
		$_SESSION['usuario'] = $usuario;
		header('Location: inicio.php');
	}else{
		$errores .='<li>Datos Incorrectos </li>';

	}

	
	
}

	require'views/login.view.php';
 ?>