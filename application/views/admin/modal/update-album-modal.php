

<script>
     function update_album(id, name){
         $('#update_album_modal').modal('show');
         $('#albumId').val(id);
         $('#album_name').val(name);
     }
</script>

<div class="modal fade" id="update_album_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <?php echo form_open(base_url().'admin/admin-album-update-exec');?>
            <div class="modal-body">
                <?php 
                $id = array(
                    'type' => 'hidden',
                    'name' => 'album_id',
                    'id' => 'albumId'
                ); 
                echo form_input($id);
                ?>
                <label for="album_name">Album Name</label>
                <?php
                $name = array(
                    'type' => 'text',
                    'name' => 'album_name',
                    'id' => 'album_name',
                    'class' => 'form-control',
                    'required' => true
                );
                echo form_input($name);
                ?>
            </div>
            <div class="modal-footer">
                <?php
                $submit_btn = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => 'Update'
                );
                $cancel_btn = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'Cancel'
                );
                echo form_button($cancel_btn);
                echo form_button($submit_btn);
                ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>