<?php

include('Acceso.php');

class Usuarios extends AccesoDatos
{
    /*INSERT*/
    public function agregar($consulta){
        $this->ejecutarConsultaDML($consulta);
    }

    /*SELECT*/
    public function buscar($consulta){
        $stm = $this->consultar($consulta);
        return $stm;
    }

    /*DELETE*/
    public function eliminar($consulta){
        $this->ejecutarConsultaDML($consulta);
    }
}