<!DOCTYPE html>
<!--[if IE 7 ]>   <html lang="en" class="ie7 lte8"> <![endif]--> 
<!--[if IE 8 ]>   <html lang="en" class="ie8 lte8"> <![endif]--> 
<!--[if IE 9 ]>   <html lang="en" class="ie9"> <![endif]--> 
<!--[if gt IE 9]> <html lang="en"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link href="<?php echo base_asset_url();?>images/favicon_32x32.ico" type="image/x-icon" rel="shortcut icon">
<!--[if lt IE 9 ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

<!-- iPad Settings -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
<meta name="viewport" content="user-scalable=no, initial-scale=1.0">
<!-- iPad End -->

<title>CleanSlate Admin</title>

<!-- iOS ICONS -->
<link rel="apple-touch-icon" href="touch-icon-iphone.html" />
<link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.html" />
<link rel="apple-touch-icon" sizes="114x114" href="touch-icon-iphone4.html" />
<link rel="apple-touch-startup-image" href="touch-startup-image.html">
<!-- iOS ICONS END -->

<!-- STYLESHEETS -->

<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/reset.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/grids.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/style.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/jquery.uniform.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/forms.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/themes/lightblue/style.css" />

<!--[if lt IE 9]>
<link rel="stylesheet" media="screen" href="css/ie.css" />
<![endif]-->

<style type = "text/css">
    #loading-container {position: absolute; top:50%; left:50%;}
    #loading-content {width:800px; text-align:center; margin-left: -400px; height:50px; margin-top:-25px; line-height: 50px;}
    #loading-content {font-family: "Helvetica", "Arial", sans-serif; font-size: 18px; color: black; text-shadow: 0px 1px 0px white; }
    #loading-graphic {margin-right: 0.2em; margin-bottom:-2px;}
    #loading {background-color: #eeeeee; height:100%; width:100%; overflow:hidden; position: absolute; left: 0; top: 0; z-index: 99999;}
</style>

<!-- STYLESHEETS END -->

<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<script type="text/javascript" src="js/selectivizr.js"></script>
<![endif]-->

</head>
<body class="login" style="overflow: hidden;">
    <div id="loading"> 

        <script type = "text/javascript"> 
            document.write("<div id='loading-container'><p id='loading-content'>" +
                           "<img id='loading-graphic' width='16' height='16' src='images/ajax-loader-eeeeee.gif' /> " +
                           "Loading...</p></div>");
        </script> 

    </div>