<div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="msgAlertErroCad"></span>

                <form method="POST" id="form-cadastro">
                    <div class="row mb-3">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>

                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="salario" class="col-sm-2 col-form-label">Salário</label>
                        <div class="col-sm-10">
                            <input type="text" name="salario" class="form-control" id="salario" placeholder="Salário">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="idade" class="col-sm-2 col-form-label">Idade</label>
                        <div class="col-sm-10">
                            <input type="number" name="idade" class="form-control" id="idade" placeholder="Idade">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-success btn-sm" value="Cadastrar">Cadastrar</button>
                </form>

            </div>
        </div>
    </div>
</div>