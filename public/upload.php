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


?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">

    <form method="post" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" class="dropzone" id="my-awesome-dropzone">
        <!-- <input type="file" name="file" /> -->
    </form>

</div>
	
<?php include_once 'partials/footer.php'; ?>