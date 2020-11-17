<html>
    <head>
        <title>Consulta API</title>
    </head>
    <body>
    <center>
    <img src="fondd.jpg" style="width:1340px;height:150px;">
    <br>
    <br>
        <form action="" method="get">
            Id de Pelicula:<input name="id" type="number">
            <input type="submit" value="Envar">
        </form>
        <form action="http://localhost/api_consultas/index.php" method="post">
            <pre style='display:inline'>                              </pre> 
            <input type="submit" value="Todo"><br><br>
    </center>
<?php
    include_once 'apipeliculas.php';
    $api = new ApiPeliculas();
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if(is_numeric($id)){
            $items = $api->getById($id);
        }else{
            $items = $api->error('El id es incorrecto');
        }
    }
    else{
        $items = $api->getTop();
    }
    $resultados = print_r($items, true);
    echo('<pre>');
    echo"Respuesta:<br><textarea name='res' rows='20' cols='120'><",var_dump($resultados),"></textarea><br>";
    echo('</pre>');
    
?>

        </form>
        <form action="http://localhost/api_consultas/alta.php" method="get">
            <input type="submit" value="Alta">
        </form>
        <form action="http://localhost/api_consultas/baja.php" method="get">
            <input type="submit" value="Baja">
        </form>
        <form action="http://localhost/api_consultas/cambio.php" method="get">
            <input type="submit" value="Cambio">
        </form>
    </body>
</html>