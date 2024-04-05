<?php 

    include "header.php" ;
    //print_r ($_SESSION);
    if(!isset($_GET['codigo'])){
        header("Location: usuarios_crud.php?mensaje=error");
        exit();
    }

    $codigo=$_GET['codigo'];

    require "conexion.php";

    $sql="SELECT id, nombre, ip, protocolo, banda, frecuencia, symbol_rate, val_min, val_max, estado FROM equipos WHERE id=$codigo; ";

    $resultado = $mysqli -> query($sql);
    
    $row=$resultado->fetch_assoc();



    //print_r($row);

?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Editar datos
                    </div>
                    <form class="p-4 needs-validation" novalidate method="POST" action="editar_proceso_equipo.php" >
                        <div class="mb-3">
                            <label class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $row['nombre']; ?>">
                            <div class="valid-feedback">
                                Todo Bien
                            </div>
                            <div class="invalid-feedback">
                                Es necesario poner el nombre
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">IP: </label>
                            <input type="text" class="form-control" name="txtIP" autofocus required value="<?php echo $row['ip']; ?>">
                            <div class="valid-feedback">
                                Todo Bien
                            </div>
                            <div class="invalid-feedback">
                                Es necesario poner la IP
                            </div>                                            
                        </div>

                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01" >Protocolo: </label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="txtProtocolo">
                                    <?php 
                                    if($row['protocolo'] == 'Telnet'){
                                    ?>
                                        <option value="Telnet" selected>Telnet</option>
                            
                                    <?php
                                    } else{ 
                                        ?>
                                            <option value="Telnet" selected>Telnet</option>
                                        <?php 
                                        } 
                                    ?>
                                </select>
                        </div>

                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01" >Banda: </label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="txtBanda">
                                    <?php 
                                    if($row['banda'] == 'C'){
                                    ?>
                                        <option value="C" selected>Banda C</option>
                                        <option value="Ku" >Banda Ku</option>
                                    <?php
                                    } else if($row['banda'] == 'Ku'){ 
                                    ?>
                                        <option value="C">Banda C</option>
                                        <option value="Ku" selected>Banda Ku</option>
                                    <?php 
                                    } else{ 
                                        ?>
                                            <option value="C" selected>Banda C</option>
                                            <option value="Ku">Banda Ku</option>
                                        <?php 
                                        } 
                                    ?>
                                </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Frecuencia: </label>
                            <input type="text" class="form-control" name="txtFrecuencia" autofocus required value="<?php echo $row['frecuencia']; ?>">
                            <div class="valid-feedback">
                                Todo Bien
                            </div>
                            <div class="invalid-feedback">
                                Es necesario poner la frecuencia
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Symbol Rate: </label>
                            <input type="text" class="form-control" name="txtSymbolRate" autofocus required value="<?php echo $row['symbol_rate']; ?>">
                            <div class="valid-feedback">
                                Todo Bien
                            </div>
                            <div class="invalid-feedback">
                                Es necesario poner el Symbol Rate en MBps
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Valor minimo en dB: </label>
                            <input type="text" class="form-control" name="txtMin" autofocus required value="<?php echo $row['val_min']; ?>">
                            <div class="valid-feedback">
                                Todo Bien
                            </div>
                            <div class="invalid-feedback">
                                Es necesario poner el Symbol Rate en MBps
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Valor maximo en dB: </label>
                            <input type="text" class="form-control" name="txtMax" autofocus required value="<?php echo $row['val_max']; ?>">
                            <div class="valid-feedback">
                                Todo Bien
                            </div>
                            <div class="invalid-feedback">
                                Es necesario poner el Symbol Rate en MBps
                            </div>
                        </div>

                        <div class="d-grid">
                            <input type="hidden" name="codigo" value="<?php echo $row['id']; ?>">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
                </script>
<?php include "footer.php" ?>