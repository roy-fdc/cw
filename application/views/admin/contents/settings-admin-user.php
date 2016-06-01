
<div class="row">
    <div class="col-sm-12">
        <?php echo $this->session->flashdata('error'); ?>
        <?php echo $this->session->flashdata('success');?>
        <div class="panel panel-default">
            <div class="panel-heading">Settings</div>
            <?php echo form_open(base_url().'admin/admin-settings-exec');?>
            <div class="panel-body">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <?php
                    echo form_error('firstname', '<div class="text-error">', '</div>');
                    $acount_firstname = array(
                        'type' => 'text',
                        'name' => 'firstname',
                        'id' => 'firstname',
                        'class' => 'form-control',
                        'value' => $admin_info->admin_firstname
                    );
                    echo form_input($acount_firstname);
                    ?>
                </div>
                
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <?php
                    echo form_error('lastname', '<div class="text-error">', '</div>');
                    $account_lastname = array(
                        'type' => 'text',
                        'name' => 'lastname',
                        'id' => 'lastname',
                        'class' => 'form-control',
                        'value' => $admin_info->admin_lastname
                    );
                    echo form_input($account_lastname);
                    ?>
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <?php
                    echo form_error('username', '<div class="text-error">', '</div>');
                    $account_username = array(
                        'type' => 'text',
                        'name' => 'username',
                        'id' => 'username',
                        'class' => 'form-control',
                        'value' => $admin_info->admin_username
                    );
                    echo form_input($account_username);
                    ?>
                </div>
            </div>
            <div class="panel-footer">
                <?php 
                $submit_button = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => 'Submit'
                );
                echo form_button($submit_button);
                ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

</div>