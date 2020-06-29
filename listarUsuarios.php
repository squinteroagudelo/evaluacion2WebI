<?php

include('Usuarios.php');

$listar = new Usuarios();

$stm = ("SELECT ID_USUARIO, NOMBRE, APELLIDO, CORREO, USUARIO FROM usuarios");
$result = $listar->buscar($stm);
echo $result;

