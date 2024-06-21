<?php

include_once 'conectar.php';

//  1 - Atributos
class livro
{
    private $Cod_livro;
    private $Titulo;
    private $Categoria;
    private $ISBN;
    private $Idioma;
    private $QtdePag;

    private $conn;

//  2 - os getts e setters


public function getCod_livro()
{
    return $this -> nome;

}

public function setCod_livro($name)
{
    $this->nome = $name;

}

public function getTitulo()
{
    return $this -> cod;

}

public function setTitulo($codig)
{
    $this->cod = $codig;

}

public function getCategoria()
{
    return $this -> cat;

}

public function setCategoria($catego)
{
    $this->cat = $catego;

}

public function getISBN()
{
    return $this -> codigo;

}

public function setISBN($codigo)
{
    $this->codigo = $codigo;

}

public function getIdioma()
{
    return $this -> idioma;

}

public function setIdioma($idiomas)
{
    $this->idioma = $idiomas;

}


public function getQtdePag()
{
    return $this -> qtdePag;

}

public function setQtdePag($paginas)
{
    $this->qtdePag = $paginas;

}


function salvar()
{
    try{
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("insert into `livro`values (?,?,?,?,?,?)");
        @$sql->bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getTitulo(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getCategoria(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getISBN(), PDO::PARAM_STR);
        @$sql->bindParam(5, $this->getIdioma(), PDO::PARAM_STR);
        @$sql->bindParam(6, $this->getQtdePag(), PDO::PARAM_STR);

      
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
        $sql = $this->conn->prepare("delete from livro where Cod_livro = ?"); // informe o ? (parametro)
        @$sql -> bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);
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
        $sql = $this -> conn -> prepare("select * from livro where titulo like ?"); // informei o ? (parametro)
        @$sql -> bindParam(1, $this->getTitulo(), PDO::PARAM_STR); // definição do parametro
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
        $sql = $this -> conn -> prepare("select * from livro where Cod_livro = ?"); // informei o ? (parametro)
        @$sql -> bindParam(1, $this -> getCod_livro(), PDO::PARAM_STR); // definição do parametro
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
        $sql = $this->conn->prepare("update livro set Titulo = ?, Categoria = ?, ISBN = ?, Idioma = ?, QtdePag = ? where Cod_livro = ?");
        @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
        @$sql-> bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
        @$sql-> bindParam(3, $this->getISBN(), PDO::PARAM_STR);
        @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
        @$sql-> bindParam(5, $this->getQtdePag(), PDO::PARAM_STR);
        @$sql-> bindParam(6, $this->getCod_livro(), PDO::PARAM_STR);
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
        $sql = $this -> conn -> query("select * from `livro` order by Cod_livro"); 
        
        $sql -> execute();
        return $sql -> fetchAll();
        $this -> conn = null;

    }
    catch(PDOExcepion $exc)
    {
        echo "Erro ao Executar consulta." . $exc -> getMessage();
    }
}

} // Encerramento da classe produto
?>