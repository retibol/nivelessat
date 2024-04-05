<?php
    require "conexion.php";

    

    $sql="SELECT id, nombre, usuario, tipo_usuario FROM usuarios";

    $resultado = $mysqli -> query($sql);

    // incluimos la cabecera generica        
    include "header.php";       

    $item=0;

?>

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Usuarios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Configuracion</li>
                        </ol>

                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <!-- inicio alerta-->
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                                </svg>
                                <?php 
                                if(isset($_GET['mensaje']) and $_GET['mensaje']=="usuario_existente"){
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <strong>Error! </strong> El usuario ya existe.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                                }
                                ?>

                                <?php 
                                if(isset($_GET['mensaje']) and $_GET['mensaje']=="usuario_registrado"){
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <strong>Excelente! </strong> Usuario registrado.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                                }
                                ?>      

                                <?php 
                                if(isset($_GET['mensaje']) and $_GET['mensaje']=="usuario_editado"){
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <strong>Excelente! </strong> Usuario editado.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                                }
                                ?>  

                                <?php 
                                if(isset($_GET['mensaje']) and $_GET['mensaje']=="usuario_eliminado"){
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <strong>Excelente! </strong> El usuario Usuario Eliminado.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                                }
                                ?>  


                                <?php 
                                if(isset($_GET['mensaje']) and $_GET['mensaje']=="error"){
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <strong>Error! </strong> Vuelve a intentar.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                                }
                                ?> 
                                <!-- fin alerta-->
                                <div class="card">
                                    <div class="card-header">
                                        Lista de Usuarios
                                    </div>
                                    <div class="p-4">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Usuario</th>
                                                    <th scope="col">Tipo Usuario</th>
                                                    <th scope="col" colspan="2">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            foreach ($resultado as $dato) {
                           // printf("%s (%s)\n", $row["nombre"], $row["usuario"]);
                        
                                                ?>
                                                <tr>
                                                    <td scope="row"><?php $item=$item+1; echo $item; ?></td>
                                                    <td><?php echo $dato["nombre"] ?></td>
                                                    <td><?php echo $dato["usuario"] ?></td>
                                                    <td><?php
                                                    if ($dato["tipo_usuario"] == 1 ){
                                                        echo "Adminstrador";
                                                    }else if($dato["tipo_usuario"] == 2 ){
                                                        echo "Usuario";
                                                    }
                                                    
                                                     ?></td>
                                                    <td><a class="text-success" href="editar_usuario.php?codigo=<?php echo $dato["id"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                                                    <td><a onclick="return confirm('Estas seguro de eliminar? ');" class="text-danger" href="eliminar_usuario.php?codigo=<?php echo $dato["id"] ?>"><i class="bi bi-trash3"></i></a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        Ingresar datos
                                    </div>
                                    <form class="p-4 needs-validation" novalidate method="POST" action="registrar_usuario.php" >
                                        <div class="mb-3">
                                            <label class="form-label">Nombre: </label>
                                            <input type="text" class="form-control" name="txtNombre" autofocus required>
                                            <div class="valid-feedback">
                                                Todo Bien
                                            </div>
                                            <div class="invalid-feedback">
                                                Es necesario poner el nombre
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Usuario: </label>
                                            <input type="text" class="form-control" name="txtUsuario" autofocus required>
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
                                                    <option value="1">Administrador</option>
                                                    <option value="2" selected>Usuario</option>
                                                </select>
                                        </div>


                                        <div class="d-grid">
                                            <input type="hidden" name="oculto" value="1">
                                            <input type="submit" class="btn btn-primary" value="Registrar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </d iv>
                </main>
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
                
<?php include "footer.php"; ?>                