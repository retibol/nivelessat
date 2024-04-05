<?php
    require "conexion.php";
    session_start();
    print_r($_POST);
    // Si no se envian todos los datos regresamos a la pagina principal con un mensaje
    if(empty($_POST["oculto"])||empty($_POST["txtNombre"]||empty($_POST["txtIP"]))||empty($_POST["txtBanda"])||empty($_POST["txtFrecuencia"])){
       //header("Location: equipos_crud.php?mensaje=falta");
       echo "ERROR al iniciar la pagina";
    }

    // Recuperamos las varialbes enviadas por el metodo POST
    $txtNombre = $_POST['txtNombre'];
    $txtIP = $_POST['txtIP'];
    $txtProtocolo = $_POST['txtProtocolo'];
    $txtBanda = $_POST['txtBanda'];
    $txtFrecuencia = $_POST['txtFrecuencia'];
    $txtSymbolRate = $_POST['txtSymbolRate'];
    $txtMin = floatval( $_POST['txtMin']);
    $txtMax = floatval( $_POST['txtMax']);

    if( !($txtMax > $txtMin)){
        //echo "El VALOR MINIMO ES MAYOR O IGUAL Q EL MAXIMO ";
        header("Location: equipos_registrar.php?mensaje=max_menor_min");
        exit();
     }
    // Validadmos si el usario ya existe
    $sql="SELECT id FROM equipos WHERE nombre='$txtNombre'";
    $resultado = $mysqli -> query($sql);
    $num = $resultado->num_rows;

    if($num>0){ // si existe algun equipo con el mismo nombre retornamos al formualrio un error
        header("Location: equipos_registrar.php?mensaje=equipo_existente");
        //print($sql);
       //echo "Equipo ya fue registrado ";
    }else{
        /*INSERT INTO table_name (column1, column2, column3,...columnN)
        VALUES (value1, value2, value3,...valueN);*/

        $sql="INSERT INTO equipos(nombre, ip, protocolo, banda, frecuencia, symbol_rate, val_min, val_max, estado) VALUES ('$txtNombre','$txtIP', '$txtProtocolo', '$txtBanda', $txtFrecuencia, $txtSymbolRate,$txtMin, $txtMax, 0);";

        //print($sql);
        //echo "Error al registrar equipo ";
        $resultado = $mysqli -> query($sql);
        header("Location: equipos_examinar.php");
    }

    

?>