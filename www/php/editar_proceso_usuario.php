<?php

    print_r($_POST);

    if(!isset($_POST['codigo'])){
        header("Location: usuarios_crud.php?mensaje=error");
    }
    include "conexion.php";
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $usuario = $_POST['txtUsuario'];
    $password = $_POST['txtPassword'];
    $tipoUsuario = $_POST['txtTipoUsuario'];

    $sql="UPDATE usuarios SET nombre='$nombre', usuario='$usuario', password=sha1('$password'), tipo_usuario=$tipoUsuario WHERE id=$codigo;";


    print($sql);
    //echo "El usario $txtUsuario fue REGISTRADO ";
    $resultado = $mysqli -> query($sql);

    if($resultado === TRUE){
        header("Location: usuarios_crud.php?mensaje=usuario_editado");
    }else{
        header("Location: usuarios_crud.php?mensaje=error");
        exit();
    }

?>