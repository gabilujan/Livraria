<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Century Gothic", sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
        }
        h1 {
            color: #d138bd;
        }
        fieldset {
            width: 80%;
            max-width: 800px;
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
        }
        legend {
            background-color: #d138bd;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .button-container button {
            border-radius: 3rem;
            width: 5rem;
            height: 2rem;
            border: none;
            margin-top: 2rem;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }
        .button-container .alterar-button {
            background-color: #d138bd; /* Rosa */
        }
        .button-container .voltar-button {
            background-color: #d138bd; /* Cor da legenda */
        }
        .button-container button:hover {
            text-decoration: underline;
            color: #C71585;
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
    <div class="container">
        <h1>Alteração de Autoria Cadastrados</h1>
        <fieldset>
            <legend><b>Alterar</b></legend>
            <?php
            $txtid=$_POST["txtid"];
            include_once 'autoria.php';
            $p = new autoria();
            $p->setCod_autor($txtid);
            $pro_bd=$p->alterar();
            ?>
            <form name="cliente2" method="POST" action="">
                <?php
                foreach($pro_bd as $pro_mostrar)
                {
                ?>
                <input type="hidden" name="txtid" size="5" value='<?php echo $pro_mostrar[0]?>' required>
                <b><?php echo "Cod autor: ". $pro_mostrar[0]; ?></b>
                <br><br>
                <b><?php echo "Cod_livro: " ;?></b>
                <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1]?>' onkeypress="return blokletras(window.event.keyCode)" required>
                <br><br>
                <b><?php echo "Data: " ;?></b>
                <input type="text" name="txtestoq" size="25" value='<?php echo $pro_mostrar[2]?>' required>
                <br><br>
                <b><?php echo "Editora: " ;?></b>
                <input type="text" name="txteditora" size="10" value='<?php echo $pro_mostrar[3]?>' required>
                <br><br><br>
                <?php
                }
                ?>
                <div class="button-container">
                    <button class="alterar-button" name="btnalterar" type="submit">Alterar</button>
                    <button class="voltar-button"><a href="menu.html" style="color: white; text-decoration: none;">Voltar</a></button>
                </div>
            </form>
        </fieldset>
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnalterar))
        {
            include_once 'autoria.php';
            $pro = new autoria();
            $pro->setCod_livro($txtnome);
            $pro->setDataLancamento($txtestoq);
            $pro->setEditora($txteditora);
            $pro->setCod_autor($txtid);
            echo "<br><br><h3>". $pro->alterar2() . "</h3>";
            header("location:consultar_altAutoria.php");      
        }
        ?>
    </div>
</body>
</html>
