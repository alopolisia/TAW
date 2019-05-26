<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=t4","root","");
		return $link;

	}

}

?>