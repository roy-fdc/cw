
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-8">
            <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
            <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <?php echo form_open_multipart(base_url().'admin/admin-edit-value-exec');?>
                <div class="panel-body">
                    <?php
                    $for_id = array(
                        'type' => 'hidden',
                        'name' => 'id',
                        'value' => $value->id
                    );
                    echo form_input($for_id);
                    ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <?php 
                        echo form_error('title', '<div class="text-error">', '</div>');
                        $for_title = array(
                            'type' => 'text',
                            'name' => 'title',
                            'id' => 'title',
                            'class' => 'form-control',
                            'value' => $value->value_title
                        );
                        echo form_input($for_title);
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
                            'value' => $value->value_description
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
                        'content' => 'Update'
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
