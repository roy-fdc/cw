

    <!-- /.row -->
    <div class="row">
        <div class="col-sm-12">
            <span class="text-success"><?php echo $this->session->flashdata('success_profile_update');?></span>
            <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
            <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-pencil"></span> Edit Benefit
                </div>
                <?php echo form_open_multipart(base_url().'admin/admin-edit-benefit-exec', array('name' => 'my_form')); ?>
                <div class="panel-body">
                    <?php
                    $for_benefit_id = array(
                        'type' => 'hidden',
                        'name' => 'id',
                        'value' => $benefit->id
                    );
                    echo form_input($for_benefit_id);
                    ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <span class="text-error"><?php echo form_error('title');?></span>
                        <?php
                        $for_benefit_title = array(
                            'type' => 'text',
                            'name' => 'title',
                            'id' => 'title',
                            'class' => 'form-control',
                            'value' => $benefit->benefit_title
                        );
                        echo form_input($for_benefit_title);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <span class="text-error"><?php echo form_error('description');?></span>
                        <?php 
                        $for_benefit_desc = array(
                            'name' => 'description',
                            'id' => 'description',
                            'class' => 'form-control',
                            'value' => $benefit->benefit_description
                        );
                        echo form_textarea($for_benefit_desc);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <span class="text-error"><?php echo form_error('image');?></span>
                        <?php
                        $for_benefit_image = array(
                            'type' => 'file',
                            'name' => 'image',
                            'id' => 'image',
                            'class' => 'form-control'
                        );
                        echo form_input($for_benefit_image);
                        ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <?php
                    $submit_button = array(
                        'class' => 'btn btn-primary',
                        'type' => 'submit',
                        'content' => '<span class="glyphicon glyphicon-pencil"></span> Update'
                    );
                    echo form_button($submit_button);
                    ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>