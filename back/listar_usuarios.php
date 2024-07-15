<?php

// Incluir a conexao com o banco de dados
require_once $_SERVER["DOCUMENT_ROOT"] . "/CET02/config/conexao.php";

//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

// Lista de colunas da tabela
$colunas = [
    0 => 'id',
    1 => 'nome',
    2 => 'salario',
    3 => 'idade'
];

// Obter a quantidade de registros no banco de dados
$query_qnt = "SELECT COUNT(id) AS qnt_itens FROM usuarios";

// Acessa o IF quando ha paramentros de pesquisa   
if (!empty($dados_requisicao['search']['value'])) {
    $query_qnt .= " WHERE id LIKE :id ";
    $query_qnt .= " OR nome LIKE :nome ";
    $query_qnt .= " OR salario LIKE :salario ";
    $query_qnt .= " OR idade LIKE :idade ";
}
// Preparar a QUERY
$result_qnt = $conn->prepare($query_qnt);
// Acessa o IF quando ha paramentros de pesquisa   
if (!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $result_qnt->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_qnt->bindParam(':salario', $valor_pesq, PDO::PARAM_STR);
    $result_qnt->bindParam(':idade', $valor_pesq, PDO::PARAM_STR);
}
// Executar a QUERY responsável em retornar a quantidade de registros no banco de dados
$result_qnt->execute();
$row_qnt = $result_qnt->fetch(PDO::FETCH_ASSOC);

// Recuperar os registros do banco de dados
$query_dados = "SELECT id, nome, salario, idade FROM usuarios ";

// Acessa o IF quando ha paramentros de pesquisa   
if (!empty($dados_requisicao['search']['value'])) {
    $query_dados .= " WHERE id LIKE :id ";
    $query_dados .= " OR nome LIKE :nome ";
    $query_dados .= " OR salario LIKE :salario ";
    $query_dados .= " OR idade LIKE :idade ";
}

// Ordenar os registros
$query_dados .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";

// Preparar a QUERY
$result_query = $conn->prepare($query_dados);
$result_query->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$result_query->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);

// Acessa o IF quando ha paramentros de pesquisa   
if (!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_query->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $result_query->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_query->bindParam(':salario', $valor_pesq, PDO::PARAM_STR);
    $result_query->bindParam(':idade', $valor_pesq, PDO::PARAM_STR);
}
// Executar a QUERY
$result_query->execute();

// Ler os registros retornado do banco de dados e atribuir no array 
while ($row_query = $result_query->fetch(PDO::FETCH_ASSOC)) {
    extract($row_query);
    $registro = [];
    $registro[] = $id;
    $registro[] = $nome;
    $registro[] = $salario;
    $registro[] = $idade;
    $registro[] = "<button type='button' id='$id' class='btn btn-outline-primary btn-sm' onclick='visualizarDetalhe($id)'>Visualizar</button> <button type='button' id='$id' class='btn btn-outline-warning btn-sm' onclick='editItem($id)'>Editar</button> <button type='button' id='$id' class='btn btn-outline-danger btn-sm' onclick='apagarItem($id)'>Apagar</button>";
    $dados[] = $registro;
}

//Cria o array de informações a serem retornadas para o Javascript
$resultado = [
    "draw" => intval($dados_requisicao['draw']), // Para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($row_qnt['qnt_itens']), // Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($row_qnt['qnt_itens']), // Total de registros quando houver pesquisa
    "data" => $dados // Array de dados com os registros retornados da tabela usuarios
];

// Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);
