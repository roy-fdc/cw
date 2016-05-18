
<!-- script for change item status -->
<script>
    function change_status(id, status){
        $('#disable').modal('show');
        var text;
        if (status ==  0) {
            text = 'Enable';
        } else {
            text = 'Disable';
        }
        $('.title_ac').html(text);
        $('#id').val(id);
        $('#status').val(status);
    }
</script>
<!-- script for change item status ends here -->

<!-- modal confirmation for change status -->
<div class="modal fade" id="disable">
    <div class="modal-dialog">
        <?php echo form_open(base_url().'admin/'.$action_status_link);?>
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <span class="title_ac"></span> ?
                <input type="hidden" id="id" name="id"/>
                <input type="hidden" id="status" name="status"/>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ok</button>
                <button data-dismiss="modal" class="btn btn-default">Cancel</button>
            </div>
        </div>
        <?php echo form_close();?>
    </div>
</div>
<!-- modal confirmation for change status ends here -->
