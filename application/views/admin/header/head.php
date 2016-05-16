<!DOCTYPE html>
<html>
  <head>
    <!-- set page title -->
    <title><?php echo (isset($pagetitle))? $pagetitle : 'Administrator';?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'css/bootstrap.min.css';?>" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url().'css/admin-style.css';?>" rel="stylesheet">
    
    <!-- for SYSIWYG FORM -->
    <link href="<?php echo base_url();?>js/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/external/jquery.hotkeys.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/external/google-code-prettify/prettify.js"></script>
    <link href="<?php echo base_url();?>css/wysiwyg.css" rel="stylesheet">
    <script src="<?php echo base_url();?>js/bootstrap-wysiwyg.js"></script>
    <style>
        input {
            height: 35px !important;
        }
    </style>
  </head>
  <body>
  	

