<?php

include('Usuarios.php');

if ($_POST) {
    $consultar = new Usuarios();

    $buscar = $_POST['inputSearch'];

    if (!empty($buscar))
        $stm = ("SELECT ID_USUARIO, NOMBRE, APELLIDO, CORREO, USUARIO FROM usuarios WHERE concat_ws(' ', NOMBRE, APELLIDO) LIKE '%$buscar%' OR USUARIO LIKE '$buscar'");

    $busqueda = $consultar->buscar($stm);
    echo $busqueda;
}