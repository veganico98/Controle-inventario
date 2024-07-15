<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CET02/config/conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//$id = "";
if (!empty($id)) {
    $query_itens = "DELETE FROM usuarios WHERE id=:id";
    $result_dados = $conn->prepare($query_itens);
    $result_dados->bindParam(":id", $id, PDO::PARAM_INT);

    if ($result_dados->execute()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário apagado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não apagado com sucesso!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não apagado com sucesso!</div>"];
}

echo json_encode($retorna);
