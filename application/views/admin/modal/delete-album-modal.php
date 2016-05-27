

<script>
    function delete_album(id) {
        $('#delete_album_modal').modal('show');
    }
</script>

<div class="modal fade" id="delete_album_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
                Delete this gallery album ?
                <?php echo form_open(base_url().'admin/delete'); ?>
                <?php 
                    
                ?>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>