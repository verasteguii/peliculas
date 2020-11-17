<?php

include_once 'pelicula.php';

class ApiPeliculas{

    function getAll(){
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();

        $res = $pelicula->obtenerPeliculas();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "Id" => $row['Id'],
                    "Nombre" => $row['Nombre'],
                    "Genero" => $row['Genero'],
                    "Puntuacion" => $row['Puntuacion'],
                );
                array_push($peliculas["items"], $item);
            }
        
            $this->printJSON($peliculas);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getTop(){
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();

        $res = $pelicula->obtenerPeliculas();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "Id" => $row['Id'],
                    "Nombre" => $row['Nombre'],
                    "Genero" => $row['Genero'],
                    "Puntuacion" => $row['Puntuacion'],
                );
                array_push($peliculas["items"], $item);
            }
        
            return $peliculas;
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getById($id){
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();

        $res = $pelicula->obtenerPelicula($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array("Id"=>$row['Id'],
                "Nombre"=>$row['Nombre'],
                "Genero"=>$row['Genero'],
                "Puntuacion"=>$row['Puntuacion'],
            );
            array_push($peliculas["items"], $item);
            //$this->printJSON($peliculas);
            return $peliculas;
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }


    function error($mensaje){
        //echo json_encode(array('mensaje' => $mensaje)); 
        return $mensaje;
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }
}

?>