
<!DOCTYPE html>

<html>

<head>

    <style>

        h1 {
            
            color: #d138bd;
        }
        table {

            border-collapse: collapse;
            width: 100%;

        }

        th, td {

            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {

            background-color: #d138bd;
            color: white;
        }


        button {

            border-radius: 3rem;
            width: 5rem;
            height: 2rem;
            background-color: #d138bd;
            border: none;
            margin-top: 2rem;
            margin-left: 48rem;
        }

        a {

            text-decoration: none;
            color: white;

        }


        a:hover {

            text-decoration: underline;
            color: #C71585;

        }

    </style>
</head>

<body>

    <section>

        <center><font face="Century Gothic" size="4"><h1>Autor</h1></font></center>

        <br><br>

        <?php

        include_once 'autor.php';

        $a = new autor();
        $esc_bd = $a->listar();

        ?>

        <table>

            <tr>

                <th>Código</th>

                <th>Nome</th>

                <th>Sobrenome</th>

                <th>Email</th>

                <th>Nascimento</th>

            </tr>

            <?php

            if (is_array($esc_bd)) {

                foreach ($esc_bd as $pro_mostrar) {

                    ?>

                    <tr>

                        <td><?php echo $pro_mostrar[0]; ?></td>

                        <td><?php echo $pro_mostrar[1]; ?></td>

                        <td><?php echo $pro_mostrar[2]; ?></td>

                        <td><?php echo $pro_mostrar[3]; ?></td>

                        <td><?php echo $pro_mostrar[4]; ?></td>

                    </tr>

                <?php

                }

            }

            ?>

        </table>

        <br><br>

        <button><a href="menu.html">Voltar</a></button>

    </section>

</body>

</html>