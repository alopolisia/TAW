<?php

require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "controllers/controller.php";

$mvc = new MvcController();

session_start();

if (isset($_SESSION['registrar'])) {
    // code...
    if ($_SESSION["registrar"]) {
        // code...
        $_SESSION["registrar"] = false;
        unset($_SESSION["registrar"]);
        $mvc -> pagina1();
    }

} else {
    if (isset($_SESSION["validar"])) {
        // code...
        if($_SESSION["validar"]){
            $mvc -> pagina2();
        }
    } else {
        $mvc -> pagina();
    }
}

?>
