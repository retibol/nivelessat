<?php

    session_start();
    require 'conexion.php';

    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }

    $id = $_SESSION['id'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    $nombre = $_SESSION['nombre'];
    
    $where = "";
    
    if($tipo_usuario == 2){
        $where = "WHERE id=$id";
    }
    
    /*else{
        if($tipo_usuario == 2){
            
        }else{
            echo "No existe el tipo de usuario";
        }
    } */
    
    
    $sql = "SELECT * FROM usuarios $where";

    $resultado = $mysqli->query($sql);
    include "header.php";
?>

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <?php echo  $sql; echo " - "; echo  $tipo_usuario; ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Password</th>
                                            <th>Nombre</th>
                                            <th>Tipo Usuario</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Password</th>
                                            <th>Nombre</th>
                                            <th>Tipo Usuario</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($row = $resultado->fetch_assoc()) { ?>   
                                        <tr>
                                            <td><?php echo $row['usuario']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['tipo_usuario']; ?></td>
                                        </tr>    
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include "footer.php"; ?>               