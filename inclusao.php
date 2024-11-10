<?php

require_once 'conexao.php';

function incluir($matricula, $nome, $entrada) {
    global $conexao, $usuario, $senha;
    $msg = "";

    try{
        $pdo = new PDO($conexao, $usuario, $senha, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $consulta = "INSERT INTO alunos (matricula, nome, entrada) VALUES (?, ?, ?)";
        $preparacao = $pdo->prepare($consulta);
        $preparacao->execute([$matricula, $nome, $entrada]);
        $msg = "Aluno incluido com sucesso!";
    } catch(PDOException $e) {
        $msg = "Erro ao incluir aluno: " . $e->getMessage();
    } finally {
        if ($pdo) {
            $pdo = null;
        }
    }
    return $msg;
}

?>