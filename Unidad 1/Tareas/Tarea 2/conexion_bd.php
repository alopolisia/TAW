<?php
	$bd ='registro';
	$servidor='localhost';
	$usuario='root';
	$contrasena='';

	//creamos una conexión a la base de datos
	$conexion=mysqli_connect($servidor, $usuario,$contrasena,$bd);


	// checamos la conexion
	if(!$conexion){
		die('Conexion a la base de datos ' . $bd . ' falló: ' . mysqli_connect_error());
	}

	echo "Conectado a la base de datos $bd <br/>";

	function insertar($query){
		mysqli_query($conexion,$query) or die('Error al ejecutar la insersión :v');
	}

 ?>
