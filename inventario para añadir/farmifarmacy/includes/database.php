<?php
    require_once(LIB_PATH_INC.DS."config.php");

    class Mysqli_DB {
        private $con;
        public $query_id;

        function __construct() {
            $this->db_connect();
        }

        /*función para abrir la conexion a la base de datos*/
        public function db_connect()
        {
            $this->con = mysqli_connect('localhost','root','');
            if(!$this->con)
            {
                die(" Database conection failed:". mysqli_connect_error());
            } else {
                $select_db = $this->con->select_db('farmifarmacy');
                if(!$select_db)
                {
                    die("Failed to select Database".mysqli_connect_error());                }
            }
        }
    }

    /*Función para cerrar la conexion a la base de datos*/
    public function query($sql)
    {
        if(trim($sql != "")) {
            $this->query_id = $this->con->query($sql);
        }
        if(!$this->query_id)
        die("Error en la encuesta :<pre> " . $sql ."</pre>");
        return $this->query_id;
    }

    /*Function for query helper*/
    public function fetc_array($statment)
    {
        return mysqli_fetch_array($statment);
    }
    public function fetch_object($statment);
    {
        return mysqli_fetch_object($statment);
    }
    public function fetch_assoc($statment);
    {
        return mysqli_fetch_assoc($statment);
    }
    public function num_rows($statment);
    {
        return mysqli_num_rows($statment);
    }
    public function insert_id()
    {
        return mysqli_insert_id($this->con);
    }
    public function affected_rows()
    {
        return mysqli_affected_rows($this->con)
    }
?>