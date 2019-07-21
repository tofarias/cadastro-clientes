<?php require_once 'partials/header.php'; ?>

<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

<?php
	use Illuminate\Database\Capsule\Manager as Capsule;
	use \App\Client as Client;
	use \App\User as User;
    use \App\Auth as Auth;
    
    $ds          = DIRECTORY_SEPARATOR;  //1
    
    $storeFolder = 'uploads';   //2
    
    if (!empty($_FILES)) {
        
        $tempFile = $_FILES['file']['tmp_name'];          //3             
        
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
        
        $targetFile =  $targetPath. $_FILES['file']['name'];  //5
    
        move_uploaded_file($tempFile,$targetFile); //6
        
	}
	
    if( isset($_POST['file-delete']) )
	{
		if( file_exists( getenv('UPLOAD_DIR').'/'.$_POST['file-delete'] ) ){
			unlink( getenv('UPLOAD_DIR').'/'.$_POST['file-delete'] );
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

<div class="container">

    <form method="post" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" class="dropzone" id="my-awesome-dropzone">
        <!-- <input type="file" name="file" /> -->
    </form>

    <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Arquivos</b></h2>
					</div>
					<div class="col-sm-6">
					</div>
                </div>
            </div>

        <table class="table table-striped table-hover" id="client-list">
        <thead>
            <tr>
                <th>Arquivo</th>
                <th style="text-align:center">Ação</th>
            </tr>
        </thead>
        <tbody>
        <?php $entries = scandir( getenv('UPLOAD_DIR') );
            $filelist = array();
            foreach($entries as $entry) {
            #if (strpos($entry, "te") === 0) {
                
                if( file_exists('uploads/'.$entry) && !is_dir($entry) ){
                    $filelist[] = $entry;
                }
                
            #}
                
            }
        ?>
        <?php foreach ($filelist as $key => $file) : ?>
        <tr>
            <td> <a href="<?=getenv('UPLOAD_DIR').'/'.$file?>" target="_blank"><?=$file?></td>
            <td style="text-align:center"> 
                <form name="<?=$key?>" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                    <a href="#" onclick="submitDelete(this);" class="delete"><i class="material-icons" data-toggle="tooltip" title="Remover">&#xE872;</i></a>
                    <input type="hidden" name="file-delete" value="<?=$file?>" />
                </form>
            </td>
        </tr>


        <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>
	
<?php include_once 'partials/footer.php'; ?>