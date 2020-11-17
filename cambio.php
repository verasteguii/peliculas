<html>
    <head>
        <title>Consulta API</title>
    </head>
    <body>
    <center>
    <img src="fondm.jpg" style="width:1340px;height:150px;">
        <form action="http://localhost/api_consultas/cambio.php" method="post">
            Id de Pelicula:<input name="id" type="number"><br>
            Nombre:<input name="nombre" type="text"><br>
            Genero:<input name="genero" type="text"><br>
            Puntuacion:<input name="puntuacion" type="number"><br>
            <input type="submit" value="Cambio">
        </form>
    </center>
    </body>   
        </form>
        <form action="http://localhost/api_consultas/index.php" method="post">
            <input type="submit" value="Volver">
        </form>
    </body>
</html>
<?php

    include_once 'apipeliculas.php';
    $api = new ApiPeliculas();
    $pros = new ApiPeliculas();

    if(isset($_GET['id'])){}
    else{
        $items = $api->getTop();
        $resultados = print_r($items, true);
        echo('<pre>');
        echo"Lista de Altas:<br><textarea name='res' rows='22' cols='120'><",var_dump($resultados),"></textarea><br>";
        echo('</pre>');
    }

    include_once 'db.php';
    $conn = mysqli_connect('localhost', 'root', '', 'peliculas');
    if (isset($_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["puntuacion"]) and $_POST["id"] !="" and ($_POST["nombre"] !="" or $_POST["genero"]!="" or $_POST["puntuacion"]!="" )){
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $genero = $_POST["genero"];
        $puntuacion = $_POST["puntuacion"];
        if (isset($_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["puntuacion"]) and $_POST["id"] !="" and ($_POST["nombre"] !="")){
            $consulta = "UPDATE peliculas SET Nombre='$nombre' WHERE Id=$id;";
        }
        if (isset($_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["puntuacion"]) and $_POST["id"] !="" and ($_POST["genero"] !="")){
            $consulta = "UPDATE peliculas SET Genero='$genero' WHERE Id=$id;";
        }
        if (isset($_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["puntuacion"]) and $_POST["id"] !="" and ($_POST["puntuacion"] !="")){
            $consulta = "UPDATE peliculas SET Puntuacion='$puntuacion' WHERE Id=$id;";
        }
        if (isset($_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["puntuacion"]) and $_POST["id"] !="" and ($_POST["nombre"] !="") and ($_POST["genero"] !="")){
            $consulta = "UPDATE peliculas SET Nombre='$nombre',Genero='$genero' WHERE Id=$id;";
        }
        if (isset($_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["puntuacion"]) and $_POST["id"] !="" and ($_POST["nombre"] !="") and ($_POST["puntuacion"] !="")){
            $consulta = "UPDATE peliculas SET Nombre='$nombre',Puntuacion='$puntuacion' WHERE Id=$id;";
        }
        if (isset($_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["puntuacion"]) and $_POST["id"] !="" and ($_POST["genero"] !="") and ($_POST["puntuacion"] !="")){
            $consulta = "UPDATE peliculas SET Genero='$genero',Puntuacion='$puntuacion' WHERE Id=$id;";
        }
        if (isset($_POST["id"], $_POST["nombre"], $_POST["genero"], $_POST["puntuacion"]) and $_POST["id"] !="" and ($_POST["genero"] !="") and ($_POST["puntuacion"] !="") and ($_POST["nombre"] !="")){
            $consulta = "UPDATE peliculas SET Nombre='$nombre',Genero='$genero',Puntuacion='$puntuacion' WHERE Id=$id;";
        }

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            if (mysqli_query($conn, $consulta)) {
                echo "Cambio reaizado con exito";
            } else {
                echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
   
    }else {
        echo '<p>Por favor, complete el <a href="cambio.php">formulario</a></p>';
    }
?> 