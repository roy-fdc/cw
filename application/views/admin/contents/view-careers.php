

            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                    <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
                    <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <?php $tabsC = 0 ; ?>
                                <?php foreach ($all_careers as $row) { ?>
                                <li class="<?php echo ($tabsC == 0) ? 'active' :'';?>">
                                    <a data-toggle="tab" href="#<?php echo $row->id;?>"><?php echo $row->career_title;?></a>
                                </li>
                                <?php $tabsC++; ?>
                                <?php } ?>
                            </ul>

                            <div class="tab-content">
                                <?php $controls = 0; ?>
                                <?php foreach ($all_careers as $row) { ?>
                                <div id="<?php echo $row->id;?>" class="tab-pane fade in <?php echo ($controls == 0) ? 'active' :'';?>">
                                    <br>
                                    <img src="<?php echo base_url().'images/careers/'.$row->career_image;?>" class="image-circle"/> <br><br>
                                    <a href="<?php echo base_url().'admin/admin-edit-career/'.$row->id;?>" class="btn btn-primary">Update</a>
                                    <?php $btn_text = ($row->career_status == 0) ? 'Enable' : 'Disable'; ?>
                                    <?php $btn_type = ($row->career_status == 0) ? 'success' : 'warning'; ?>
                                    <a onclick="change_status(<?php echo $row->id;?>, <?php echo $row->career_status;?>)"  class="btn btn-<?php echo $btn_type;?>">
                                        <?php echo $btn_text;?>
                                    </a>
                                    <a onclick="delete_item(<?php echo $row->id;?>)" class="btn btn-danger">Delete</a>
                                    <br>
                                    <h3><?php echo $row->career_title;?></h3>
                                    <p><?php echo $row->career_description;?></p>
                                    <?php echo $row->career_detail;?>
                                </div>
                                <?php $controls++;?>
                                <?php } ?>
                            </div>
                            
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>