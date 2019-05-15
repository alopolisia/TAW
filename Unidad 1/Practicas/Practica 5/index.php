<?php
    /*
    El index muestra la salida de las vistas al ususario, tambien a traves de
    el enviaremos las distintas acciones que el usuario envíe al controlador
    */

    //require_once establece el código del archivo a utilizar

    require_once "Controllers/controller.php";
    require_once "Models/model.php";

    $mvc = new MvcController();
    $mvc->plantilla();
?>
