


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
                        <span class="text-error"><?php echo form_error('username');?></span>
                        <input type="text" name="username" id="username" value="<?php echo set_value('username');?>" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <span class="text-error"><?php echo form_error('password');?></span>
                        <input type="text" name="password" id="password" class="form-control"/>
                    </div>
                    <button class="btn btn-success" type="submit">Login</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>