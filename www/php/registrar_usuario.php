<?php
    require "conexion.php";
    session_start();

    if(empty($_POST["oculto"])||empty($_POST["txtNombre"]||empty($_POST["txtUsuario"]))||empty($_POST["txtPassword"])||empty($_POST["txtTipoUsuario"])){

        echo "Faltan datos";
        header("Location: usuarios_crud.php?mensaje=falta");

    }




    //print_r ($_POST);

    // Recuperamos las varialbes enviadas por el metodo POST
    $txtNombre = $_POST['txtNombre'];
    $txtUsuario = $_POST['txtUsuario'];
    $txtPassword = $_POST['txtPassword'];
    $txtTipoUsuario = $_POST['txtTipoUsuario'];
    
    
    // Validadmos si el usario ya existe
    $sql="SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario='$txtUsuario'";
    $resultado = $mysqli -> query($sql);
    $num = $resultado->num_rows;

    if($num>0){ // si existe algun usuario retornamos al formualrio un error
        header("Location: usuarios_crud.php?mensaje=usuario_existente");
        //print($sql);
        //echo "El usario $txtUsuario ya existe ";
    }else{
        /*INSERT INTO table_name (column1, column2, column3,...columnN)
        VALUES (value1, value2, value3,...valueN);*/

        $sql="INSERT INTO usuarios(nombre, usuario, password, tipo_usuario) VALUES ('$txtNombre','$txtUsuario',sha1('$txtPassword'), $txtTipoUsuario);";

        //print($sql);
        //echo "El usario $txtUsuario fue REGISTRADO ";
        $resultado = $mysqli -> query($sql);
        header("Location: usuarios_crud.php?mensaje=usuario_registrado");
    }

    

?>