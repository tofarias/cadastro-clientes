<?php require_once 'partials/header.php'; ?>

<?php
	use Illuminate\Database\Capsule\Manager as Capsule;
	use \App\Client as Client;
	use \App\User as User;
	use \App\Auth as Auth;

	if( isset($_POST['form-action']) )
	{
		if( $_POST['form-action'] == 'client-delete' )
		{
			try {

				Capsule::beginTransaction();
			
				foreach ($_POST['clients'] as $key => $idClient) {

					$client = Client::find($idClient);

					if( $client instanceof Client ){

						$user = $client->user;
						$user->client()->delete();
						$user->delete();
					}
				}
			
				Capsule::commit();
			
			} catch (\Exception $e){
				$_SESSION['msg'] = $e->getMessage();
				Capsule::rollback();
			}
		}elseif( $_POST['form-action'] == 'client-add' )
		{
			try {

				Capsule::beginTransaction();

				$user = User::create([
					'key' => $_POST['key'], 
					'active' => !isset($_POST['active']) ? 0 : 1, 
					'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
				]);
				$xyz = $user->client()->create([
					'name' => $_POST['name'],
					'phone' => $_POST['phone'],
					'nr_matricula' => $_POST['nr_matricula'],
					'nr_turma' => $_POST['nr_turma'],
					'email' => $_POST['email'],
					'cpf_cnpj' => $_POST['key'],
				]);
			
				Capsule::commit();
			
			} catch (\Exception $e){
				$_SESSION['msg'] = $e->getMessage();
				Capsule::rollback();
			}
		}elseif( $_POST['form-action'] == 'client-update' )
		{
			try {

				Capsule::beginTransaction();

				$client = Client::find( $_POST['id_client'] );

				Client::where('id_client', $_POST['id_client'])->update([
					'name' => $_POST['name'],
					'phone' => $_POST['phone'],
					'nr_matricula' => $_POST['nr_matricula'],
					'nr_turma' => $_POST['nr_turma'],
					'email' => $_POST['email'],
					'cpf_cnpj' => $_POST['key']
				]);

				$userData = [
					'key' => $_POST['key'],
					'active' => !isset($_POST['active']) ? 0 : 1
				];

				if( !empty($_POST['password']) ){
					$password = trim($_POST['password']);
					$userData['password'] = password_hash ( $_POST['password'] , PASSWORD_BCRYPT );
				}
				

				$client->user()->update( $userData );
			
				Capsule::commit();
			
			} catch (\Exception $e){
				$_SESSION['msg'] = $e->getMessage();
				Capsule::rollback();
			}
		}
	}


?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}
	.modal form label {
		font-weight: normal;
	}
</style>

<?php if( isset($_SESSION['msg']) && !empty($_SESSION['msg']) ) : ?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Atenção!</strong> <?=$_SESSION['msg']?>.
	</div>
<?php endif; ?>

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<?php if ( Auth::user()->isAdmin() ) : ?>
						<h2>Gerenciar <b>Clientes</b></h2>
						<?php else : ?>
						<h2>Arquivos</h2>
						<?php endif; ?>
					</div>
					<div class="col-sm-6">
						<?php if ( Auth::user()->isAdmin() ) : ?>
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar Cliente</span></a>
						<a href="#deleteEmployeeModal" onclick="return deleteCheckSelectedClient(this);" class="btn btn-danger" data-toggle="modal" data-backdrop="static"><i class="material-icons">&#xE15C;</i> <span>Remover</span></a>
						<?php endif; ?>
					</div>
                </div>
            </div>

			<?php if( App\Auth::user()->isAdmin() ) : ?>
				<?php require_once('partials/clients_list.php'); ?>
			<?php else :?>
				<?php require_once('partials/files_list.php');?>
			<?php endif; ?>


        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form-add" onsubmit="" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
					<div class="modal-header">
						<h4 class="modal-title">Adicionar Cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nome</label>
							<input name="name" autofocus type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input name="email" type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Senha</label>
							<input name="password" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CPF</label>
							<input name="key" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Telefone</label>
							<input name="phone" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Matricula</label>
							<input name="nr_matricula" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Turma</label>
							<input name="nr_turma" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Ativo</label>
							<input type="checkbox" name="active" value="1" checked="checked"/>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Salvar">
						<input type="hidden" name="form-action" value="client-add">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form-delete" onsubmit="deleteAppendClients(this);" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
					<div class="modal-header">
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
						<input type="hidden" name="form-action" value="client-delete"/>
					</div>
				</form>
			</div>
		</div>
	</div>

	
<?php include_once 'partials/footer.php'; ?>