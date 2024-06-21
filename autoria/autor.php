<?php

include_once 'conectar.php';


class autor
{
    private $Cod_autor;
    private $NomeAutor;
    private $enderco;
    private $cidade;
    private $cod;

    private $conn;



public function getCod_autor()
{
    return $this -> Cod_autor;

}

public function setCod_autor($iCod_autor)
{
    $this->Cod_autor = $iCod_autor;

}

public function getNomeAutor()
{
    return $this -> NomeAutor;

}

public function setNomeAutor($name)
{
    $this->NomeAutor = $name;

}

public function getSobrenome()
{
    return $this -> Sobrenome;

}

public function setSobrenome($ende)
{
    $this->Sobrenome = $ende;

}

public function getEmail()
{
    return $this -> email;

}

public function setEmail($city)
{
    $this->email = $city;

}

public function getNasc()
{
    return $this -> Nasc;

}

public function setNasc($codig)
{
    $this->Nasc = $codig;

}

function salvar()
{
    try{
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("insert into `autor` values (?, ?,?, ?, ?)");
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getNomeAutor(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getSobrenome(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getEmail(), PDO::PARAM_STR);
        @$sql->bindParam(5, $this->getNasc(), PDO::PARAM_STR);
        if($sql->execute() ==1){
            return "Registro salvo com sucesso!";
        }
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao salvar o registro . " . $exc->getMessage();
    }
}

function exclusao()
{
    try{
        $this-> conn= new Conectar();
        $sql = $this->conn->prepare("delete from autor where Cod_autor = ?"); // informe o ? (parametro)
        @$sql -> bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
        if($sql->execute()==1)
        {
            return "Excluindo com sucesso";
        }
        else{
            return "Erro na exclusão!";
        } 
        $this->conn=null;
    }
    catch(PDOException $exc) {
        echo "Erro ao excluir . " . $exc->getMessage();
    }
}
function consultar()
{
    try
    {
        $this -> conn = new Conectar();
        $sql = $this -> conn -> prepare("select * from autor where NomeAutor like ?"); // informei o ? (parametro)
        @$sql -> bindParam(1, $this->getNomeAutor(), PDO::PARAM_STR); // definição do parametro
        $sql -> execute();
        return $sql -> fetchAll();
        $this -> conn = null;

    }
    catch(PDOExcepion $exc)
    {
        echo "Erro ao Executar consulta." . $exc -> getMessage();
    }
}

function alterar()
{
    try
    {
        $this -> conn = new Conectar();
        $sql = $this -> conn -> prepare("select * from autor where Cod_autor = ?"); // informei o ? (parametro)
        @$sql -> bindParam(1, $this -> getCod_autor(), PDO::PARAM_STR); // definição do parametro
        $sql -> execute();
        return $sql -> fetchAll();
        $this -> conn = null;

    }
    catch(PDOExcepion $exc)
    {
        echo "Erro ao Alterar." . $exc -> getMessage();
    }
}

function alterar2()
{
    try
    {
        $this-> conn =new Conectar();
        $sql = $this->conn->prepare("update autor set NomeAutor = ?, Sobrenome = ?, Email = ?, Nasc = ? where Cod_autor = ?");
      
        @$sql-> bindParam(1, $this->getNomeAutor(), PDO::PARAM_STR);
        @$sql-> bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
        @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR);
        @$sql-> bindParam(4, $this->getNasc(), PDO::PARAM_STR);
        @$sql-> bindParam(5, $this->getCod_autor(), PDO::PARAM_STR);
        if($sql->execute()==1){
            return "Registro alterado com sucesso!";
        }
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao salvar o registro. " . $exc->getMessage();
    }
}


function listar()
{
    try
    {
        $this -> conn = new Conectar();
        $sql = $this -> conn -> query("select * from autor order by Cod_autor");
        $sql -> execute();
        return $sql -> fetchAll();
        $this -> conn = null;

    }
    catch(PDOExcepion $exc)
    {
        echo "Erro ao Executar consulta." . $exc -> getMessage();
    }
}

} 
?>