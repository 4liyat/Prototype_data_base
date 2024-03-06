<!-- ActInt2_Aguilar-Arturo -->
<?php
session_start();

//identificando la informacion del usuario
if (isset($_POST["username"]) && isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["birthday"]) && isset($_POST["colores"])) {
    $usuario = $_POST["username"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $birthday = $_POST["birthday"];
    $colores_seleccionados = $_POST["colores"];
}
else{
    header("Location: temp_users.php");
}
$tiempo = $_COOKIE["sesion_time"];

// Verificar si la variable de sesión para usuarios existe
if(!isset($_SESSION["usuarios"])) {
    $_SESSION["usuarios"] = array();
}

//creando array para cargar los datos del usuario
$datos_usuario = array("correo" => $mail, "contra" => $password, "cumple" => $birthday, "colores" => $colores_seleccionados, "time" => $tiempo);

// Agregar los datos del usuario al arreglo de usuarios en la variable de sesión
$_SESSION["usuarios"][$usuario] = $datos_usuario;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Temp_users list</title>
</head>
<body>
    <div class="titulo">
        <h2>Listado de todos los usuarios temporales</h2>
    </div>
    <div class="resultados">
        <?php
        foreach($_SESSION["usuarios"] as $usuario => $datos_guardados) {
            //convertir el tiempo a horas, minutos y segundos
            $segundos = time() - strtotime($datos_guardados['time']);
            $horas = (int) ($segundos / (60*60));
            $segundos = $segundos % (60*60);
            $minutos = (int) ($segundos / 60);
            $segundos = $segundos % 60;

            // estoy testeando que cada usuario se vea en un dif diferente
            echo "<div class='single_user'>";
            echo "<b>Usuario:</b> $usuario <br>";
            echo "<b>Correo:</b> " . $datos_guardados["correo"] . "<br>";
            echo "<b>Contraseña:</b> " . $datos_guardados["contra"] . "<br>";
            echo "<b>Cumpleaños:</b> " . $datos_guardados["cumple"] . "<br>";
            echo "<b>Colores seleccionados:</b> " . implode(",", $datos_guardados["colores"]) . "<br>";
            echo "<b>Tiempo online:</b> $horas horas, $minutos minutos, $segundos segundos  <br>";
            echo "</div>";
            echo "<br>";
        }
        ?>
    </div>
    <div class="navigation">
        <nav id="nav">
            <ul>
                <li><a href="temp_users.php">Nuevo usuario</a></li>
                <li><a href="cargar_archivos.php">Cargar archivos</a></li>
                <li><a href="close_temp_users.php">Cerrar sesiones temporales</a></li>
                <li><a href="close.php">Logout General</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>