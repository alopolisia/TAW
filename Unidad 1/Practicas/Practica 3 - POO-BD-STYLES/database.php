<?php

    //Clase para conectarnos a la base de datos
    class Database{

        //Propiedades de la clase
        private $con;
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "tuto";

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
        }

        public function sanitize($var){
            $return = mysqli_real_escape_string($this->con, $var);
            return $return;
        }

        public function create($nombres, $apellidos, $telefono, $direccion, $correo_electronico){
            $sql = "INSERT INTO `clientes` (nombres, apellidos, telefono, direccion, correo_electronico) VALUES ('$nombres', '$apellidos', '$telefono', '$direccion', '$correo_electronico')";
            $res = mysqli_query($this->con, $sql);
            if ($res) {
                return true;
            } else {
                return false;
            }

        }

        public function read(){
            $sql = "SELECT * FROM clientes";
            $res = mysqli_query($this->con, $sql);
            return $res;
        }

        public function single_record($id){
            $sql = "SELECT * FROM clientes where id='$id'";
            $res = mysqli_query($this->con, $sql);
            $return = mysqli_fetch_object($res);
            return $return;
        }

        public function update($nombres, $apellidos, $telefono, $direccion, $correo_electronico, $id){
            $sql = "UPDATE clientes SET nombres='$nombres', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', correo_electronico='$correo_electronico' WHERE id=$id";
            $res = mysqli_query($this->con, $sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }

        public function delete($id){
            $sql = "DELETE FROM clientes WHERE id=$id";
            $res = mysqli_query($this->con, $sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }
    }

?>
