<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
	
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
<form name="cliente" method = "POST" action = "">

    <div class="main-login">
        <div class="left-login">
            <h1> Faça o login <br> para acessar o banco autoria </h1>
            <img src="signup.svg" class="left-login-image" alt="imagem animada">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Login</h1>
                <div class="textfield">
                    <label for="usuario">Usuário</label>
                    <input type="text" name="usuario" placeholder="usuario">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="senha"
                    maxlength = "3" 
                    onkeypress="return blokletras(window.event.keyCode)">
                </div>
                <input type="submit" class="btn-login" name = "btnentrar" value = "Entrar">  
            </div>
        </div>
</form>

</body>
<?php
    extract($_POST, EXTR_OVERWRITE);
    if(isset($btnentrar))
    {
        include_once 'usuario.php';
        $u = new Usuario();
        $u->setUsu($usuario);
        $u->setSenha($senha);
        $pro_bd=$u->logar();

        $existe = false;
        foreach($pro_bd as $pro_mostrar)
        {
            $existe=true;
            ?>
           
            <?php
            header("location:menu.html");
        }
        if($existe==false)
        {
            header("location:loginInvalido.html");
        }
    }
    ?>
</html>

