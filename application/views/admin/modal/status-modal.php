
<!-- script for change item status -->
<script>
    function change_status(id, status){
        $('#disable').modal('show');
        var text;
        var mess = 'hide';
        mess = (status ==  0) ? 'display' : mess;
        text = "Are you sure you want to "+ mess +" this content";
        $('.title_ac').html(text);
        $('#ids').val(id);
        $('#status').val(status);
    }
</script>
<!-- script for change item status ends here -->

<!-- modal confirmation for change status -->
<div class="modal fade" id="disable">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <?php echo form_open(base_url().'admin/'.$action_status_link);?>
            <div class="modal-body">
                <span class="title_ac"></span> ?
                <?php
                $for_id = array(
                    'type' => 'hidden',
                    'id' => 'ids',
                    'name' => 'id'
                ); 
                echo form_input($for_id);
                $for_status = array(
                    'type' => 'hidden',
                    'id' => 'status',
                    'name' => 'status'
                );
                echo form_input($for_status);
                ?>
            </div>
            <div class="modal-footer">
                <?php
                $submit = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => 'Yes'
                );
                echo form_button($submit);
                $cancel = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'No'
                );
                echo form_button($cancel); 
                ?>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- modal confirmation for change status ends here -->
