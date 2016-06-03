
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-12">
            <span class="text-success"><?php echo $this->session->flashdata('success_profile_update');?></span>
            <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
            <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-pencil"></span> Edit Teams
                </div>
                <?php echo form_open_multipart(base_url().'admin/admin-edit-team-exec');?>
                <div class="panel-body">
                    <?php
                    $for_id = array(
                        'type' => 'hidden',
                        'name' => 'id',
                        'value' => $team->id
                    );
                    echo form_input($for_id);
                    ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <?php 
                        echo form_error('name', '<div class="text-error">', '</div>');
                        $for_name = array(
                            'type' => 'text',
                            'name' => 'name',
                            'id' => 'name',
                            'class' => 'form-control',
                            'value' => $team->team_name
                        );
                        echo form_input($for_name);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <?php 
                        echo form_error('position', '<div class="text-error">', '</div>');
                        $for_position = array(
                            'type' => 'text',
                            'name' => 'position',
                            'id' => 'position',
                            'class' => 'form-control',
                            'value' => $team->team_position
                        );
                        echo form_input($for_position);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <?php 
                        echo form_error('description', '<div class="text-error">', '</div>');
                        $for_description = array(
                            'name' => 'description',
                            'id' => 'description',
                            'class' => 'form-control',
                            'value' => $team->team_description
                        );
                        echo form_textarea($for_description);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <?php 
                        echo form_error('image', '<div class="text-error">', '</div>');
                        $for_image = array(
                            'type' => 'file',
                            'name' => 'image',
                            'id' => 'image',
                            'class' => 'form-control'
                        );
                        echo form_input($for_image);
                        ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <?php 
                    $submit_btn = array(
                        'type' => 'submit',
                        'class' => 'btn btn-primary',
                        'content' => '<span class="glyphicon glyphicon-pencil"></span> Update'
                    );
                    echo form_button($submit_btn);
                    ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>