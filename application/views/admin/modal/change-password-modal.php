
<script>
    $(document).ready(function() {
        $('#changePassword').click(function() {
            $('#changePasswordModal').modal('show');
            $('#submit_button').click(function() {
                var new_password = $('#new_password').val();
                var new_password_conf = $('#new_password_conf').val();
                var old_password = $('#old_password').val();
                
                var err = false;
                
                // validate new password field
                var new_pass_message = '';
                if (isEmpty(new_password)) {
                    new_pass_message = emptyMessage('New Password');
                    err = true;
                } else if (new_password.length < 7) {
                    new_pass_message = 'The New Password field must be at least 7 characters in length!';
                    err = true;
                } 
                $('.new_password').text(new_pass_message);
                
                // validate new password confirm field
                var new_pass_conf_message = '';
                if (isEmpty(new_password_conf)) {
                    new_pass_conf_message = emptyMessage('Confirm new Password!');
                    err = true;
                } else if (new_password != new_password_conf) {
                    new_pass_conf_message = 'Password confirm not match!';
                    err = true;
                }
                $('.new_password_conf').text(new_pass_conf_message);
                
                // validate old password
                var old_password_message = '';
                if (isEmpty(old_password)) {
                    old_password_message = emptyMessage('Old Password');
                    err = true;
                }
                $('.old_password').text(old_password_message);
                
                if (!err) {
                    $.ajax({
                        url : 'admin-change-password',
                        dataType : 'json',
                        type : 'post',
                        data : {
                            newPassword : new_password,
                            newPasswordConf : new_password_conf,
                            oldPassword : old_password
                        },
                        success : function(data) {
                            if (typeof data.success == 'undefined') {
                                $('.old_password_error').text(data.error);
                            } else {
                                $('#changePasswordModal').modal('hide');
                                $('.password_change_success').text(data.success);
                                var form = document.getElementById("changePasswordForm");
                                form.reset();
                            }
                        },
                        error : function(error) {
                        }
                    });
                }
            });
        });
        
        function isEmpty(str) {
            return (!str || 0 === str.length);
        }
        
        function emptyMessage(field) {
            return 'The '+ field + 'field is required';
        }
    });
</script>

<div class="modal fade" id="changePasswordModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Password Settings
            </div>
            <?php echo form_open('', array('id' => 'changePasswordForm'));?>
            <div class="modal-body">
                <div style="color: red" class="old_password_error"></div>
                <?php
                $for_new_pass = array(
                    'type' => 'password',
                    'name' => 'new_password',
                    'id' => 'new_password',
                    'class' => 'form-control'
                );
                ?>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <div style="color:red" class="new_password"></div>
                    <?php echo form_input($for_new_pass); ?>
                </div>
                
                <?php 
                $for_new_pass_conf = array(
                    'type' => 'password',
                    'name' => 'new_password_conf',
                    'id' => 'new_password_conf',
                    'class' => 'form-control'
                );
                ?>
                <div class="form-group">
                    <label for="new_password_conf">Confirm New Password</label>
                    <div style="color: red" class="new_password_conf"></div>
                    <?php echo form_input($for_new_pass_conf); ?>
                </div>
                <hr>
                
                <?php
                $for_old_pass = array(
                    'type' => 'password',
                    'name' => 'old_password',
                    'id' => 'old_password',
                    'class' => 'form-control'
                );
                ?>
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <div style="color: red" class="old_password"></div>
                    <?php echo form_input($for_old_pass); ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                $submit_button = array(
                    'id' => 'submit_button',
                    'class' => 'btn btn-primary',
                    'content' => 'Change'
                );
                echo form_button($submit_button);
                
                $cancel_button = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'Cancel'
                );
                echo form_button($cancel_button);
                ?>
            </div>
        </div>
    </div>
</div>
