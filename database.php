<?php
require_once("config.php");
//clase para crear la conexion bbdd
class Database
{

    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;


    public $dbh;
    private $stmt;
    private $error;
    public $datos;


    public $nombre;
    public $apellidos;
    public $dni;
    public $email;
    public $contrasena;



    public function __construct()
    {

        //configurar conexion
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            $this->dbh->exec('set names utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }


    public function insertUser($dbh, $datos)
    {
        $this->dbh = $dbh;
        $this->datos = $datos;

        try {
            $stmt = $dbh->prepare("INSERT INTO usuarios (nombre, apellidos, dni, email, contrasena) VALUES (:nombre, :apellidos, :dni, :email, :contrasena)");
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellidos', $this->apellidos);
            $stmt->bindParam(':dni', $this->dni);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':contrasena', $this->contrasena);

            $this->nombre = $this->datos['nombre'];
            $this->apellidos = $this->datos['apellidos'];
            $this->dni = $this->datos['dni'];
            $this->email = $this->datos['email'];
            $this->contrasena = $this->datos['contrasena'];


            // Ejecutar la consulta
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al insertar datos: " . $e->getMessage();
        }
    }




    public function compruebaUser($dbh, $usuario, $contrasena)
    {

        // Consulta preparada para verificar si el usuario existe en la base de datos
        $sql = "SELECT * FROM usuarios WHERE email = :usuario";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(['usuario' => $usuario]);

        // Verificar si se encontr?? el usuario en la base de datos
        if ($stmt->rowCount() == 0) {
            echo "Usuario o contrase??a incorrectas";
            die();
        }

        $usuario = $stmt->fetch();



        if (password_verify($contrasena, $usuario['contrasena'])) {
            
            $nombre_sesion = $usuario['email'];
            session_name($nombre_sesion);
            session_start();
            return $nombre_sesion;
        } else {
            echo "Usuario o contrase??a incorrectas";
            die();
        }
    }
}

?>

