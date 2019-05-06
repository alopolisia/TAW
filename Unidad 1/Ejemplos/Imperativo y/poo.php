<?php
    //Trabajar con POO:

    //Clase

    //Una clase es un modelo que se utiliza para crear objetos que ocmparten un
    //mismo comportado, estado o identidad.

    class Automovil{
        //Propiedades
        //Son las caracteristicas que pueden tener un objeto.
        public $marca;
        public $modelo;

        //Metodos
        //Es el algoritmo asociado a un objeto que indica la capacidad de lo que
        //este puede hacer. La única diferencia entre método y función es que
        //llamamos , método a las funciones de una clase (En POO), mientras que
        //llamamos funciones a los algoritmos de la programación estructurada.

        //Funcion que obtiene el automovil e imprime sus propiedades
        public function mostrar(){
            echo "<p> Hola soy un $this->marca, modelo $this->modelo</p><br>";
        }

    }

    //Objetos
    //Una entidad provista de métodos o mensajes a los cuales responde con
    //valores concretos
    $a = new Automovil();
    $a -> marca = "Toyota";
    $a -> modelo = "Corolla";
    $a -> mostrar();

    $b = new Automovil();
    $b -> marca = "Chevrolet";
    $b -> modelo = "Malibu";
    $b -> mostrar();

    $c = new Automovil();
    $c -> marca = "Nissan";
    $c -> modelo = "Tsuru";
    $c -> mostrar();
    
    //Principios de la POO que se cumplen en este ejemplo:

    //1.- Abstracción
    //Nuevos tipos de datos, el que se quiera, se crea.

    //2.- Encapsulamiento
    //Organiza el código en grupos lógicos.

    //3- Ocultamiento
    //Oculta detalles de implementación y poner solo lo que sea necesario para
    //el resto del sistema.



?>
