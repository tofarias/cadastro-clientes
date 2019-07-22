        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <script src="../js/dropzone.js"></script>

        <script>

            Dropzone.options.myAwesomeDropzone = {
            init: function () {
                    this.on("complete", function (file) {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        window.location.href = "upload.php";
                    }
                    });
                }
            };

            function submitDelete(el)
            {

                $(el).parent().submit();
            }

            function deleteAppendClients(el)
            {
                var $chks = $('table#client-list').find(':checkbox.chk-client:checked').clone();
                
                $(el).append( $chks.css('display', 'none') );
            }

            function deleteCheckSelectedClient(el)
            {
                if( !$(':checkbox.chk-client').is(':checked') ){
                    
                    this.event.stopPropagation();
                    alert('Selecione pelo menos um cliente!');                    
                    return false;
                }

                return true;
            }

            $(document).ready(function(){

                // Activate tooltip
                $('[data-toggle="tooltip"]').tooltip();

                // Select/Deselect checkboxes
                var checkbox = $('table tbody input[type="checkbox"]');
                $("#selectAll").click(function(){
                    if(this.checked){
                        checkbox.each(function(){
                            this.checked = true;
                        });
                    } else{
                        checkbox.each(function(){
                            this.checked = false;
                        });
                    }
                });
                checkbox.click(function(){
                    if(!this.checked){
                        $("#selectAll").prop("checked", false);
                    }
                });
            });
        </script>

    </body>
</html>