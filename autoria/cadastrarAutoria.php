<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="icone.png" type="image/png">

<title>Cadastro de Autoria</title>
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

    input[type="text"],
    input[type="date"] {
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
            <legend><b>Dados da Autoria:</b></legend>
            <label for="txtCod_autor">Código autor:</label>
            <input name="txtCod_autor" type="text" placeholder="0" onkeypress="return blokletras(window.event.keyCode)" required>
            <label for="txtCod_livro">Código livro:</label>
            <input name="txtCod_livro" type="text" placeholder="0" onkeypress="return blokletras(window.event.keyCode)" required>
            <label for="txtemail">Editora:</label>
            <input name="txtemail" type="text" placeholder="Editora" required>
            <label for="txtnasc">Data lançamento: </label>
            <input name="txtnasc" type="date" required>
        </fieldset>
        <div class="btn-container">
            <button name="btnenviar" type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </div>
    </form>

    <?php
    extract($_POST, EXTR_OVERWRITE);
    if(isset($btnenviar)) {
        include_once 'autoria.php';
        $pro = new autoria();
        $pro->setCod_autor($txtCod_autor);
        $pro->setCod_livro($txtCod_livro);
        $pro->setDataLancamento($txtnasc);
        $pro->setEditora($txtemail);
        echo "<h3>" . $pro->salvar() . "</h3>";
    }
    ?>

    <div class="btn-container">
        <button><a href="menu.html">Voltar</a></button>
    </div>
</div>
</body>
</html>
