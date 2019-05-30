<?php

require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "controllers/controller.php";

$mvc = new MvcController();

session_start();
if (!isset($_SESSION['validar'])) {
    $_SESSION['validar'] = false;
}

$mvc -> pagina();

?>