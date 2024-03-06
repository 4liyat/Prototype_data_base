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
    <title>Temp_users creation</title>
</head>
<body>
    <?php
    //Esto hace que la cookie guarde la hora en que recarga
    setcookie("sesion_time", date("Y-m-d H:i:s"), time() + 60*60*24*7);
    ?>
    <div class="titulo">
        <h2>Creacion de usuarios temporales
            <br>Completa los datos
        </h2>
    </div>
    <div class="formulario">
        <form method="post" action="validar.php">
            <label for="username">Nombre usuario:</label><input type="text" name="username">
            <label for="mail">e-mail:</label><input type="text" name="mail">
            <label for="password">Contraseña:</label>
            <input type="password" name="password">
            <label for="birthday">Cumpleaños:</label>
            <input type="date" id="birthday" name="birthday">
            <label for="colores">Selecciona tus colores favoritos:<br>(usa 'Ctrl' para seleccionar mas de 1)</label>
            <select name="colores[]" id="colores" multiple>
                <option value="rojo">Rojo</option>
                <option value="azul">Azul</option>
                <option value="verde">Verde</option>
                <option value="amarillo">Amarillo</option>
                <option value="blanco">Blanco</option>
                <option value="negro">Negro</option>
            </select>
            <button class="boton" type="submit" value="Enviar">Enviar</button>
        </form>
    </div>
</body>
</html>