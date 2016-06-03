
<script>
    function add_image(id) {
        $('#addImage').modal('show');
        $('#album_id').val(id);
    }
</script>
    
<div class="modal fade" id="addImage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Add Images
            </div>
            <?php echo form_open_multipart(base_url().'admin/admin-add-gallery-exec');?>
            <div class="modal-body">
                <?php
                $album = array(
                    'type' => 'hidden',
                    'name' => 'album_id',
                    'id' => 'album_id'
                );
                echo form_input($album);
                $image = array(
                    'type' => 'file',
                    'name' => 'image[]',
                    'class' => 'form-control',
                    'placeholder' => 'Browse image',
                    'required' => '',
                    'multiple' => ''
                );
                echo form_input($image);
                ?>
            </div>
            <div class="modal-footer">
                <?php
                $submit_button = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => '<span class="glyphicon glyphicon-plus"></span> Add'
                );
                echo form_button($submit_button);
                
                $cancel_button = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => '<span class="glyphicon glyphicon-off"></span> Cancel'
                );
                echo form_button($cancel_button);
                ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>