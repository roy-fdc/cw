    <div class="col-md-10">
        <h2>Admin user</h2>
        <div class="breadcrumb">
            <div class="row">
                <div class="col-sm-6">
                    <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Last Login</th>
                                    <th>Last Logout</th>
                                </tr>
                                <tr>
                                <?php foreach($all_admin as $row) { ?>
                                    <td><?php echo ucwords(strtolower($row->admin_firstname));?></td>
                                    <td><?php echo ucwords(strtolower($row->admin_lastname));?></td>
                                    <td><?php echo (!empty($row->admin_lastlogin))? $row->admin_lastlogin : '.......';?></td>
                                    <td><?php echo (!empty($row->admin_lastlogout))? $row->admin_lastlogout : '.......';?></td>
                                <?php } ?>
                                </tr>
                            </table>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>