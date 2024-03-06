<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Upload Files</title>
</head>
<body>
    <div class="navigation">
        <nav id="nav">
            <ul>
                <li><a href="temp_users.php">Nuevo usuario</a></li>
                <li><a href="close.php">Logout General</a></li>
            </ul>
        </nav>
    </div>
    <div class="titulo">
        <h2>Archivos para usuarios temporales</h2>
    </div>
    <div class="formulario">
        <form method="post" action="" enctype="multipart/form-data">
            <label for="archivo">Selecciona un archivo</label>
            <input type="file" name="archivo">
            <button type="submit" name="upload">Subir archivo</button>
        </form>
    </div>
    <div class="separador"> </div>
    <?php
    //pruebas para poder guardar un archivo desde un formulario
    $message = "";
    $error = "";
    $uploads_dir = "files";
    
    //comprobacion que venga algo del formulario
    if (isset($_POST["upload"])){
        $error = $_FILES["archivo"]["error"];

        //verificamos si existe algun error
        if ($error == UPLOAD_ERR_OK){
            $tmp_name = $_FILES["archivo"]["tmp_name"];
            $name = basename($_FILES["archivo"]["name"]);

            if (move_uploaded_file($tmp_name, "$uploads_dir/$name")){
                $message = basename($_FILES["archivo"]["name"]) . "<br>" . "subido correctamente";
                
                echo "<div class='upload_result'>";
                echo $message;
                echo "</div>";
            }
            else {
                $error = "Ocurrio un error al subir el archivo, intente de nuevo";
                echo $error;
            }
        }
        else {
            $error = "Ocurrio un error al subir el archivo, intente de nuevo";
            echo $error;
        }
    }
    echo "archivos actualmente en el directorio <br>";
    echo "<div class='ordenacion'>";
    //mostramos todos los archivos actuales en la carpeta
    $directorio = "./files";
    $files = scandir($directorio);

    foreach ($files as $item) {
        if ($item !== "." && $item !== "..") { // Ignora las entradas "." y ".."
            $imagePath = "$directorio/$item";

            echo "<div class='item'>";
            echo "<img src='$imagePath' alt='$item'>";
            echo "<a href='$imagePath'>Ver imagen</a>";
            echo "<a href='?delete=$item'>Eliminar imagen</a>"; 
            echo "</div>";
        }
    }
    echo"</div>";

    // Proceso para eliminar imagenes
    if (isset($_GET["delete"])) {
        $imagen_delete = $_GET["delete"];
        $ubicacion_archivo = "$directorio/$imagen_delete";

        if (file_exists($ubicacion_archivo)) {
            unlink($ubicacion_archivo);
            header("Location: {$_SERVER['PHP_SELF']}");
        }
    }
    ?>
</body>
</html>