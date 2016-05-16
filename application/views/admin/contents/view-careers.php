<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin Careers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                    <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <?php foreach ($all_careers as $row) { ?>
                                <li class="<?php echo ($row->id == 1) ? 'active' :'';?>">
                                    <a data-toggle="tab" href="#<?php echo $row->id;?>"><?php echo $row->career_title;?></a>
                                </li>
                                <?php } ?>
                            </ul>

                            <div class="tab-content">
                                <?php foreach ($all_careers as $row) { ?>
                                <div id="<?php echo $row->id;?>" class="tab-pane fade in <?php echo ($row->id == 1) ? 'active' :'';?>">
                                    
                                    <img src="<?php echo base_url().'image/careers/'.$row->career_image;?>" class="image-circle"/> <br><br>
                                    <a href="<?php echo base_url().'admin/admin-edit-career/'.$row->id;?>" class="btn btn-primary">Update</a>
                                    <button class="btn btn-warning">Disable</button>
                                    <button class="btn btn-danger">Delete</button>
                                    <br>
                                    <h3><?php echo $row->career_title;?></h3>
                                    <p><?php echo $row->career_description;?></p>
                                    <?php echo $row->career_detail;?>
                                </div>
                                <?php } ?>
                            </div>
                            
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>