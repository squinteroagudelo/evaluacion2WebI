<?php

include('Usuarios.php');

$borrar = new Usuarios();

if (isset($_POST['inputDelete'])) {

    $eliminar = $_POST['inputDelete'];

    if (!empty($eliminar))
        $stm = ("SELECT ID_USUARIO, NOMBRE, APELLIDO, CORREO, USUARIO FROM usuarios WHERE concat_ws(' ', NOMBRE, APELLIDO) LIKE '%$eliminar%' OR USUARIO LIKE '$eliminar'");

    $busqueda = $borrar->buscar($stm);
    echo $busqueda;
}

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    echo "eliminar.php" . $id;
    $stm = ("DELETE FROM usuarios WHERE ID_USUARIO = '$id'");
    $result = $borrar->eliminar($stm);
}
