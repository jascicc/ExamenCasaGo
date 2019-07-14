<?php
    header('Access-Contol-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Articulo.php';

    $database = new Database();
    $db = $database->connect();

    $articulo = new Articulo($db);

    $articulo->nombre = isset($_GET['nombre']) ? $_GET['nombre'] : die();

    $articulo->find_article();

    if($articulo -> id !== null){
        $articulo_arr = array(
            'id' => $articulo -> id,
            'nombre' => $articulo -> nombre,
            'url' => $articulo -> url,
            'error' => false,
            'message' => ''
        );
    
        print_r(json_encode($articulo_arr));
        //echo $articulo -> url;
    }
    else{
        $articulo_arr = array(
            'url' => 'https://www.bitoodle.com/Mobile_new/images/emptycart.png',
            'error' => true,
            'message' => 'No se encontró el producto'
        );
    
        print_r(json_encode($articulo_arr));
        //echo 'Error: No se encontró el producto';
    }
?>