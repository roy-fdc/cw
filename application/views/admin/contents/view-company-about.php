

            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                    <span class="text-success"><?php echo $this->session->flashdata('success_profile_update');?></span>
                    <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
                    <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo strtoupper($panel_title); ?>
                        </div>
                        <div class="panel-body">
                            <?php echo $about->description;?>
                            <br>
                            <hr>
                            <a href="<?php echo base_url().'admin/admin-company-edit/'.$about->id;?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Update</a>
                            <?php $btn_text = ($about->status == 0) ? 'Enable' : 'Disable'; ?>
                            <?php $btn_type = ($about->status == 0) ? 'success' : 'warning'; ?>
                            <?php $status_icon = ($about->status == 0) ? 'ok-sign' : 'remove-sign'; ?>
                            <a onclick="change_status(<?php echo $about->id;?>, <?php echo $about->status;?>)"  class="btn btn-<?php echo $btn_type;?>">
                                <span class="glyphicon glyphicon-<?php echo $status_icon;?>"></span>
                                <?php echo $btn_text;?>
                            </a>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>