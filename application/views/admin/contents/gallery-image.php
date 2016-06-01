
        
<style>
    #close{
		    display:block;
		    float:right;
		    width:30px;
		    height:29px;
		    background:url(http://www.htmlgoodies.com/img/registrationwelcome/close_icon.png) no-repeat center center;
		}
</style>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <?php echo form_open(base_url().'admin/admin-album-add-exec'); ?>
                            <?php echo form_error('album', '<span class="text-error">', '</span>'); ?>
                            <div class="input-group">
                                <?php 
                                $textfield = array(
                                    'type' => 'text',
                                    'name' => 'album',
                                    'id' => 'album',
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter album name here!'
                                );
                                echo form_input($textfield);
                                ?>
                                <div class="input-group-btn">
                                    <?php
                                    $button = array(
                                        'class' => 'btn btn-primary',
                                        'type' => 'submit',
                                        'content' => 'Add Album Name'
                                    );
                                    echo form_button($button);
                                    ?>
                                </div>
                            </div>
                            <?php echo form_close();?>
                        </div>
                        <div class="panel-body">
                            <?php echo $this->session->flashdata('success');?>
                            <?php echo $this->session->flashdata('error'); ?>
                            <?php if (!empty($image_by_album)) { ?>
                            <?php foreach($image_by_album as $row) { ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <?php echo $row['album_name']; ?>
                                    <span class="badge" style="color:white; background-color: black"><?php echo (isset($row['images'])) ? count($row['images']) : 0;?></span>
                                </div>
                                <div class="panel-body">
                                    <a onclick="add_image(<?php echo $row['album_id'];?>)" class="btn btn-small btn-success">Add image</a>
                                    
                                    <a onclick="update_album(<?php echo $row['album_id'];?>, '<?php echo $row['album_name'];?>')" class="btn btn-primary">Update</a>
                                    
                                    <?php $btn_text = ($row['album_status'] == 0) ? 'Enable' : 'Disable'; ?>
                                    <?php $btn_type = ($row['album_status'] == 0) ? 'default' : 'warning'; ?>
                                    <a onclick="change_status(<?php echo $row['album_id'];?>, <?php echo $row['album_status'];?>)"  class="btn btn-<?php echo $btn_type;?>">
                                    <?php echo $btn_text;?>
                                    </a>
                                    
                                    <a onclick="delete_album(<?php echo $row['album_id'];?>)" class="btn btn-danger">Delete</a>
                                    
                                    <hr>
                                    <?php if (isset($row['images'])) { ?>
                                    <?php foreach($row['images'] as $img) { ?>

                                    <div class="col-md-2"> 

                                        <a class="thumbnail">
                                        <img src="<?php echo base_url().'images/galleries/thumb/'.$img['image_name'];?>" class="img-responsive adminImg" style="height:155px;"/>
                                        </a>
                                        <a style="cursor:pointer"onclick="delete_item(<?php echo $img['image_id']; ?>)">
                                            <div class="delete">x</div>
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                                <div class="panel-footer"></div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
    </div>