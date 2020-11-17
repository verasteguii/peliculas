<html>
    <head>
        <title>Consulta API</title>
    </head>
    <body>
    <center>
    <img src="fondb.jpg" style="width:1340px;height:150px;">
    <br>
    <br>
        <form action="http://localhost/api_consultas/baja.php" method="post">
            Id de Pelicula:<input name="id" type="text">
            <input type="submit" value="Envar">
        </form>
    </center>
    </body>   
<?php
    include_once 'apipeliculas.php';
    $api = new ApiPeliculas();
    $pros = new ApiPeliculas();

    if(isset($_GET['id'])){}
    else{
        $items = $api->getTop();
        $resultados = print_r($items, true);
        echo('<pre>');
        echo"Lista de Altas:<br><textarea name='res' rows='30' cols='120'><",var_dump($resultados),"></textarea><br>";
        echo('</pre>');
    }
?>
        </form>
        <form action="http://localhost/api_consultas/index.php" method="get">
            <input type="submit" value="Volver">
        </form>
    </body>
</html>
<?php
    include_once 'db.php';
    $conn = mysqli_connect('localhost', 'root', '', 'peliculas');
    if (isset($_POST["id"]) and $_POST["id"] !=""){
        $id = $_POST["id"];

        $consulta = "DELETE FROM peliculas WHERE Id=$id";
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            if (mysqli_query($conn, $consulta)) {
                echo "Baja reaizada con exito";
            } else {
                echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
   
    }else {
        echo '<p>Por favor, complete el <a href="alta.php">formulario</a></p>';
    }
?> 