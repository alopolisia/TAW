<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>CRUD a Base de Datos usando POO</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Rouand|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Agregar <b>Producto</b></h2>
                    </div>

                </div>
            </div>

            <div class="row">
                <form method="post">
                    <div class="col-md-6">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" id="nombres" class='form-control' maxlength="100" required >
                    </div>
                    <div class="col-md-6">
                        <label>Precio:</label>
                        <input type="text" name="precio" id="apellidos" class='form-control' maxlength="100" required>
                    </div>

                    <div class="col-md-12 pull-right">
                        <hr>
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div>

            <?php

            $vistaNuevoProducto = new MvcController();
            $vistaNuevoProducto -> registroNuevoProductoController();
            ?>

        </div>
    </div>
</body>
</html>
