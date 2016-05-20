
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
                Add Image
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
                    'name' => 'image',
                    'class' => 'form-control',
                    'placeholder' => 'Browse image'
                );
                echo form_input($image);
                ?>
            </div>
            <div class="modal-footer">
                <?php
                $button = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => 'Add'
                );
                echo form_button($button);
                ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>