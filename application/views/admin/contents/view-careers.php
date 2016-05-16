   
<style>
    .image-circle {
    border-radius: 50% !important;
    border: 5px solid orange;
}</style>

<div class="col-md-10">
        <h2>Admin Careers</h2>
        <div class="breadcrumb">
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
        </div>
    </div>