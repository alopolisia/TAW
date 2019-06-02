<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=p7","alopolisia","sushi123");
		return $link;

	}

}

?>
