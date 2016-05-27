<!DOCTYPE html>
<html lang="en" ng-app="fupApp">
  <head>
      <title>Timber</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="css/mystyle.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
      <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>
      <link rel="stylesheet" type="text/css" href="css/slicknav.css">
      <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/gallery/screen.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css//gallery/ngGallery.css">
         
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-sanitize.js"></script>  
      <script type="text/javascript" src="<?php echo base_url();?>js/user/modernizr.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>js/user/responsee.js"></script>  
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
      <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
      <script type="text/javascript" src="js/camera.min.js"></script>
      <script type="text/javascript" src="js/myscript.js"></script>
      <script src="js/sorting.js" type="text/javascript"></script>
      <script src="js/jquery.isotope.js" type="text/javascript"></script>
      
      <script src="js/api/pageApp.js" type="text/javascript"></script>
    
      <script>
      $(document).ready(function(){
         $('#camera_wrap_1').camera({
            transPeriod: 500,
            time: 3000,
            height: '490px',
            thumbnails: false,
            pagination: true,
            playPause: false,
            loader: false,
            navigation: false,
            hover: false
         });
      });
      </script>
      
   </head>
   <body ng-controller="fupController as ctrl">