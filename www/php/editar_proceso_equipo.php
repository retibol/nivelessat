<?php

    print_r($_POST);

    if(!isset($_POST['codigo'])){
        header("Location: equipos_crud.php?mensaje=error");
    }
    include "conexion.php";

    $codigo = $_POST['codigo'];
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
        header("Location: equipos_crud.php?mensaje=max_menor_min");
        exit();
     }

    $sql="UPDATE equipos SET nombre='$txtNombre', ip='$txtIP',protocolo='$txtProtocolo', banda='$txtBanda', frecuencia=$txtFrecuencia, val_min=$txtMin, val_max=$txtMax, symbol_rate=$txtSymbolRate WHERE id=$codigo;";


    print($sql);
    //echo "El usario $txtUsuario fue REGISTRADO ";
    $resultado = $mysqli -> query($sql);

    if($resultado === TRUE){
        header("Location: equipos_crud.php?mensaje=equipo_editado");
        //echo "El equipo fue REGISTRADO ";
    }else{
        header("Location: equipos_crud.php?mensaje=error");
        //echo "El equipo NO fue REGISTRADO ";
        exit();
    }

?>