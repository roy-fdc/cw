

<script>
    function delete_career(id) {
        $('#delete_career_modal').modal('show');
        $('#career_id').val(id);
    }
</script>


<div class="modal fade" id="delete_career_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <?php echo form_open(base_url().'admin/admin-delete-career');?>
            <div class="modal-body">
                Are you sure want to delete this Career ?
                <input type="hidden" id="career_id" name="career_id"/>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>