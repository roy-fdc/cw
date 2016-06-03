
        
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
                    <span class="text-success"><?php echo $this->session->flashdata('success_profile_update');?></span>
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
                            <?php echo $this->session->flashdata('del_success'); ?>
                            <?php echo $this->session->flashdata('error'); ?>
                            <div class="panel-group" id="accordion">
                                <?php $gall_act = 1;?>
                                <?php $active_acor = $this->session->flashdata('accor_id'); ?>
                                <?php foreach($image_by_album as $row) { ?>
                                <div class="panel panel-primary">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['album_id']; ?>">
                                            <?php echo $row['album_name']; ?>
                                            <span class="badge" style="color:white; background-color: black"><?php echo (isset($row['images'])) ? count($row['images']) : 0;?></span>
                                        </a>
                                    </h4>
                                  </div>
                                  <div id="collapse<?php echo $row['album_id']; ?>" class="panel-collapse collapse <?php 
                                  if (isset($active_acor) && !empty($active_acor) && $active_acor == $row['album_id']) {
                                      echo 'in';
                                  } else if (!isset ($active_acor) && empty ($active_acor) && $gall_act == 1) {
                                      echo 'in';
                                  }
                                  ?>">
                                    <div class="panel-body">
                                        <div class="panel-body" style="background: #FFF">
                                            <?php
                                            if (isset($active_acor) && !empty($active_acor) && $active_acor == $row['album_id']) {
                                                echo $this->session->flashdata('success');
                                                echo $this->session->flashdata('add_error');
                                            } else if (!isset ($active_acor) && empty ($active_acor) && $gall_act == 1) {
                                                echo $this->session->flashdata('success');
                                            }
                                            ?>
                                            <a onclick="add_image(<?php echo $row['album_id'];?>)" class="btn btn-small btn-success">
                                                <span class="glyphicon glyphicon-plus"></span> Add image
                                            </a>
                                    
                                            <a onclick="update_album(<?php echo $row['album_id'];?>, '<?php echo $row['album_name'];?>')" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-pencil"></span> Update
                                            </a>
                                    
                                            <?php $btn_text = ($row['album_status'] == 0) ? 'Enable' : 'Disable'; ?>
                                            <?php $btn_type = ($row['album_status'] == 0) ? 'default' : 'warning'; ?>
                                            <?php $status_button = ($row['album_status'] == 0) ? 'ok-sign' : 'remove-sign'; ?>
                                            <a onclick="change_status(<?php echo $row['album_id'];?>, <?php echo $row['album_status'];?>)"  class="btn btn-<?php echo $btn_type;?>">
                                                <span class="glyphicon glyphicon-<?php echo $status_button;?>"></span>
                                                <?php echo $btn_text;?>
                                            </a>
                                            <a onclick="delete_album(<?php echo $row['album_id'];?>)" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-trash"></span>Delete
                                            </a>
                                    
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
                                    </div>
                                  </div>
                                </div>
                                <?php $gall_act++; ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
    </div>