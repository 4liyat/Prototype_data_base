<!-- ActInt2_Aguilar-Arturo -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin logging</title>
</head>
<body>
    <div class="titulo">
        <h1>Administrador de usuarios</h1>
        <h2>Por favor ingrese sus datos</h2>
    </div>
    <div class="formulario">
        <form method="post" action="">
            <label for="user">Usuario:</label>
            <input type="text" name="user">
            <label for="password">Contraseña:</label>
            <input type="text" name="password"><br>
            <button class="boton" type="submit" value="Enviar">Enviar</button>
        </form>
    </div>
    <?php
        $usuarios = [
            "manguito" => "100",
            "admin" => "admin",
            "root" => "root"
        ];

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $user = $_POST["user"];
            $password = $_POST["password"];
            
            if (isset($usuarios[$user]) && $usuarios[$user] === $password){
                echo "<div class='entrada'>
                <h3>¡Bienvenido! Has ingresado el usuario correcto</h3>
                </div>";
                header( "refresh:1; url=temp_users.php" );
                //header("Location: temp_users.php");
            }
            else{
                echo "<div class='error'>
                <h3>por favor revisa tus datos, estan incorrectos</h3>
                </div>";
            }
        }
    ?>
</body>
</html>