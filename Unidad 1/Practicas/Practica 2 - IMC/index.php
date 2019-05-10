<?php
    //Incluir la clase
    include "persona.php";

    //Instanciar la clase
    $persona = new Persona();

    //Función para limpiar el dato de entrada
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Validar las entradas
    $persona->validar($conexion);

    //Limpiar las propiedades
    $persona->limpiar();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calcular IMC</title>
  </head>
  <body>
    <h2>Cálculo de IMC</h2>
    <p><span class="error">* Campos Necesarios</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Edad: <input type="text" name="edad" value="<?php echo $persona-> edad;?>">
        <span class="error">* <?php echo $persona-> edadErr;?></span>
        <br><br>

        Peso: <input type="text" name="peso" value="<?php echo $persona-> peso;?>">
        <span class="error">* <?php echo $persona-> pesoErr;?></span>
        <br><br>

        Altura: <input type="text" name="altura" value="<?php echo $persona-> altura;?>">
        <span class="error">* <?php echo $persona-> alturaErr;?></span>
        <br><br>

        <input type="submit" name="submit" value="Calcular">
    </form>

  </body>
</html>
