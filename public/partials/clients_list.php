<table class="table table-striped table-hover" id="client-list">
    <thead>
        <tr>
            <th>
                <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                </span>
            </th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Matricula</th>
            <th>Turma</th>
            <th>Bloqueado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php $clients = \App\Client::all() ?>
        <?php foreach ($clients as $key => $client) : ?>
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input class="chk-client" type="checkbox" id="checkbox<?=$client->id_client?>" name="clients[]" value="<?=$client->id_client?>">
                    <label for="checkbox<?=$client->id_client?>"></label>
                </span>
            </td>
            <td><?=$client->name?></td>
            <td><?=$client->email?></td>
            <td><?=$client->cpf_cnpj?></td>
            <td><?=$client->phone?></td>
            <td><?=$client->nr_matricula?></td>
            <td><?=$client->nr_turma?></td>
            <td><?=$client->user->isActive() ? 'Não' : 'Sim' ?></td>
            <td>
                <a href="#editEmployeeModal<?=$client->id_client?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <!-- <a href="#deleteEmployeeModal" onclick="return deleteClientByRowSelected(this);" data-backdrop="static" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> -->
            </td>
        </tr>

        <!-- Edit Modal HTML -->
        <div id="editEmployeeModal<?=$client->id_client?>" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                <form id="form-add" onsubmit="" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="id_client" value="<?=$client->id_client?>"/>

                        <div class="modal-header">
                            <h4 class="modal-title">Editar Cliente <?=$client->id_client?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nome</label>
                                <input name="name" value="<?=$client->name?>" autofocus type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="<?=$client->email?>"  type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input name="password" value=""  type="password" placeholder="************" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>CPF</label>
                                <input name="key" value="<?=$client->cpf_cnpj?>" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Telefone</label>
                                <input name="phone" value="<?=$client->phone?>" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Matricula</label>
                                <input name="nr_matricula" value="<?=$client->nr_matricula?>" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Turma</label>
                                <input name="nr_turma" value="<?=$client->nr_turma?>" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ativo</label>
                                <input type="checkbox" name="active" <?=$client->user->isActive() == 1 ? 'checked=checked' : ''?> value="1"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-success" value="Salvar">
                            <input type="hidden" name="form-action" value="client-update">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php endforeach; ?>
    </tbody>
</table>
<!-- <div class="clearfix">
    <div class="hint-text">Listando <b>5</b> de <b>25</b> registros</div>
    <ul class="pagination">
        <li class="page-item disabled"><a href="#">Anterior</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Próximo</a></li>
    </ul>
</div> -->