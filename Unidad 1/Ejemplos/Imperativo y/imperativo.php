<?php
    //Codigo imperativo o Spaguetti
    $automovil1 = (object)["marca" => "Toyota", "modelo" => "Corolla"];
    $automovil2 = (object)["marca" => "Chevrolet", "modelo" => "Malibu"];
    $automovil3 = (object)["marca" => "Nissan", "modelo" => "Tsuru"];

    //Funcion que obtiene el automovil e imprime sus propiedades
    function mostrar($automovil){
        echo "<p> Hola soy un $automovil->marca, modelo $automovil->modelo</p><br>";
    }

    //Ejecutar la funcion ingresando como parametros las 3 variables de automovil
    mostrar($automovil1);
    mostrar($automovil2);
    mostrar($automovil3);

?>
