

            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                    <span class="text-success"><?php echo $this->session->flashdata('success_profile_update');?></span>
                    <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
                    <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-th-list"></span> View Benefits
                        </div>
                        <div class="panel-body">
                            <?php echo $all_benefits;?>
                        </div>
                        
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>