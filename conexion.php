<?php

//Crear mi clase Conexion 

class Conexion {
    private $host;
    private $username;
    private $password;
    private $baseDatos;
    private $conn;

    //Constructor

    public function __construct($host, $username, $password, $baseDatos) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->baseDatos = $baseDatos;
    }

    //Funcion para conectar BD

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->baseDatos);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function close() {
        $this->conn->close();
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>
