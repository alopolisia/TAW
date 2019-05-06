<?php
    //Funciones sin propiedades
    function saludo(){
        echo "Hola soy yu <br>";
    }

    saludo();

    //funcion con parametro
    function despedida ($adios){
        echo $adios."<br>";
    }
    despedida("Adios, me voy!");

    //Funcion con retorno
    function retorno($retornar){
        return $retornar;
    }
    echo retorno("Retorno de una funcion");
?>
