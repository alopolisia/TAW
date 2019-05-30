<?php
    include("database.php");
    $clientes = new Database();
    $id = $_GET['id'];

    $sql = "DELETE FROM basquetbol WHERE id=$id";

    $res = $clientes->delete($sql);
    if ($res) {
        $message = "Datos eliminados con éxito";
        $class = "alert alert-success";
    } else {
        $message = "No se pudieron eliminar los datos";
        $class = "alert alert-danger";
    }
    header('Location: registros2.php');

?>
