<?php

    //Clase para conectarnos a la base de datos
    class Database{

        //Propiedades de la clase
        private $con;
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "t3";

        //Constructor
        function __construct(){
            $this->connect_db();
        }

        //Método de conexión a la Base de Datos
        public function connect_db(){
            $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

            //Validar la conexión
            if (mysqli_connect_error()) {
                die("Conexión a la base de datos fallida :(" . mysqli_connect_error());
            }

            try {
                $this->con = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
                // set the PDO error mode to exception
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexión Exitosa!";
            } catch(PDOException $e) {
                echo "Conexión fallida: " . $e->getMessage();
            }

        }

        //Funcion para limpiar datos
        public function sanitize($var){
            $return = htmlspecialchars($var);
            return $return;
        }

        //Funcion para insertar en una tabla
        public function create($sql){
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt;
            if ($res) {
                return true;
            } else {
                return false;
            }

        }

        //Funcion para consulta de toda la tabla
        public function read($sql){
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt;
            return $res;
        }

        //Funcion para conslta por id
        public function single_record($sql){
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt-> fetch();
            return $res;
        }

        //Funcion para actualizar en PDO
        public function update($sql){
            $stmt = $this->con->prepare($sql);
            $stmt->execute();

            $res = $stmt;
            if ($res) {
                return true;
            } else {
                return false;
            }
        }

        //Funcion para borrar en PDO
        public function delete($sql){
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $res = $stmt;
            if ($res) {
                return true;
            } else {
                return false;
            }
        }

        //Funcion para saber si el usaurio existe en la base de datos
        public function valida_usuario_bd($usuario, $contra){
            //Consulta SQL que buscará en la base de datos el usaurio que coincida
		    $sql = "SELECT id FROM usuarios WHERE usuario='$usuario' AND contra='$contra' LIMIT 1";

            //Prepara los statement
            $stmt = $this->con->prepare($sql);

            //Ejecutar la consulta
            $stmt->execute(array($usuario,$contra));

            //Si existe mas de uno, quiere decir que si coincidio, por lo tanto retornar true, de lo contrario false
            if($stmt->rowCount() >= 1) {
                return true;
            } else {
                return false;
            }

    	}
    }

?>
