
        
            <div class="row">
                <div class="col-sm-12">
                    <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <?php echo form_open_multipart(base_url().'admin/admin-image-add-exec');?>
                                <div class="col-xs-8">
                                    <?php
                                    echo form_error('image', '<span class="text-error">', '</span>');
                                    $data = array(
                                        'name' => 'image',
                                        'id' => 'image',
                                        'type' => 'file',
                                        'class' => 'form-control'
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php $data = array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-primary',
                                        'content'=> 'Add Image'
                                    );
                                    echo form_button($data);
                                    ?>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php echo $all_images;?>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
    </div>