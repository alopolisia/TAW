<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=p5","root","");
		return $link;

	}

}

?>
