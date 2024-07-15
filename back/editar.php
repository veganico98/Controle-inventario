<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CET02/config/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['id'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais tarde!</div>"];
} elseif (empty($dados['nome'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} elseif (empty($dados['salario'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo salário!</div>"];
} elseif (empty($dados['idade'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo idade!</div>"];
} else {
    $query_itens = "UPDATE usuarios SET nome=:nome, salario=:salario, idade=:idade WHERE id=:id";
    $edit_itens = $conn->prepare($query_itens);
    $edit_itens->bindParam(':nome', $dados['nome']);
    $edit_itens->bindParam(':salario', $dados['salario']);
    $edit_itens->bindParam(':idade', $dados['idade']);
    $edit_itens->bindParam(':id', $dados['id']);

    if ($edit_itens->execute()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não editado com sucesso!</div>"];
    }
}

echo json_encode($retorna);
