<?php

include_once 'conectar.php';

class autoria
{
    private $Cod_autor;
    private $Cod_livro;
    private $DataLancamento;
    private $Editora;
    
    private $conn;


public function getCod_autor()
{
    return $this -> codc;

}

public function setCod_autor($code)
{
    $this->codc = $code;

}

public function getCod_livro()
{
    return $this -> nome;

}

public function setCod_livro($name)
{
    $this->nome = $name;

}

public function getDataLancamento()
{
    return $this -> cod1;

}

public function setDataLancamento($c1od)
{
    $this->cod1 = $c1od;

}

public function getEditora()
{
    return $this -> cod2;

}

public function setEditora($c2od)
{
    $this->cod2 = $c2od;

}

function salvar()
{
    try{
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("insert into `autoria` values (?, ?,?, ?)");
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getCod_livro(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getDatalancamento(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getEditora(), PDO::PARAM_STR);
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
        $sql = $this->conn->prepare("delete from autoria where Cod_autor = ?"); // informe o ? (parametro)
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
        $sql = $this -> conn -> prepare("select * from autoria where Editora like ?"); // informei o ? (parametro)
        @$sql -> bindParam(1, $this->getEditora(), PDO::PARAM_STR); // definição do parametro
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
        $sql = $this -> conn -> prepare("select * from autoria where Cod_autor = ?"); // informei o ? (parametro)
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
        $sql = $this->conn->prepare("update autoria set Cod_livro = ?, Datalancamento = ?, Editora = ? where Cod_autor = ?");
        @$sql-> bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);
        @$sql-> bindParam(2, $this->getDataLancamento(), PDO::PARAM_STR);
        @$sql-> bindParam(3, $this->getEditora(), PDO::PARAM_STR);
        @$sql-> bindParam(4, $this->getCod_autor(), PDO::PARAM_STR);
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
        $sql = $this -> conn -> query("select * from autoria order by Cod_autor"); 
        
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