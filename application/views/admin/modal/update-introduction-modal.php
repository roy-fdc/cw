
<!-- script for update introductions -->
<script>
    function update_introduction(id, name, introduction){
        $('#update_intro_modal').modal('show');
        $('#ids').val(id);
        $('#name').val(name);
        $('#introduction').val(introduction);
    }
</script>
<!-- script for update introductions ends here -->

<!-- modal for update introductions --->
<div class="modal fade" id="update_intro_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
            </div>
            <?php echo form_open(base_url().'admin/admin-intro-update-exec'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <?php
                    $iid = array(
                        'name' => 'id',
                        'id' => 'ids',
                        'type' => 'hidden'
                    );
                    echo form_input($iid);
                    ?>
                    <label for="name">Name</label>
                    <?php
                    $iname = array(
                        'type' => 'text',
                        'name' => 'name',
                        'id' => 'name',
                        'class' => 'form-control',
                        'required' =>  true
                    );
                    echo form_input($iname);
                    ?>
                </div>
                <div class="form-group">
                    <label for="introduction">Introduction</label>
                    <?php 
                    $intro = array(
                        'name' => 'introduction',
                        'id' => 'introduction',
                        'rows' => 5,
                        'cols' => 10,
                        'class' => 'form-control',
                        'required' => true
                    );
                    echo form_textarea($intro);
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php 
                $submit_btn = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => 'Update'
                );
                echo form_button($submit_btn);
                $reset_btn = array(
                    'type' => 'reset',
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'Cancel'
                );
                echo form_button($reset_btn);
                ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- modal for update introductions ends here -->