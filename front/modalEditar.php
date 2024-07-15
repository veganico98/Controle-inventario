<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="msgAlertErroEdit"></span>

                <form method="POST" id="form-edit">
                    <input type="hidden" name="id" id="editid">

                    <div class="row mb-3">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" id="editnome" placeholder="Nome completo">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="salario" class="col-sm-2 col-form-label">Salário</label>
                        <div class="col-sm-10">
                            <input type="text" name="salario" class="form-control" id="editsalario" placeholder="Salário">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="idade" class="col-sm-2 col-form-label">Idade</label>
                        <div class="col-sm-10">
                            <input type="number" name="idade" class="form-control" id="editidade" placeholder="Idade">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-warning btn-sm" value="Salvar">Salvar</button>
                </form>

            </div>
        </div>
    </div>
</div>