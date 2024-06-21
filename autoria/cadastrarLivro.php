<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="icone.png" type="image/png">

<title>Cadastro de Livro</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }

    #container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    fieldset {
        border: 1px solid #ccc;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    legend {
        font-weight: bold;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
    }

    input[type="text"] {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-container {
        text-align: center;
    }

    button {
        padding: 0.5rem 2rem;
        background-color: #d138bd;
        border: none;
        border-radius: 3rem;
        color: white;
        cursor: pointer;
    }

    button a {
        text-decoration: none;
        color: white;
    }
</style>
<script language=javascript>

function blokletras(keypress)
{
    if(keypress>=48 && keypress<=57)
    {
        return true;
    }
    else{
        return false;
    }
}

</script>
</head>
<body>
<div id="container">
    <form name="cliente" method="POST" action="">
        <fieldset>
            <legend><b>Dados do Produto:</b></legend>
            <label for="txtCod_livro">Código livro:</label>
            <input name="txtCod_livro" type="text" placeholder="0" onkeypress="return blokletras(window.event.keyCode)" required>
            <label for="txtname">Nome do livro:</label>
            <input name="txtname" type="text" placeholder="Nome" required>
            <label for="txtsobrenome">Categoria:</label>
            <input name="txtsobrenome" type="text" placeholder="Categoria" required>
            <label for="txtemail">ISBN:</label>
            <input name="txtemail" type="text" placeholder="0" onkeypress="return blokletras(window.event.keyCode)" required>
            <label for="txtnasc">Idioma:</label>
            <input name="txtnasc" type="text" placeholder="Idioma" required>
            <label for="txtpag">Quantidade de páginas:</label>
            <input name="txtpag" type="text" placeholder="0" onkeypress="return blokletras(window.event.keyCode)" required>
        </fieldset>
        <div class="btn-container">
            <button name="btnenviar" type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </div>
    </form>

    <?php
    extract($_POST, EXTR_OVERWRITE);
    if(isset($btnenviar)) {
        include_once 'livro.php';
        $pro = new livro();
        $pro->setCod_livro($txtCod_livro);
        $pro->setTitulo($txtname);
        $pro->setCategoria($txtsobrenome);
        $pro->setISBN($txtemail);
        $pro->setIdioma($txtnasc);
        $pro->setQtdePag($txtpag);
        echo "<h3>" . $pro->salvar() . "</h3>";
    }
    ?>

    <div class="btn-container">
        <button><a href="menu.html">Voltar</a></button>
    </div>
</div>
</body>
</html>
