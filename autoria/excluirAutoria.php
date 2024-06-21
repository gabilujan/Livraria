<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Century Gothic', sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            padding: 20px;
        }

        fieldset {
            border: 2px solid #d138bd;
            padding: 20px;
            width: 50%;
            margin: auto;
        }

        legend {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="reset"], button {
            border: none;
            border-radius: 3rem;
            padding: 10px 20px;
            font-size: 14px;
            background-color: #d138bd;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover, input[type="reset"]:hover, button:hover {
            background-color: #C71585;
        }

        button a {
            text-decoration: none;
            color: white;
        }

        h3 {
            color: #d138bd;
            margin-top: 20px;
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
    <center><font face="Century Gothic" size="3"><b></b></center>
    <br>
    <font size="4">

    <form name="cliente" method="POST" action="">
        <fieldset id="a">
            <legend><b> Informe o Código do autor desejado: </b></legend>
            <p>Codigo autor: <input name="txtid" type="text" size="20" maxlength="5" placeholder="Codigo autor"  onkeypress="return blokletras(window.event.keyCode)" required></p>
            <br><br>
            <center>
                <input name="btnenviar" type="submit" value="Excluir">
                <input name="limpar" type="reset" value="Limpar">
                <button><a href="menu.html">Voltar</a></button>
            </center>
        </fieldset>
    </form>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {

            include_once 'autoria.php';
            
            $p = new autoria();
            $p->setCod_autor($txtid);
     
            echo "<h3>" . $p->exclusao() . "</h3>";
            
        }
    ?>
</body>
</html>