


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url();?>admin/homepage"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-user-add"><i class="glyphicon glyphicon-plus"></i> Add Admin User </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-user-view">
                                        <i class="glyphicon glyphicon-list"></i> View Admin User
                                    </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-road"></i> Careers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-add-career"><i class="glyphicon glyphicon-plus"></i> Add Careers </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-view-career"><i class="glyphicon glyphicon-list"></i> Careers List </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"></i> Teams<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-add-team"><i class="glyphicon glyphicon-plus"></i> Add Team </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-view-team"><i class="glyphicon glyphicon-list"></i> Teams List </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-glyphicon glyphicon-cutlery"></i> Benefits<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-add-benefit"><i class="glyphicon glyphicon-plus"></i> Add Benefits </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-view-benefit"><i class="glyphicon glyphicon-list"></i> Benefits List </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-glyphicon glyphicon-info-sign"></i> About <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-company/about"><i class="glyphicon glyphicon-chevron-right"></i> Company Details </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-company/vision"><i class="glyphicon glyphicon-chevron-right"></i> Vision </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-company/mission"><i class="glyphicon glyphicon-chevron-right"></i> Mission </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-glyphicon glyphicon-hand-right"></i> Values <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-add-values"><i class="glyphicon glyphicon-plus"></i> Add values </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/admin-view-value"><i class="glyphicon glyphicon-list"></i> Values List </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url();?>admin/admin-image-slide"><i class="glyphicon glyphicon-glyphicon glyphicon-film"></i> Slide Images</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url();?>admin/admin-gallery"><i class="glyphicon glyphicon-glyphicon glyphicon-hand-right"></i> Gallery </a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url();?>admin/admin-introduction"><i class="glyphicon glyphicon-glyphicon glyphicon-film"></i> Page Introduction</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $page_header;?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
