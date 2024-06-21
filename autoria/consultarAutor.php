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
</head>
<body>
    <form name="cliente" method="POST" action="">
        <fieldset>
            <legend>Informe o nome do autor desejado:</legend>
            <p>Nome: <input name="txtid" type="text" maxlength="30" placeholder="Nome Autor" required></p>
            <br>
            <input name="btnenviar" type="submit" value="Consultar">
            <input name="limpar" type="reset" value="Limpar">
            <input type="button" value="Voltar" onclick="window.location.href='menu.html'">
        </fieldset>
    </form>

    <?php
       extract($_POST, EXTR_OVERWRITE);
       if(isset($btnenviar))
       {
            include_once 'autor.php';
            $p = new autor();
            $p->setNomeAutor($txtid. '%');
            $pro_bd = $p->consultar();

            if (count($pro_bd) > 0) {
                foreach ($pro_bd as $pro_mostrar) {
                    echo "<br><b>Cod Autor: " . $pro_mostrar[0] . "</b> &nbsp; &nbsp;&nbsp;";
                    echo "<b>Nome autor: " . $pro_mostrar[1] . "</b> &nbsp;&nbsp;&nbsp;";
                    echo "<b>Sobrenome: " . $pro_mostrar[2] . "</b>&nbsp;&nbsp;&nbsp;";
                    echo "<b>Email: " . $pro_mostrar[3] . "</b>&nbsp;&nbsp;&nbsp;";
                    echo "<b>Nascimento: " . $pro_mostrar[4] . "</b>&nbsp;&nbsp;&nbsp;";
                }
            } else {
                echo "<p>Nenhum autor encontrado.</p>";
            }
        }
    ?>
</body>
</html>