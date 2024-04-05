<?php

    include "header.php";
    require 'conexion.php';

    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }

    $id = $_SESSION['id'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    $nombre = $_SESSION['nombre'];

    $sql = "SELECT * FROM equipos";
    $resultado = $mysqli->query($sql);

    $item=0;

    
?>

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Examinar Equipos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Principal</a></li>
                            <li class="breadcrumb-item active">Equipos</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Esta tabla representa todos los equipos registrados en el sistema.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Equipos Registrados
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Ip</th>
                                            <th>Protocolo</th>
                                            <th>Banda</th>
                                            <th>Frecuencia [GHz]</th>
                                            <th>SR [MBps]</th>
                                            <th>Min [dB]</th>
                                            <th>Max [dB]</th>                                                                                                        
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                        <th>#</th>
                                            <th>Nombre</th>
                                            <th>Ip</th>
                                            <th>Protocolo</th>
                                            <th>Banda</th>
                                            <th>Frecuencia [GHz]</th>
                                            <th>SR [MBps]</th>
                                            <th>Min [dB]</th>
                                            <th>Max [dB]</th>                                                                                                        
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($row = $resultado->fetch_assoc()) { ?>   
                                        <tr>
                                            <td><?php $item=$item+1; echo $item;?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['ip']; ?></td>
                                            <td><?php echo $row['protocolo']; ?></td>
                                            <td><?php echo $row['banda']; ?></td>
                                            <td><?php echo $row['frecuencia']; ?></td>
                                            <td><?php echo $row['symbol_rate']; ?></td>
                                            <td><?php echo $row['val_min']; ?></td>
                                            <td><?php echo $row['val_max']; ?></td>
                                            <td>
                                            <!-- Insertamos iconos para el estado del equipo-->
                                            <?php
                                            if ($row["estado"] == 1 ){
                                                echo "<i class='bi bi-check-circle-fill text-success'></i>";
                                            }else if($row["estado"] == 0 ){
                                                echo "<i class='bi bi-x-circle-fill text-danger'></i>";
                                            }
                                            ?></td>

                                            <td><a class="text-success" href="editar_equipo.php?codigo=<?php echo $row["id"] ?>"><i class="bi bi-pencil-square"></i></a></td>
		                                    <td><a onclick="return confirm('Estas seguro de eliminar? ');" class="text-danger" href="eliminar_equipo.php?codigo=<?php echo $row["id"] ?>"><i class="bi bi-trash3"></i></a></td>
                                        </tr>    
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include "footer.php"; ?>               