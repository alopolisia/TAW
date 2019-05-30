<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=t4","alopolisia","sushi123");
		return $link;

	}

}

?>
