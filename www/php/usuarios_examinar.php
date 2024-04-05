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
    
    $sql = "SELECT * FROM usuarios $where";

    $resultado = $mysqli->query($sql);
    include "header.php";
?>

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Examinar Usuarios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Principal</a></li>
                            <li class="breadcrumb-item active">Usuarios</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Esta tabla representa todos los usuarios registrados en el sistema.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Usuarios Registrados
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