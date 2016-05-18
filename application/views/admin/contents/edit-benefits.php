

    <!-- /.row -->
    <div class="row">
        <div class="col-sm-8">
            <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
            <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <?php //echo form_open(base_url().'admin/admin-add-career-exec');?>
                <form name="my_form" method="post" enctype="multipart/form-data" onSubmit="document.my_form.details.value = $('#editor').html()" action="<?php echo base_url();?>admin/admin-edit-benefit-exec">
                <div class="panel-body">
                    <input type="hidden" name="id" value="<?php echo $benefit->id;?>"/>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <span class="text-error"><?php echo form_error('title');?></span>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $benefit->benefit_title;?>"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <span class="text-error"><?php echo form_error('description');?></span>
                        <textarea name="description" id="description" class="form-control"><?php echo $benefit->benefit_description;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <span class="text-error"><?php echo form_error('image');?></span>
                        <input type="file" name="image" id="image" class="form-control"/>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>