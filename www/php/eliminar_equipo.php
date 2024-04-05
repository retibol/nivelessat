<?php 
    print_r($_GET);

    if(!isset($_GET['codigo'])){
        header("Location: equipos_crud.php?mensaje=error");
        exit();
    }

    require "conexion.php";

    $codigo=$_GET['codigo'];

    $sql="DELETE FROM equipos WHERE id=$codigo; ";

    $resultado = $mysqli -> query($sql);

    if ($resultado === TRUE){

        header("Location: equipos_crud.php?mensaje=equipo_eliminado");
    } else{

        header("Location: equipos_crud.php?mensaje=error");
    }
    
    //$row=$resultado->fetch_assoc();



    //print_r($row);
?>