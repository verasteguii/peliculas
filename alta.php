<html>
    <link href="http://localhost/api_consultas/estilo.css" rel="stylesheet" type="text/css">
    <head>
        <title>Funciones</title>
    </head>
    <body>
    <form action="http://localhost/api_consultas/alta.php" method="post">
            <div>
            <center>
            <img src="fonda.jpg" style="width:1340px;height:150px;">
                <br>Alta<br>
                <label>Nombre.:<pre style='display:inline'>    </pre>
                    <input type="text" name="nombre"><br></label>
                <label>Genero:<pre style='display:inline'>     </pre>
                    <input type="text" name="genero"><br></label>
                <label>Puntuación:<pre style='display:inline'>  </pre>
                    <input type="number" name="puntuacion"><br></label>
                    <br><pre style='display:inline'>            </pre>
                    <input type="submit" value="Alta"><br><br>
            </center>
            </div>
        </form>
        <form action="http://localhost/api_consultas/index.php" method="post">
            <div>
                <input type="submit" value="Atras"><br><br>
            </div>
        </form>
       
    </body>
</html>
<?php
    include_once 'db.php';
    $conn = mysqli_connect('localhost', 'root', '', 'peliculas');
    if (isset($_POST["nombre"], $_POST["genero"], $_POST["puntuacion"]) and $_POST["nombre"] !="" and $_POST["genero"]!="" and $_POST["puntuacion"]!="" ){
        $nombre = $_POST["nombre"];
        $genero = $_POST["genero"];
        $puntuacion = $_POST["puntuacion"];

        $consulta = "INSERT INTO peliculas(Nombre,Genero,Puntuacion) VALUES ('$nombre','$genero','$puntuacion')";
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            if (mysqli_query($conn, $consulta)) {
                echo "Alta realizada con exito";
            } else {
                echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    }else {
        echo '<p>Por favor, complete el <a href="alta.php">formulario</a></p>';
    }
?> 