
            
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                    <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add admin user
                        </div>
                        <?php echo form_open(base_url().'admin/admin-adduser-exec'); ?>
                        <div class="panel-body">
                                <div class="form-group">
                                    <label for="admin-firstname">Firstname</label>
                                    <?php 
                                    echo form_error('firstname', '<div class="text-error">', '</div>'); 
                                    $firstname = array(
                                        'type' => 'text',
                                        'name' => 'firstname', 
                                        'id' => 'admin-firstname',
                                        'value' => set_value('firstname'),
                                        'class' => 'form-control'
                                    );
                                    echo form_input($firstname);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="admin-lastname">Lastname</label>
                                    <?php 
                                    echo form_error('lastname', '<div class="text-error">', '</div>'); 
                                    $lastname = array(
                                        'type' => 'text',
                                        'name' => 'lastname', 
                                        'id' => 'admin-lastname',
                                        'value' => set_value('lastname'),
                                        'class' => 'form-control'
                                    );
                                    echo form_input($lastname);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="admin-username">Username</label>
                                    <?php 
                                    echo form_error('username', '<div class="text-error">', '</div>');
                                    $username = array(
                                        'type' => 'text',
                                        'name' => 'username',
                                        'id' => 'admin-username',
                                        'value' => set_value('username'),
                                        'class' => 'form-control'
                                    );
                                    echo form_input($username);
                                    ?>
                                 </div>
                                <div class="form-group">
                                    <label for="admin-password">Password</label>
                                    <?php 
                                    echo form_error('password', '<div class="text-error">', '</div>');
                                    $password = array(
                                        'type' => 'password',
                                        'name' => 'password',
                                        'id' => 'admin-password',
                                        'value' => set_value('password'),
                                        'class' => 'form-control'
                                    );
                                    echo form_input($password);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="admin-password-conf">Password confirm</label>
                                    <?php 
                                    echo form_error('password_confirm', '<div class="text-error">', '</div>');
                                    $password_conf = array(
                                        'type' => 'password',
                                        'name' => 'password_confirm',
                                        'id' => 'admin-password-conf',
                                        'value' => set_value('password_confirm'),
                                        'class' => 'form-control'
                                    );
                                    echo form_input($password_conf);
                                    ?>
                                </div>
                        </div>
                        <div class="panel-footer">
                            <?php
                            $submit = array(
                                'type' => 'submit',
                                'class' => 'btn btn-primary',
                                'content' => 'Submit'
                            );
                            echo form_button($submit);
                            $clear = array(
                                'type' => 'reset',
                                'class' => 'btn btn-default',
                                'content' => 'Clear'
                            );
                            echo form_button($clear);
                            ?>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>