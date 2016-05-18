

            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                    <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All admin user
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Last Login</th>
                                    <th>Last Logout</th>
                                </tr>
                                
                                <?php foreach($all_admin as $row) { ?>
                                <tr>
                                    <td><?php echo ucwords(strtolower($row->admin_firstname));?></td>
                                    <td><?php echo ucwords(strtolower($row->admin_lastname));?></td>
                                    <td><?php echo (!empty($row->admin_lastlogin))? $row->admin_lastlogin : '.......';?></td>
                                    <td><?php echo (!empty($row->admin_lastlogout))? $row->admin_lastlogout : '.......';?></td>
                                </tr>
                                <?php } ?>
                                
                            </table>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>