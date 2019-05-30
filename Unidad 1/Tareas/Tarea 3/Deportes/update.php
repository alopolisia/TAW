<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Actualizar un Cliente</title>
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
                        <h2>Actualizar <b>Jugador</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="registros.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
            </div>
            <?php
            include("database.php");
            $clientes = new Database();
            $id = $_GET['id'];
            $sql = "SELECT * FROM futbol where id='$id'";

            $datos = $clientes->single_record($sql);

            if (isset($_POST) && !empty($_POST)) {
                $id = $clientes->sanitize($_POST['id']);
                $nombre = $clientes->sanitize($_POST['nombre']);
                $posicion = $clientes->sanitize($_POST['posicion']);
                $carrera = $clientes->sanitize($_POST['carrera']);
                $correo = $clientes->sanitize($_POST['correo']);

                $sql = "UPDATE futbol SET id='$id', nombre='$nombre', posicion='$posicion', carrera='$carrera', correo='$correo' WHERE id=$id";

                $res = $clientes->update($sql);
                if ($res) {
                    $message = "Datos actualizados con éxito";
                    $class = "alert alert-success";
                } else {
                    $message = "No se pudieron actualizar los datos";
                    $class = "alert alert-danger";
                }
                header('Location: update.php?id='.$id);

                ?>

                <div class="<?php echo $class ?>">
                    <?php echo $message ?>
                </div>

                <?php
            }

            ?>

            <div class="row">
                <form method="post">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Número de Dorso:</label>
                            <input type="text" name="id" id="id" class='form-control' maxlength="100" required value="<?php echo $datos['id'] ?>">
                        </div>

                        <div class="col-md-6">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required value="<?php echo $datos['nombre']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Posición:</label>
                            <select name="posicion" class="form-control">
                                <option value="delantero">Delantero</option>
                                <option value="centro">Centro</option>
                                <option value="defensa">Defensa</option>
                                <option value="portero">Portero</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Carrera:</label>
                            <select name="carrera" class="form-control">
                                <option value="ITI">ITI</option>
                                <option value="ISA">ISA</option>
                                <option value="IM">IM</option>
                                <option value="ITM">ITM</option>
                                <option value="PYMES">PYMES</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Correo electrónico:</label>
                            <input type="email" value="<?php echo $datos['correo']; ?>" name="correo" id="correo" class='form-control' maxlength="64" required>
                        </div>
                    </div>

                    <div class="col-md-12 pull-right">
                        <hr>
                        <button type="submit" class="btn btn-success">Actualizar datos</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
