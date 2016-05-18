

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
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($all_values as $row) { ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo base_url().'image/values/'.$row->value_image;?>" width="50" height="50"/>
                                    </td> 
                                    <td><?php echo $row->value_title;?></td>
                                    <td><?php echo $row->value_description;?></td>
                                    <td><?php echo ($row->value_status == 1) ? 'Active' : '..';?></td>
                                    <td>
                                        <a href="<?php echo base_url().'admin/admin-edit-value/'.$row->id;?>" class="btn btn-primary">Update</a>
                                        <?php $btn_text = ($row->value_status == 0) ? 'Enable' : 'Disable'; ?>
                                        <?php $btn_type = ($row->value_status == 0) ? 'success' : 'warning'; ?>
                                        <a onclick="change_status(<?php echo $row->id;?>, <?php echo $row->value_status;?>)"  class="btn btn-<?php echo $btn_type;?>">
                                        <?php echo $btn_text;?>
                                        </a>
                                        <a onclick="delete_item(<?php echo $row->id;?>)" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>


                                <?php } ?>
                            </table>
                        </div>
                        
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>