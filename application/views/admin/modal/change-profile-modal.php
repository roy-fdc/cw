
<script>
    $(document).ready(function() {
        $('.changeProfile').click(function() {
            $('#changeProfileModal').modal('show');
            $('#update').click(function(){
                var res_field = document.getElementById("profile_image").value;
                var extension = res_field.substr(res_field.lastIndexOf('.') + 1).toLowerCase();
                var allowedExtensions = ['jpg', 'jpeg', 'png'];
                
                if (isEmpty(res_field)) {
                    $('.errorMessage').text('Please browse your profile image!');
                } else if (res_field.length > 0) {
                    if (allowedExtensions.indexOf(extension) === -1) {
                        $('.errorMessage').text('Invalid file Format. Only ' + allowedExtensions.join(', ') + ' are allowed!');
                    } else {
                        var fd = new FormData(document.getElementById("fileinfo"));
                        fd.append("label", "WEBUPLOAD");
                        $.ajax({
                          url: "<?php echo base_url();?>admin/admin-change-profile",
                          type: "POST",
                          data: fd,
                          processData: false,  // tell jQuery not to process the data
                          contentType: false   // tell jQuery not to set contentType
                        }).done(function( data ) {
                            if (typeof data.error == 'undefined') {
                                location.reload();
                            } else {
                                $('#errorMessage').text(data.error);
                            }
                        });
                        return false;
                    }
                }
                
            })
        });
    });
    
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
    
    function isEmpty(str) {
        return (!str || 0 === str.length);
    }
        
</script>

<div class="modal fade" id="changeProfileModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Change Profile Picture
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-4 text-center">
                        <div class="alert alert-info text-center">
                            <img src="<?php echo base_url().'images/users/'.$account->admin_image; ?>" id="output" class="img-responsive img-circle" style="height: 100px; width: 100px; border: 1px solid black"/> 
                        </div>
                    </div>
                    <?php
                    echo form_open('', array('id' => 'fileinfo', 'name' => 'fileinfo', 'onsubmit' => 'return submitForm()'));
                    ?>
                    <div class="col-xs-6">
                        <?php 
                        $for_profile = array(
                            'type' => 'file',
                            'name' => 'profile_image',
                            'id' => 'profile_image',
                            'accept' => 'image/*',
                            'onchange' => 'loadFile(event)',
                            'class' => 'form-control'
                        );
                        echo form_input($for_profile);
                        ?>
                        <div class="errorMessage" style="color: red"></div>
                        <br>
                        <?php
                        $submit_button = array(
                            'class' => 'btn btn-primary',
                            'id' => 'update',
                            'content' => 'Update Profile'
                        );
                        echo form_button($submit_button);
                        ?>
                    </div>
                    <?php 
                    echo form_close();
                    ?>
                </div>
                
                 
            </div>
            <div class="modal-footer">
                <?php
                    $cancel_button = array(
                        'class' => 'btn btn-default',
                        'content' => 'Cancel',
                        'data-dismiss' => 'modal'
                    );
                    echo form_button($cancel_button);
                ?>
            </div>
        </div>
    </div>
</div>
