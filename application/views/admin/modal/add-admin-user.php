<div class="modal fade" id="addAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Add Admin user</div>
            <div class="modal-body">
                <?php echo form_open(); ?>
                <div class="form-group">
                    <label for="admin-firstname">Firstname</label>
                    
                    <input type="text" name="firstname" id="admin-firstname" value="<?php echo set_value('firstname');?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="admin-lastname">Lastname</label>
                    <input type="text" name="lastname" id="admin-lastname" value="<?php echo set_value('lastname');?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="admin-username">Username</label>
                    <input type="text" name="username" id="admin-username" value="<?php echo set_value('username');?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="admin-password">Password</label>
                    <input type="text" name="password" id="admin-password" value="<?php echo set_value('password');?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="admin-password-conf">Password confirm</label>
                    <input type="text" name="password_confirm" id="admin-password-conf" value="<?php echo set_value('password_confirm');?>" class="form-control"/>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>