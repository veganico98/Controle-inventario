<?php

// incluir conexao com o banco de dados
require_once $_SERVER["DOCUMENT_ROOT"] . "/CET02/config/conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
//$id = "1000";

if (!empty($id)) {
    $query_itens = "SELECT id, nome, salario, idade FROM usuarios WHERE id=:id LIMIT 1";
    $result_dados = $conn->prepare($query_itens);
    $result_dados->bindParam(':id', $id);
    $result_dados->execute();

    if (($result_dados) and ($result_dados->rowCount() != 0)) {
        $row_query = $result_dados->fetch(PDO::FETCH_ASSOC);
        $retorna = ['status' => true, 'dados' => $row_query];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
}
echo json_encode($retorna);
