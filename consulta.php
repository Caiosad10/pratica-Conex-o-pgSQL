<?php

require_once 'conexao.php';

function obterAlunos() {
    global $conexao, $usuario, $senha;
    $alunos = [];
    
    try {
        $pdo = new PDO($conexao, $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $consulta = "SELECT * FROM alunos";
        $preparacao = $pdo->prepare($consulta);
        $preparacao->execute();
        $alunos = $preparacao->fetchALL(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        $alunos = [];
    } finally {
        if ($pdo) {
            $pdo = null;
        }
    }
    return $alunos;
}

?>