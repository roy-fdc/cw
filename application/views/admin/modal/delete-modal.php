
<!-- script for delete item -->
<script>
    function delete_item(id) {
        $('#delete_modal').modal('show');
        $('#id').val(id);
    }
</script>
<!-- script for delete item ends here -->

<!-- modal for delete confirmation -->
<div class="modal fade" id="delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <?php echo form_open(base_url().'admin/'.$action_delete_link);?>
            <div class="modal-body">
                Are you sure want to delete this <?php echo $item_name;?> ?
                <?php
                $field = array(
                    'type' => 'hidden',
                    'id' => 'id',
                    'name' => 'id'
                );
                echo form_input($field);
                ?>
            </div>
            <div class="modal-footer">
                <?php
                $delete = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => '<span class="glyphicon glyphicon-trash"></span> Delete'
                );
                echo form_button($delete);
                $cancel = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'Cancel'
                );
                echo form_button($cancel);
                ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- modal for delete confirmation ends here -->