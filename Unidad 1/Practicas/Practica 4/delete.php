<?php
    include("database.php");
    $clientes = new Database();
    $id = $_GET['id'];

    $res = $clientes->delete($id);
    if ($res) {
        $message = "Datos eliminados con éxito";
        $class = "alert alert-success";
    } else {
        $message = "No se pudieron eliminar los datos";
        $class = "alert alert-danger";
    }
    header('Location: registros.php');

?>
