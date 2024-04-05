<?php
include "header.php"; 
?>
<main>
<!-- inicio iconos del alert-->
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
<!-- fin iconos del alert-->
    <div class="container-fluid px-4">
        <h1 class="mt-4">Static Navigation</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Principal</a></li>
            <li class="breadcrumb-item active">Registrar Equipos</li>
        </ol>
        <!-- inicio alerta-->
            <?php 
            if(isset($_GET['mensaje']) and $_GET['mensaje']=="equipo_existente"){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <strong>Error! </strong> El equipo ya esta registrado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>

            <?php 
            if(isset($_GET['mensaje']) and $_GET['mensaje']="max_menor_min"){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <strong>Error! </strong> El valor maximo debe ser mayor que el valor minimo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>            

        <!-- Fin alerta-->
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Ingresar Datos
                    </div>
                    <div class="card-body">
                    <!--inicio card -body-->
                        <form class="p-4 needs-validation" novalidate method="POST" action="equipos_registrar_proceso.php" >
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
                                <label class="form-label">IP: </label>
                                <input type="text" class="form-control" name="txtIP" autofocus required>
                                <div class="valid-feedback">
                                    Todo Bien
                                </div>
                                <div class="invalid-feedback">
                                    Es necesario poner el IP
                                </div>                                            
                            </div>

                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01" >Protocolo: </label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="txtProtocolo">
                                        <option value="Telnet" selected>Telnet</option>
                                    </select>
                            </div>

                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01" >Banda: </label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="txtBanda">
                                        <option value="C" selected>Banda C</option>
                                        <option value="Ku">Banda Ku</option>
                                    </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Frecuencia: </label>
                                <input type="text" class="form-control" name="txtFrecuencia" autofocus required>
                                <div class="valid-feedback">
                                    Todo Bien
                                </div>
                                <div class="invalid-feedback">
                                    Es necesario poner la Frecuencia en GHz
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Symbol Rate: </label>
                                <input type="text" class="form-control" name="txtSymbolRate" autofocus required>
                                <div class="valid-feedback">
                                    Todo Bien
                                </div>
                                <div class="invalid-feedback">
                                    Es necesario poner la Symbol Rate  en MBps
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Valor Minimo en dB: </label>
                                <input type="text" class="form-control" name="txtMin" autofocus required>
                                <div class="valid-feedback">
                                    Todo Bien
                                </div>
                                <div class="invalid-feedback">
                                    Es necesario poner el minimo  en dB
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Valor Maximo en dB: </label>
                                <input type="text" class="form-control" name="txtMax" autofocus required>
                                <div class="valid-feedback">
                                    Todo Bien
                                </div>
                                <div class="invalid-feedback">
                                    Es necesario poner el maximo en dB
                                </div>
                            </div>

                            <!---
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01" >Tipo de Usuario</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="txtTipoUsuario">
                                        <option value="1">Administrador</option>
                                        <option value="2" selected>Usuario</option>
                                    </select>
                            </div>
                                    -->

                            <div class="d-grid">
                                <input type="hidden" name="oculto" value="1">
                                <input type="submit" class="btn btn-primary" value="Registrar">
                            </div>
                        </form>            
                    <!--fin card body-->
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
    </div>
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
<?php
include "footer.php";
?>   