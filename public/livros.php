<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }
        .table, th, td{
            border: 1px solid black;
            padding: 10px;
            background-color: white;
        }
        .table{
            border-spacing: 5px;
        }
    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Bibliófilo's</h1>

        <h2>Livros</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $titulo = 'titulo';
        $autor = 'autor';
        $classificacao = 'classificacao';
        $publicacao = 'publicacao';
        $categoria = 'categoria';
        $editora = 'editora';
        $paginas = 'paginas';
        $idioma = 'idioma';
        $capa = 'capa';
        

        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $titulo .
            '     , ' . $autor .
            '     , ' . $classificacao .
            '     , ' . $publicacao .
            '     , ' . $categoria .
            '     , ' . $editora .
            '     , ' . $paginas .
            '     , ' . $idioma .
            '     , ' . $capa .


            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM livros';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }

        $cabecalho =
            '<table>' .
            '    <tr>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . $titulo . '</th>' .
            '        <th>' . $autor . '</th>' .
            '        <th>' . $classificacao . '</th>' .
            '        <th>' . $publicacao . '</th>' .
            '        <th>' . $categoria . '</th>' .
            '        <th>' . $editora . '</th>' .
            '        <th>' . $paginas . '</th>' .
            '        <th>' . $idioma . '</th>' .
            '        <th>' . $capa . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                /* TODO-4: Adicione a tabela os novos registros. */
                echo '<td>' . $registro[$titulo] . '</td>' .
                    '<td>' . $registro[$autor] . '</td>' .
                    '<td>' . $registro[$classificacao] . '</td>' .
                    '<td>' . $registro[$publicacao] . '</td>' .
                    '<td>' . $registro[$categoria] . '</td>' .
                    '<td>' . $registro[$editora] . '</td>' .
                    '<td>' . $registro[$paginas] . '</td>' .
                    '<td>' . $registro[$idioma] . '</td>' .
                    '<td>' . $registro[$capa] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>