<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>CET INVENTARIO</title>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/CET02/includes/assets-links.php"; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/CET02/public/css/inventario.css">

    <style>
        .links_topo {
            padding-top: 10px;
            margin-bottom: 10px;
            /* background-color: #0a0a0a */
        }

        #logout_btn {
            border: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            text-align: start;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/CET02/includes/header.php"; ?>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/CET02/views/controle-inventario/front/lista.php'; ?>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/CET02/views/controle-inventario/front/modalCadastro.php'; ?>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/CET02/views/controle-inventario/front/modalEditar.php'; ?>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/CET02/views/controle-inventario/front/modalVisualizar.php'; ?>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/CET02/includes/assets-scripts.php"; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/CET02/public/js/controle-inventario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>