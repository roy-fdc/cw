
            
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
                                    <span class="text-error"><?php echo form_error('firstname'); ?></span>
                                    <input type="text" name="firstname" id="admin-firstname" value="<?php echo set_value('firstname');?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="admin-lastname">Lastname</label>
                                    <span class="text-error"><?php echo form_error('lastname'); ?></span>
                                    <input type="text" name="lastname" id="admin-lastname" value="<?php echo set_value('lastname');?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="admin-username">Username</label>
                                    <span class="text-error"><?php echo form_error('username');?></span>
                                    <input type="text" name="username" id="admin-username" value="<?php echo set_value('username');?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="admin-password">Password</label>
                                    <span class="text-error"><?php echo form_error('password');?></span>
                                    <input type="text" name="password" id="admin-password" value="<?php echo set_value('password');?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="admin-password-conf">Password confirm</label>
                                    <span class="text-error"><?php echo form_error('password_confirm');?></span>
                                    <input type="text" name="password_confirm" id="admin-password-conf" value="<?php echo set_value('password_confirm');?>" class="form-control"/>
                                </div>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-default" type="reset">Clear</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>