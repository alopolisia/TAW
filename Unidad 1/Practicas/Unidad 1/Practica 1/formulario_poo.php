<html>
<head>
    <title>Formulario en PHP7</title>
</head>

<body>
<?php

//Clase de solicitud
class Solicitud{
    //Propiedades o Atributos
    public $name = "";
    public $nameErr = "";
    public $email = "";
    public $emailErr = "";
    public $gender = "";
    public $genderErr = "";
    public $comment = "";
    public $commentErr = "";
    public $website = "";
    public $websiteErr = "";

    //Método para imprimir las propiedades del objeto
    public function imprimir(){
        echo "<h2>Your Input:</h2>";
        echo $this -> name;
        echo "<br>";
        echo $this -> email;
        echo "<br>";
        echo $this -> website;
        echo "<br>";
        echo $this -> comment;
        echo "<br>";
        echo $this -> gender;
    }
}

//Función para limpiar el dato de entrada
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Se crea el objeto de la clase Solicitud
$solicitud1 = new Solicitud();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $solicitud1-> nameErr = "Name is required";
    } else {
        $solicitud1-> name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$solicitud1-> name)) {
            $solicitud1-> nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $solicitud1-> emailErr = "Email is required";
    } else {
        $solicitud1-> email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($solicitud1-> email, FILTER_VALIDATE_EMAIL)) {
            $solicitud1-> emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["website"])) {
        $solicitud1-> website = "";
    } else {
        $solicitud1-> website = test_input($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$solicitud1-> website)) {
            $solicitud1-> websiteErr = "Invalid URL";
        }
    }
    if (empty($_POST["comment"])) {
        $solicitud1-> comment = "";
    } else {
        $solicitud1-> comment = test_input($_POST["comment"]);
    }
    if (empty($_POST["gender"])) {
        $solicitud1-> genderErr = "Gender is required";
    } else {
        $solicitud1-> gender = test_input($_POST["gender"]);
    }

}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $solicitud1-> name;?>">
    <span class="error">* <?php echo $solicitud1-> nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $solicitud1-> email;?>">
    <span class="error">* <?php echo $solicitud1-> emailErr;?></span>
    <br><br>
    Website: <input type="text" name="website" value="<?php echo $solicitud1-> website;?>">
    <span class="error"><?php echo $solicitud1-> websiteErr;?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $solicitud1-> comment;?></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($solicitud1-> gender) && $solicitud1-> gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($solicitud1-> gender) && $solicitud1-> gender=="male") echo "checked";?> value="male">Male
    <span class="error">* <?php echo $solicitud1-> genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
    //Imprimir las propiedades
    $solicitud1 -> imprimir();
?>

<ul>
    <li><a href="#">Volver al Inicio</a></li>
</ul>
</body>
</html>
