<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Taller 2 Web I - Usuarios PHP/MySql</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-11 col-lg-4">
            <div class="login-form-container pb-5 p-sm-4 p-xl-4 pb-xl-4 p-3 bg-white">
                <h3 class="text-center mt-xl-1 mb-xl-5 pt-sm-5 pt-lg-0">Registro</h3>
                <form class="pb-sm-5 pb-lg-0" id="form-registro"><!--Formulario registro-->
                    <div class="form-row">
                        <div class="form-group col-xl-6 input-container left-icon">
                            <label for="inputName">Nombres</label>
                            <i class="icono fas fa-signature"></i>
                            <input type="text" class="form-control" id="inputName" name="nombre" autocomplete="off">
                            <!--Nombre usuario-->
                        </div>

                        <div class="form-group col-xl-6 input-container left-icon">
                            <label for="inputLastName">Apellidos</label>
                            <i class="icono fas fa-signature"></i>
                            <input type="text" class="form-control" id="inputLastName" name="apellido"
                                   autocomplete="off"><!--Apellido usuario-->
                        </div>
                    </div>

                    <div class="form-group input-container left-icon">
                        <label for="inputEmail">Correo electrónico</label>
                        <i class="icono fas fa-at"></i>
                        <input type="email" class="form-control" id="inputEmail" name="correo" autocomplete="off">
                        <!--Correo electrónico usuario-->
                    </div>

                    <div class="form-group input-container left-icon">
                        <label for="inputUsuario">Nombre de usuario</label>
                        <i class="icono fas fa-user"></i>
                        <input type="text" class="form-control" id="inputUsuario" name="usuario" autocomplete="off">
                        <!--Nombre de usuario-->
                    </div>

                    <div class="form-group input-container left-icon">
                        <label for="inputPassword">Contraseña</label>
                        <i class="icono fas fa-key"></i>
                        <input type="password" class="form-control" id="inputPassword" name="clave" autocomplete="off">
                        <!--Contraseña-->
                    </div>

                    <div class="form-group input-container left-icon">
                        <label for="inputConfirmar">Confirmar contraseña</label>
                        <i class="icono fas fa-key"></i>
                        <input type="password" class="form-control" id="inputConfirmar" name="confirmar"
                               autocomplete="off"><!--Confirmar contraseña-->
                    </div>

                    <label class="checkbox mb-4">
                        <input type="checkbox" name="aceptar" value="aceptar" required> Acepto T&C
                    </label>

                    <button class="btn btn-block mt-xl-5" type="submit" id="enviar" name="registrar">Registrarse
                    </button>
                </form>
            </div> <!--login-form-container-->
        </div> <!--col-12 col-lg-4-->

        <div class="col-12 col-lg-8">
            <h2 class="text-center text-white mt-4 mb-4 pt-sm-5 pt-lg-0">Administración de Usuarios</h2>
            <div class="users-man mt-5">
                <form id="form-buscar"><!--Formulario buscar usuario-->
                    <div class="form-row justify-content-center">
                        <div class="form-group col-9 col-lg-6 mx-3 mb-2 input-container left-icon">
                            <label for="inputSearch">Buscar usuario</label>
                            <i class="icono fas fa-search" id="search-icon"></i>
                            <input type="text" class="form-control" id="inputSearch" name="buscar"
                                   placeholder="Nombre o apellido del usuario" autocomplete="off"><!--Usuario buscar-->
                            <small>Puede ingresar nombre de usuario. Click en buscar para confirmar la consulta</small>
                        </div>
                        <div class="form-group">
                            <button class="btn mt-4" type="submit" id="buscar" name="consultar">Buscar</button>
                        </div>
                    </div>
                </form><!--Formulario buscar usuario-->

            </div>

            <div class="users-man mt-5">
                <form id="form-eliminar"><!--Formulario eliminar usuario-->
                    <div class="form-row justify-content-center">
                        <div class="form-group col-9 col-lg-6 mx-3 mb-2 input-container left-icon">
                            <label for="inputDelete">Eliminar usuario</label>
                            <i class="icono fas fa-user-minus" id="delete-icon"></i>
                            <input type="text" class="form-control" id="inputDelete" name="eliminar"
                                   placeholder="Nombre o apellido del usuario" autocomplete="off">
                            <!--Usuario eliminar-->
                            <small>Puede eliminar por nombre de usuario. Click en eliminar para confirmar</small>
                        </div>
                        <div class="form-group">
                            <button class="btn mt-4" type="submit" id="eliminar" name="borrar">Eliminar</button>
                        </div>
                    </div>
                </form><!--Formulario eliminar usuario-->
            </div>

            <div class="registered-users" id="lista">
                <h3 class="text-center mt-4 mb-4">Listar usuarios</h3>
                <table class="tabla">
                    <thead>
                    <th class="hidden">ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo electrónico</th>
                    <th>Usuario</th>
                    </thead>
                    <tbody id="lista-usuarios"></tbody>
                </table>
            </div>
        </div> <!--col-12 col-lg-8-->

        <!--modal-->

    </div> <!--row-->
</div> <!--container-fluid-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>