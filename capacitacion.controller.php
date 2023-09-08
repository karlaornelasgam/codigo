<?php
include('messages.php');
include_once("conexion.php");

class Capacitacion_controller
{

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function agregar_capacitacion($nombre, $descripcion, $objetivo, $horas, $path, $idAsesor, $tipo)
    {
        $fecha = date("Y/m/d");
        $query = "INSERT INTO capacitaciones (nombre, descripcion, objetivo, horas, fechaCreacion, imagenPath, idAsesor, idTipo)
        VALUES ('$nombre','$descripcion','$objetivo','$horas','$fecha','$path','$idAsesor', '$tipo')";
        $resultado = $this->conexion->ejecutarQuery2($query);
        if ($resultado) {
            msgSucces2("Capacitación agregada!");
        }
    }

    function imagen($imagen, $identificador)
    {
        $ext = pathinfo($imagen['name'], PATHINFO_EXTENSION);
        $imagen['name'] = "C_" . $identificador . "_" .  date('d-m-y.h-i-s') . "." . $ext;
        move_uploaded_file($imagen['tmp_name'], "../../assets/images/capacitaciones/{$imagen['name']}");
        return $imagen['name'];
    }

    public function editar_capacitacion($id, $nombre, $descripcion, $objetivo, $horas, $tipo)
    {
        try {
            $query = "UPDATE capacitaciones SET nombre='$nombre',descripcion='$descripcion',objetivo='$objetivo',horas='$horas', idTipo ='$tipo' WHERE id='$id'";
            $conexion = new Conexion();
            $resultado = $conexion->ejecutarQuery($query);
            if ($resultado) {
                echo "<script> window.location='capacitaciones.php'; </script>";
            } else {
                msgError("Ocurrio un error");
            }
        } catch (Exception $exc) {
            msgError($exc);
        }
    }

    public function agregar_tema($nombre, $descripcion, $numero, $idCapacitacion)
    {
        $query = "INSERT INTO temas (nombre, descripcion, numero, idCapacitacion)
        VALUES ('$nombre','$descripcion','$numero','$idCapacitacion')";
        $resultado = $this->conexion->ejecutarQuery2($query);
        if ($resultado) {
            msgSucces2("Tema agregado!");
        }
    }

    public function agregar_sesion($nombre, $descripcion, $idTema, $idCapacitacion)
    {
        $query = "INSERT INTO sesiones (nombre, descripcion, idTema)
        VALUES ('$nombre','$descripcion','$idTema')";
        $conexion = new Conexion();
        $resultado = $conexion->ejecutarQuery($query);
        if ($resultado) {
            msgSucces2("Sesion agregada al tema!");
        }
    }
}
