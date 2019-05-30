<?php
  //Definir clase principal
  require 'conexion_bd.php';

  class Persona {
    //Propiedades
    public $edad = "";
    public $edadErr = "";
    public $peso = "";
    public $pesoErr = "";
    public $altura = "";
    public $alturaErr = "";
    public $cont = 0;
    public $sql = "";

    //Obtener valores
    //Getter
    //Edad:
    public function getEdad(){
        return $this->edad;
    }

    //Peso:
    public function getPeso(){
        return $this->peso;
    }

    //Altura:
    public function getAltura(){
        return $this->altura;
    }

    //Calculos
    //Setters:
    //Edad:
    public function setEdad($valor){
        $this->edad = $valor;
    }

    //Peso
    public function setPeso($valor){
        $this->peso = $valor;
    }

    //Altura
    public function setAltura($valor){
        $this->altura = $valor;
    }

    //Calcular el IMC accediendo a las propiedades
    public function calcularIMC(){
      return $this->peso / ($this->altura * $this-> $altura);
    }

    //Calcular el IMC accediendo mediante los métodos get
    public function calcularIMC2(){
      return $this->getPeso() / ($this->getAltura() * $this-> getAltura());
    }

    //Método para validar los datos de entrada
    public function validar($c){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["edad"])) {
                $this-> edadErr = "Ingrese su edad";
            } else {
                $this-> setEdad(test_input($_POST["edad"]));
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9]*$/",$this-> getEdad())) {
                    $this-> edadErr = "Solamente esta permitido números";
                } else {
                    $this-> cont++;
                }
            }

            if (empty($_POST["peso"])) {
                $this-> pesoErr = "Ingrese su peso";
            } else {
                $this-> setPeso(test_input($_POST["peso"]));
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9]*$/",$this-> getPeso())) {
                    $this-> pesoErr = "Solamente esta permitido números";
                } else {
                    $this-> cont++;
                }
            }

            if (empty($_POST["altura"])) {
                $this-> alturaErr = "Ingrese su altura";
            } else {
                $this-> setAltura(test_input($_POST["altura"]));
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9 .]*$/",$this-> getAltura())) {
                    $this-> alturaErr = "Solamente esta permitido números";
                } else {
                    $this-> cont++;
                }
            }

            //Si cumple la condicion entonces se registra en la base de datos
            if ($this-> cont == 3) {
              //Imprimir resultado
              echo "<br> Edad:" . $this->getEdad();
              echo "<br> Altura:" . $this->getAltura();
              echo "<br> Peso:" . $this->getPeso();
              echo "<br> IMC:" . $this->calcularIMC2();

              $imc = $this->calcularIMC2();

              $sql = "INSERT INTO persona (edad, peso, altura, imc)
                          VALUES ('".$this->edad ."', '".$this->peso."', '".$this->altura."', '".$imc."')";

              registrar($c,$sql);
            }

        }
    }

    //Funcion para limpiar las cajas de texto
    public function limpiar(){
        $this-> edad = "";
        $this-> peso = "";
        $this-> altura = "";
    }

  }


?>
