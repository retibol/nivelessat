<?php 

    include "header.php" ;
    //print_r ($_SESSION);
    if(!isset($_GET['codigo'])){
        header("Location: usuarios_crud.php?mensaje=error");
        exit();
    }

    $codigo=$_GET['codigo'];

    require "conexion.php";

    $sql="SELECT id, nombre, usuario, tipo_usuario FROM usuarios WHERE id=$codigo; ";

    $resultado = $mysqli -> query($sql);
    
    $row=$resultado->fetch_assoc();



    print_r($row);

?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Editar datos
                    </div>
                    <form class="p-4 needs-validation" novalidate method="POST" action="editar_proceso_usuario.php" >
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
                            <label class="form-label">Usuario: </label>
                            <input type="text" class="form-control" name="txtUsuario" autofocus required value="<?php echo $row['usuario']; ?>">
                            <div class="valid-feedback">
                                Todo Bien
                            </div>
                            <div class="invalid-feedback">
                                Es necesario poner el usuario
                            </div>                                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password: </label>
                            <input type="password" class="form-control" name="txtPassword" autofocus required>
                            <div class="valid-feedback">
                                Todo Bien
                            </div>
                            <div class="invalid-feedback">
                                Es necesario poner la contrasena
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01" >Tipo de Usuario</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="txtTipoUsuario">
                                    <?php 
                                    if($row['tipo_usuario'] == 1){
                                    ?>
                                        <option value="1" selected>Administrador</option>
                                        <option value="2" >Usuario</option>
                                    <?php
                                    } else if($row['tipo_usuario'] == 2){ 
                                    ?>
                                        <option value="1">Administrador</option>
                                        <option value="2" selected>Usuario</option>
                                    <?php 
                                    } 
                                    ?>
                                </select>
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