<?php

class AccesoDatos
{
    protected $bd;
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $basedatos = "bd_acdivoca";

    public function __construct(){}

    public function conectar()
    {
        $this->bd = mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->basedatos);

        /*if ($this->bd) {
            echo "<br>Conexión exitosa<br>";
        }else
            echo "<br>No conectado:<br>" . $this->bd->connect_error;*/
    }

    /*INSERT, UPDATE, DELETE*/
    public function ejecutarConsultaDML($consulta)
    {
        $this->conectar();
        $resultado = $this->bd->query($consulta);
        if (!$resultado)
            die("Operación ha fallado");

        $this->bd->close();
    }

    /*SELECT*/
    public function consultar($consulta)
    {
        $this->conectar();
        $registros = $this->bd->query($consulta);

        if (!$registros)
            die("Error de consulta");

        $filas = array();
        while ($fila = mysqli_fetch_array($registros)){
            $filas[] = array(
                "ID_USUARIO" => $fila["ID_USUARIO"],
                "NOMBRE"=> $fila["NOMBRE"],
                "APELLIDO" => $fila["APELLIDO"],
                "CORREO" => $fila["CORREO"],
                "USUARIO" => $fila["USUARIO"]
            );
        }

        $result = json_encode($filas);
        $this->bd->close();
        return $result;
    }
}