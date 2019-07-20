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
            <th>Bloqueado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php $clients = \App\Client::all() ?>
        <?php /*echo '<pre>'; print_r($clients); echo '</pre>';*/ ?>
        <?php foreach ($clients as $key => $client) : ?>
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input class="chk-client" type="checkbox" id="checkbox<?=$client->id_client?>" name="clients[]" value="<?=$client->id_client?>">
                    <label for="checkbox<?=$client->id_client?>"></label>
                </span>
            </td>
            <td><?=$client->name?></td>
            <td><?=$client->user->email?></td>
            <td><?=$client->cpf_cnpj?></td>
            <td><?=$client->phone?></td>
            <td><?=$client->nr_turma?></td>
            <td><?= $client->user->isActive() ? 'Não' : 'Sim' ?></td>
            <td>
                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <a href="#deleteEmployeeModal" onclick="return deleteCheckSelectedClient(this);" data-backdrop="static" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="clearfix">
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
</div>