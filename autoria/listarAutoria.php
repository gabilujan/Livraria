<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        h1 {
            color: #d138bd;
        }
        
        table {
            border-collapse: collapse;
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
        }
        
        th, td {
            text-align: center;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #d138bd;
            color: white;
        }
        
        button {
            border-radius: 3rem;
            width: 8rem;
            height: 3rem;
            background-color: #d138bd;
            border: none;
            margin-top: 20px;
            font-size: 14px;
        }
        
        a {
            text-decoration: none;
            color: white;
        }
        
        a:hover {
            text-decoration: underline;
            color: #C71585;
        }
        
        .container {
            text-align: center;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <h1>Autoria</h1>
            <br><br>
            <?php
            include_once 'autoria.php';
            $c = new autoria();
            $esc_bd = $c->listar();
            ?>
            <table>
                <tr>
                    <th>Cod autor</th>
                    <th>Cod livro</th>
                    <th>Data</th>
                    <th>Editora</th>
                </tr>
                <?php
                foreach ($esc_bd as $pro_mostrar) {
                    echo "<tr>";
                    echo "<td>" . $pro_mostrar[0] . "</td>";
                    echo "<td>" . $pro_mostrar[1] . "</td>";
                    echo "<td>" . $pro_mostrar[2] . "</td>";
                    echo "<td>" . $pro_mostrar[3] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <br><br>
            <button><a href="menu.html">Voltar</a></button>
        </div>
    </section>
</body>
</html>
