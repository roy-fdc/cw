<!DOCTYPE html>
<html lang="en-US" ng-app="fupApp">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title><?php echo (isset($page_title)) ? $page_title : 'FDC-INC SITE';?></title>
      
      <link rel="stylesheet" href="<?php echo base_url();?>css/user/user-css.css">
      <link rel="stylesheet" href="<?php echo base_url();?>css/user/components.css">
      <link rel="stylesheet" href="<?php echo base_url();?>css/user/responsee.css">
      <link rel="stylesheet" href="<?php echo base_url();?>owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo base_url();?>owl-carousel/owl.theme.css">
      
      
      <!-- CUSTOM STYLE -->  
      <link rel="stylesheet" href="<?php echo base_url();?>css/user/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>js/user/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>js/user/jquery-ui.min.js"></script>    
      <script type="text/javascript" src="<?php echo base_url();?>js/user/modernizr.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>js/user/responsee.js"></script> 

      <!-- angularjs !-->
      <script type="text/javascript" src="<?php echo base_url();?>js/angular-route.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>js/api/app.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>js/dirPagination.js"></script>
      <!-- end angularjs !-->
       
      <!--[if lt IE 9]>
	      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <![endif]-->
   </head>