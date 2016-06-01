

<script>
    function delete_album(id) {
        $('#delete_album_modal').modal('show');
        $('#al_id').val(id);
    }
</script>

<div class="modal fade" id="delete_album_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <?php echo form_open(base_url().'admin/admin-album-delete'); ?>
            <div class="modal-body">
                Are you sure you want to delete this album ?
                <?php 
                $for_album_id = array(
                    'type' => 'hidden',
                    'name' => 'id',
                    'id' => 'al_id'
                );
                echo form_input($for_album_id);
                ?>
            </div>
            <div class="modal-footer">
                <?php 
                $submit_button = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => 'Yes'
                );
                echo form_button($submit_button);
                $cancel_button = array(
                    'data-dismiss' => 'modal',
                    'class' => 'btn btn-default',
                    'content' => 'No'
                );
                echo form_button($cancel_button);
                ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>