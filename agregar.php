<?php

include('Usuarios.php');

if ($_POST){
    $agregar = new Usuarios();

    $nombre = ucwords(strtolower($_POST['inputName']));
    $apellido = ucwords(strtolower($_POST['inputLastName']));
    $correo = strtolower($_POST['inputCorreo']);
    $usuario = trim($_POST['inputUsuario']);
    $clave = $_POST['inputClave'];
    $confirmar = $_POST['inputConfirmar'];

    if ($clave == $confirmar){
        $stm = "INSERT INTO usuarios (NOMBRE, APELLIDO, CORREO, USUARIO, CLAVE) VALUES ('$nombre', '$apellido', '$correo', '$usuario', '$clave')";
        $agregar->agregar($stm);
        echo "Registro agregado con éxito";
    }else{
        die("Contraseñas no coinciden");
    }

}