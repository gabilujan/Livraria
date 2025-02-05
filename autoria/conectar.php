<?php
class Conectar extends PDO
{
    private static $instancia;
    private $querry;
    private $host = "127.0.0.1"; //ender servidor da etec
    private $usuario = "root"; //usuario servidor da etec
    private $senha = ""; //senha servidor da etec
    private $db = "bd_autoria";

    public function __construct()
    {
        parent::__construct("mysql:host=$this->host;dbname=$this->db","$this->usuario", "$this->senha");
    }

    public static function getInstance()
    {
        if(!isset(self::$instancia)){
            try
            {
                self::$instancia = new Conectar;
                echo 'Conectando com sucesso!!!';
            }
            catch(Exception $e)
            {
                echo 'Erro ao conectar';
                exit();
            }
        }
        return self:: $instancia;
    }
    public function sql ($querry){
        this->getInstance();
        $this->query = $query;
        $stmt = $pdo->prepare($this->query);
        $stmt->execute();
        $pdo = null;
    }
}
?>