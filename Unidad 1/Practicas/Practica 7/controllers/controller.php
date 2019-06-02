<?php
ob_start();
class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"],
								      "email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$sql = "SELECT usuario, password FROM usuarios WHERE usuario =:usuario";
			$execute = [':usuario' => $_POST["usuarioIngreso"]];

			$respuesta = Datos::selectUno($sql, $execute);

			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;
				$_SESSION["tipo"] = 1;

				if ($_SESSION["tipo"] == 1) {
					header("location:index.php?action=alumnos");
				} else {
					header("location:index.php?action=reservaciones");
				}

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["tipo"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>

			 <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                      "email"=>$_POST["emailEditar"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}


	#AGREGAR UNA NUEVA HABITACIÓN
	#------------------------------------
	public function agregarHabitacionController(){

		if(isset($_POST["agregar"])){
			$name = $_FILES['file']['name'];
	        $target_dir = "upload/";
	        $target_file = $target_dir . basename($_FILES["file"]["name"]);

	        // Select file type
	        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	        // Valid file extensions
	        $extensions_arr = array("jpg","jpeg","png","gif");

	        // Check extension
	        if( in_array($imageFileType,$extensions_arr) ){
	            
	            // Convert to base64 
	            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
	            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
	            
	            // Upload file
	            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

	        }

	        //SQL para el insert
			$sql = "INSERT INTO habitaciones (tipo, precio, nombre) VALUES (:tipo,:precio,:nombre)";
			$execute = [':tipo' => $_POST["tipo"], ':precio' => $_POST["precio"], ':nombre' => $name];

			//Llamamos al modelo
			$respuesta = Datos::insert_update_delete($sql, $execute);

			//Aqui habia un if pero lo quite :v
			header("location:index.php?action=habitaciones");

		}

	}

	#VISTA DE HABITACIONES
	#------------------------------------

	public function vistaHabitacionesController(){

		$sql = "SELECT * FROM habitaciones";

		$respuesta = Datos::selectAll($sql);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $habitacion){
		echo'<tr>
				<td>'.$habitacion["numero"].'</td>
				<td>'.$habitacion["tipo"].'</td>
				<td>'.$habitacion["precio"].'</td>
				<td>'.'<img src="upload/'.$habitacion["nombre"].'" width="100" height="100">'.'</td>
				<td><a href="index.php?action=editar_habitacion&numero='.$habitacion["numero"].'"><button>Editar</button></a></td>
				<td><a onclick="return confirmation()" href="index.php?action=borrar_habitacion&numero='.$habitacion["numero"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	public function vistaHabitaciones2Controller(){

		$sql = "SELECT * FROM habitaciones";

		$respuesta = Datos::selectAll($sql);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $habitacion){
		echo'<tr>
				<td>'.$habitacion["numero"].'</td>
				<td>'.$habitacion["tipo"].'</td>
				<td>'.$habitacion["precio"].'</td>
				<td>'.'<img src="upload/'.$habitacion["nombre"].'" width="100" height="100">'.'</td>
			</tr>';

		}

	}

	#EDITAR HABITACION
	#------------------------------------

	public function editarHabitacionController(){

		$sql = "SELECT * FROM habitaciones WHERE numero = :numero";
		$execute = [':numero' => $_GET["numero"]];

		$respuesta = Datos::selectUno($sql, $execute);

		return $respuesta;

	}

	#ACTUALIZAR HABITACION
	#------------------------------------
	public function actualizarHabitacionController(){

		if(isset($_POST["actualizar"])){
			$name = $_FILES['file']['name'];
	        $target_dir = "upload/";
	        $target_file = $target_dir . basename($_FILES["file"]["name"]);

	        // Select file type
	        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	        // Valid file extensions
	        $extensions_arr = array("jpg","jpeg","png","gif");

	        // Check extension
	        if( in_array($imageFileType,$extensions_arr) ){
	            
	            // Convert to base64 
	            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
	            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
	            
	            // Upload file
	            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

	        }

	        //SQL para el insert
			$sql = "UPDATE habitaciones SET tipo = :tipo, precio = :precio, nombre = :nombre WHERE numero = :numero";
			$execute = [':tipo' => $_POST["tipo"], ':precio' => $_POST["precio"], ':nombre' => $name, ':numero' => $_POST["numero"]];

			//Llamamos al modelo
			$respuesta = Datos::insert_update_delete($sql, $execute);

			if($respuesta == "success"){

				header("location:index.php?action=habitaciones");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR HABITACION
	#------------------------------------
	public function borrarHabitacionController(){
		if(isset($_GET["numero"])){

			$sql = "DELETE FROM habitaciones WHERE numero = :numero";
			$execute = [':numero' => $_GET["numero"]];

			$respuesta = Datos::insert_update_delete($sql, $execute);

			if($respuesta == "success"){
				header("location:index.php?action=habitaciones");
			}
		}
	}

	#AGREGAR UN NUEVO CLIENTE
	#------------------------------------
	public function agregarClienteController(){

		if(isset($_POST["agregar"])){

	        //SQL para el insert
			$sql = "INSERT INTO clientes (nombre, fecha_naci, correo, telefono, tipo) VALUES (:nombre, :fecha_naci, :correo, :telefono, :tipo)";
			$execute = [':nombre' => $_POST["nombre"], ':fecha_naci' => $_POST["fecha_naci"], ':correo' => $_POST["correo"], ':telefono' => $_POST["telefono"], ':tipo' => $_POST["tipo"]];

			//Llamamos al modelo
			$respuesta = Datos::insert_update_delete($sql, $execute);

			//Aqui habia un if pero lo quite :v
			header("location:index.php?action=clientes");

		}

	}

	#VISTA DE CLIENTES
	#------------------------------------

	public function vistaClientesController(){

		$sql = "SELECT * FROM clientes";

		$respuesta = Datos::selectAll($sql);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $cliente){
		echo'<tr>
				<td>'.$cliente["id"].'</td>
				<td>'.$cliente["nombre"].'</td>
				<td>'.$cliente["fecha_naci"].'</td>
				<td>'.$cliente["correo"].'</td>
				<td>'.$cliente["telefono"].'</td>
				<td>'.$cliente["tipo"].'</td>
				<td><a href="index.php?action=editar_cliente&id='.$cliente["id"].'"><button>Editar</button></a></td>
				<td><a onclick="return confirmation()" href="index.php?action=borrar_cliente&id='.$cliente["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR CLIENTE
	#------------------------------------

	public function editarClienteController(){

		$sql = "SELECT * FROM clientes WHERE id = :id";
		$execute = [':id' => $_GET["id"]];

		$respuesta = Datos::selectUno($sql, $execute);

		return $respuesta;

	}

	#ACTUALIZAR HABITACION
	#------------------------------------
	public function actualizarClienteController(){

		if(isset($_POST["actualizar"])){

	        //SQL para el insert
			$sql = "UPDATE clientes SET nombre = :nombre, fecha_naci = :fecha_naci, correo = :correo, telefono = :telefono, tipo = :tipo WHERE id = :id";
			$execute = [':nombre' => $_POST["nombre"], ':fecha_naci' => $_POST["fecha_naci"], ':correo' => $_POST["correo"], ':telefono' => $_POST["telefono"], ':tipo' => $_POST["tipo"], ':id' => $_POST["id"]];

			//Llamamos al modelo
			$respuesta = Datos::insert_update_delete($sql, $execute);

			if($respuesta == "success"){

				header("location:index.php?action=clientes");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR HABITACION
	#------------------------------------
	public function borrarClienteController(){
		if(isset($_GET["id"])){

			$sql = "DELETE FROM clientes WHERE id = :id";
			$execute = [':id' => $_GET["id"]];

			$respuesta = Datos::insert_update_delete($sql, $execute);

			if($respuesta == "success"){
				header("location:index.php?action=clientes");
			}
		}
	}

	#CARGAR LOS ID DE CLIENTE
	#------------------------------------

	public function idClienteController(){

		$sql = "SELECT id FROM clientes";

		$respuesta = Datos::selectAll($sql);

		foreach($respuesta as $row => $id){
			echo'<option value='.$id["id"].'>'.$id["id"].'</option>';
		}

	}

	#CARGAR LOS ID DE HABITACION
	#------------------------------------

	public function idHabitacionController(){

		$sql = "SELECT numero FROM habitaciones";

		$respuesta = Datos::selectAll($sql);

		foreach($respuesta as $row => $numero){
			echo'<option value='.$numero["numero"].'>'.$numero["numero"].'</option>';
		}

	}

	#AGREGAR UNA NUEVA RESERVACION
	#------------------------------------
	public function agregarReservacionController(){

		if(isset($_POST["reservar"])){

	        //SQL para el insert
			$sql = "INSERT INTO reservaciones (id_cliente, id_habitacion, fecha, dias) VALUES (:id_cliente, :id_habitacion, :fecha, :dias)";
			$execute = [':id_cliente' => $_POST["id_cliente"], ':id_habitacion' => $_POST["id_habitacion"], ':fecha' => $_POST["fecha"], ':dias' => $_POST["dias"]];

			//Llamamos al modelo
			$respuesta = Datos::insert_update_delete($sql, $execute);

			//Aqui habia un if pero lo quite :v
			header("location:index.php?action=reservaciones");

		}

	}

	#VISTA DE RESERVACION
	#------------------------------------

	public function vistaReservacionesController(){

		$sql = "SELECT r.id, c.nombre, c.correo, c.telefono, c.tipo as tipo_cliente, h.numero, h.tipo as tipo_habitacion, h.precio, r.fecha, r.dias from clientes c, habitaciones h JOIN reservaciones r WHERE c.id = r.id_cliente AND h.numero = r.id_habitacion";

		$respuesta = Datos::selectAll($sql);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $reservacion){
		echo'<tr>
				<td>'.$reservacion["id"].'</td>
				<td>'.$reservacion["nombre"].'</td>
				<td>'.$reservacion["correo"].'</td>
				<td>'.$reservacion["telefono"].'</td>
				<td>'.$reservacion["tipo_cliente"].'</td>
				<td>'.$reservacion["numero"].'</td>
				<td>'.$reservacion["tipo_habitacion"].'</td>
				<td>'.$reservacion["precio"].'</td>
				<td>'.$reservacion["fecha"].'</td>
				<td>'.$reservacion["dias"].'</td>
				<td><a href="index.php?action=editar_reservacion&id='.$reservacion["id"].'"><button>Editar</button></a></td>
				<td><a onclick="return confirmation()" href="index.php?action=borrar_reservacion&id='.$reservacion["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR RESERVACION
	#------------------------------------

	public function editarReservacionController(){

		$sql = "SELECT * FROM reservaciones WHERE id = :id";
		$execute = [':id' => $_GET["id"]];

		$respuesta = Datos::selectUno($sql, $execute);

		return $respuesta;

	}

	#ACTUALIZAR RESERVACION
	#------------------------------------
	public function actualizarReservacionController(){

		if(isset($_POST["actualizar"])){

	        //SQL para el insert
			$sql = "UPDATE reservaciones SET id_cliente = :id_cliente, id_habitacion = :id_habitacion, fecha = :fecha, dias = :dias WHERE id = :id";
			$execute = [':id_cliente' => $_POST["id_cliente"], ':id_habitacion' => $_POST["id_habitacion"], ':fecha' => $_POST["fecha"], ':dias' => $_POST["dias"], ':id' => $_POST["id"]];

			//Llamamos al modelo
			$respuesta = Datos::insert_update_delete($sql, $execute);

			if($respuesta == "success"){

				header("location:index.php?action=reservaciones");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR CLIENTE
	#------------------------------------
	public function borrarReservacionController(){
		if(isset($_GET["id"])){

			$sql = "DELETE FROM reservaciones WHERE id = :id";
			$execute = [':id' => $_GET["id"]];

			$respuesta = Datos::insert_update_delete($sql, $execute);

			if($respuesta == "success"){
				header("location:index.php?action=reservaciones");
			}
		}
	}

	#VISTA DE GANANCIA
	#------------------------------------

	public function vistaGananciaController(){

		if (isset($_POST["buscar"])) {
			$sql = "SELECT r.fecha, r.dias, h.precio FROM reservaciones r JOIN habitaciones h WHERE month(r.fecha) = ".$_POST["mes"]." and r.id_habitacion = h.numero ";

			$respuesta = Datos::selectAll($sql);

			#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

			$total = 0;

			foreach($respuesta as $row => $ganancia){
				$subtotal = $ganancia["dias"] * $ganancia["precio"];
				echo'<tr>
						<td>'.$ganancia["fecha"].'</td>
						<td>'.$ganancia["dias"].'</td>
						<td>'.$ganancia["precio"].'</td>
						<td>'.$subtotal.'</td>
					</tr>';
				$total = $total + $subtotal;

			}

			return $total;
		}


	}

}

?>