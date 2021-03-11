<?php
class Database
{
    private $databaseName = 'hojas_de_vida';
    private $host = 'bbdd_mysql';
    private $user = 'miusuario';
    private $password = 'mipassword';
    private $con;
    private $db_charset = 'utf8';
    private static $instance;

    private function __construct()
    {
        $this->runConnection();
    }


    private function runConnection()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->databaseName);
        if (!$this->con) {

            echo '<script type="text/javascript">
                alert("Error: No se conecto a base de datos");
                </script>';
        } else {
        }
        mysqli_set_charset($this->con, $this->db_charset);
        date_default_timezone_set('America/Bogota');
    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new Database();
        }
        return static::$instance;
    }
    public function registrarHoja($nombre, $fecha_nacimiento, $cedula, $direccion, $telefono, $email, $nivel_academico, $nombre_institucion, $titulo, $fecha_estudios, $fecha_fin_estudios, $titulos)
    {

        if ($result = mysqli_query($this->con, "SHOW TABLES LIKE `hojas`")) {
            if ($result->num_rows == 1) {
                //La tabla existe
                $stmt = "INSERT INTO `hojas` (`nombre`, `fecha_nacimiento`, `cedula`, `direccion`, `telefono`, `email`, `nivel_academico`, `nombre_institucion`, `titulo`, `fecha_estudios`, `fecha_fin_estudios`,`titulos`) VALUES ('$nombre', '$fecha_nacimiento', '$cedula','$direccion', '$telefono', '$email', '$nivel_academico', '$nombre_institucion', '$titulo', '$fecha_estudios', '$fecha_fin_estudios','$titulos')";
                $resultado = mysqli_query($this->con, $stmt);
                if (!$resultado) {
                    session_start();
                    $_SESSION['exito'] = false;
                    exit;
                } else {
                    session_start();
                    $_SESSION['exito'] = true;
                    header("location: /");
                    exit;
                }
            }
        } else {
            $result = mysqli_query($this->con, "CREATE TABLE `hojas` ( `nombre` TEXT NOT NULL , `fecha_nacimiento` DATE NOT NULL , `cedula` INT NOT NULL , `direccion` TEXT NOT NULL , `telefono` INT NOT NULL , `email` TEXT NOT NULL , `nivel_academico` TEXT NOT NULL , `nombre_institucion` TEXT NOT NULL , `titulo` TEXT NOT NULL , `fecha_estudios` DATE NOT NULL , `fecha_fin_estudios` DATE NOT NULL , `titulos` TEXT NOT NULL )");
            $stmt = "INSERT INTO `hojas` (`nombre`, `fecha_nacimiento`, `cedula`, `direccion`, `telefono`, `email`, `nivel_academico`, `nombre_institucion`, `titulo`, `fecha_estudios`, `fecha_fin_estudios`,`titulos`) VALUES ('$nombre', '$fecha_nacimiento', '$cedula','$direccion', '$telefono', '$email', '$nivel_academico', '$nombre_institucion', '$titulo', '$fecha_estudios', '$fecha_fin_estudios','$titulos')";
            $resultado = mysqli_query($this->con, $stmt);
            if (!$resultado) {
                session_start();
                $_SESSION['exito'] = false;
                exit;
            } else {
                session_start();
                $_SESSION['exito'] = true;
                header("location: /");
                exit;
            }
        }
    }
}
