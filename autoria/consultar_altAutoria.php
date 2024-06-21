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

        input[type="submit"], input[type="reset"], input[type="button"] {
            border: none;
            border-radius: 3rem;
            padding: 10px 20px;
            font-size: 14px;
            background-color: #d138bd;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover {
            background-color: #C71585;
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
<form name="cliente" method = "POST" action = "consultar_alt2Autoria.php">
<fieldset>
            <legend>Informe o Codigo da Autoria desejado:</legend>
            <p>Codigo: <input name="txtid" type="text" maxlength="30" placeholder="Codigo autoria" onkeypress="return blokletras(window.event.keyCode)" required></p>
            <br>
            <input name="btnenviar" type="submit" value="Consultar">
            <input name="limpar" type="reset" value="Limpar">
            <input type="button" value="Voltar" onclick="window.location.href='menu.html'">
        </fieldset>
    </form>

    </body>
</html>