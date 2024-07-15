<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CET02/config/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['nome'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} elseif (empty($dados['salario'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo salário!</div>"];
} elseif (empty($dados['idade'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo idade!</div>"];
} else {
    $query_itens = "INSERT INTO usuarios (nome, salario, idade) VALUES (:nome, :salario, :idade)";
    $cad_itens = $conn->prepare($query_itens);
    $cad_itens->bindParam(':nome', $dados['nome']);
    $cad_itens->bindParam(':salario', $dados['salario']);
    $cad_itens->bindParam(':idade', $dados['idade']);
    $cad_itens->execute();

    if ($cad_itens->rowCount()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
    }
}

echo json_encode($retorna);
