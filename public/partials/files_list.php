

        <table class="table table-striped table-hover" id="client-list">
        <thead>
            <tr>
                <th><b>Nome do Arquivo</b></th>
                <?php if ( \App\Auth::user()->isAdmin() ) : ?>
                <th style="text-align:center">Ação</th>
                <?php endif; ?>
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
            <?php if ( \App\Auth::user()->isAdmin() ) : ?>
            <td style="text-align:center"> 
                <form name="<?=$key?>" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                    <a href="#" onclick="submitDelete(this);" class="delete"><i class="material-icons" data-toggle="tooltip" title="Remover">&#xE872;</i></a>
                    <input type="hidden" name="file-delete" value="<?=$file?>" />
                </form>
            </td>
            <?php endif; ?>
        </tr>


        <?php endforeach; ?>
            </tbody>
        </table>