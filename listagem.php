<html >
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container">
    <h1>Alunos</h1>
    <p>
        <a href="novo.html" class="btn btn-primary">Novo Aluno</a>
    </p>

    <?php
        require_once 'consulta.php';
        require_once 'inclusao.php';

    if (isset($_POST["matricula"])) {
        $msg = incluir($_POST["matricula"], $_POST["nome"], $_POST["entrada"]);
        echo ("<hr/>".$msg."<hr/>");
    }
    $alunos = obterAlunos();

    ?>

    <table class="table">
        <tr class="table-dark">
            <td>
                Matricula
            </td>
            <td>
                Nome
            </td>
            <td>
                Entrada
            </td>
        </tr>
        <?php
        foreach ($alunos as $obj) {
            echo "<tr><td>$obj->matricula</td>";
            echo "<td>$obj->nome</td>";
            echo "<td>$obj->entrada</td></tr>";
        }
        ?>
    </table>

</body>
</html>

