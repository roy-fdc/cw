
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4" style="margin-top: 150px">
            <div class="panel panel-default">
                <div class="panel-heading">Administrator Login</div>
                <div class="panel-body">
                    <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
                    <?php echo form_open(base_url().'admin/admin-login-exec'); ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <?php 
                        echo form_error('username', '<div class="text-error">', '</div>');
                        $username = array(
                            'type' => 'text',
                            'name' => 'username',
                            'id' => 'username',
                            'value' => set_value('username'),
                            'class' => 'form-control'
                        );
                        echo form_input($username);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <?php 
                        echo form_error('password', '<div class="text-error">', '</div>');
                        $password = array(
                            'type' => 'password',
                            'name' => 'password',
                            'id' => 'password',
                            'class' => 'form-control'
                        );
                        echo form_input($password);
                        ?>
                    </div>
                    <?php 
                    $submit = array(
                        'type' => 'submit',
                        'class' => 'btn btn-success',
                        'content' => 'Login'
                    );
                    echo form_button($submit);
                    ?>
                    <?php echo form_close(); ?>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>