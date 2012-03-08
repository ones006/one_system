<!DOCTYPE html>
<!--[if IE 7 ]>   <html lang="en" class="ie7 lte8"> <![endif]--> 
<!--[if IE 8 ]>   <html lang="en" class="ie8 lte8"> <![endif]--> 
<!--[if IE 9 ]>   <html lang="en" class="ie9"> <![endif]--> 
<!--[if gt IE 9]> <html lang="en"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<!--[if lt IE 9 ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<!-- iPad Settings -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
<meta name="viewport" content="user-scalable=no, initial-scale=1.0">
<!-- iPad End -->

<title>Alus Solution System</title>

<!-- iOS ICONS -->
<link href="<?php echo base_asset_url();?>images/favicon_32x32.ico" type="image/x-icon" rel="shortcut icon">
<link rel="apple-touch-icon" href="touch-icon-iphone.html" />
<link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.html" />
<link rel="apple-touch-icon" sizes="114x114" href="touch-icon-iphone4.html" />
<link rel="apple-touch-startup-image" href="touch-startup-image.html">
<!-- iOS ICONS END -->
<!-- DATATABLES CSS -->
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url(); ?>/js/lib/datatables/css/cleanslate.css" />
<!-- DATATABLES CSS END -->
<!-- STYLESHEETS -->

<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/reset.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/grids.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/style.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/jquery.uniform.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/forms.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url();?>css/themes/light/style.css" />

<!--[if lt IE 9]>
<link rel="stylesheet" media="screen" href="<?php echo base_asset_url(); ?>css/ie.css" />
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
                           "<img id='loading-graphic' width='16' height='16' src='one_assets/images/ajax-loader-big-000000.gif' /> " +
                           "Loading...</p></div>");
        </script>

    </div>

    <?php  
    	$menu_items = array('standard', 'administrator', 'menu items1', 'menu items2', 'menu items3');
    ?>
    <!--<ul>
	<?php /* foreach($menu_items as $menu_item):?>   
	    <li<?php if($this->uri->segment(2) == url_title($menu_item->name, dash, TRUE)):?> class="active"><?php else:?>><?php endif;?><a href="<?=$menu_item->url;?>"><?=$menu_item->name;?></a></li>
	<?php endforeach; */?>
	</ul>-->
	<!--<ul>
		<li class="<?=($this->uri->segment(1)==='alfa')?'active':''?>"><a href="alfa/index" title="Alfa">Alfa</a></li>
		<li class="<?=($this->uri->segment(1)==='beta')?'active':''?>"><a href="beta/index" title="Beta">Beta</a></li>
	</ul>-->

    <div id="wrapper">
        <header>
            <h1><a href="http://webalus.com/">Alus Solution System</a></h1>
            <nav>
				<ul id="main-navigation" class="clearfix"> 
					<li class="dropdown active"> 
						<a href="#a">active item</a> 
						<ul> 
							<li> 
								<a href="#aa">menu item</a> 
							</li> 
							<li class="dropdown"> 
								<a href="#ab">menu item</a> 
								<ul> 
									<li class="current"><a href="#">menu item</a></li> 
									<li><a href="#aba">menu item</a></li> 
									<li><a href="#abb">menu item</a></li> 
									<li><a href="#abc">menu item</a></li> 
									<li><a href="#abd">menu item</a></li> 
								</ul> 
							</li> 
							<li class="dropdown"> 
								<a href="#">menu item</a> 
								<ul> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
								</ul> 
							</li> 
							<li class="dropdown"> 
								<a href="#">menu item</a> 
								<ul> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
								</ul> 
							</li> 
						</ul> 
					</li> 
					<li> 
						<a href="#">menu item</a> 
					</li> 
					<li class="dropdown"> 
						<a href="#">menu item</a> 
						<ul> 
							<li class="dropdown"> 
								<a href="#">menu item</a> 
								<ul> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
								</ul> 
							</li> 
							<li class="dropdown"> 
								<a href="#">menu item</a> 
								<ul> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
								</ul> 
							</li> 
							<li class="dropdown"> 
								<a href="#">menu item</a> 
								<ul> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
								</ul> 
							</li> 
							<li class="dropdown"> 
								<a href="#">menu item</a> 
								<ul> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
									<li><a href="#">menu item</a></li> 
								</ul> 
							</li> 
						</ul> 
					</li> 
					<li class="dropdown"> 
                        <a href="#">Themes</a> 
                        <ul>
                            <li><a href="#">Lightblue</a></li> 
                            <li><a href="#">Gray</a></li> 
                            <li><a href="#">Dark</a></li> 
                        </ul> 
					</li>	
                    <li class="fr dropdown"> 
                        <a href="#" class="with-profile-image"><span><img src="<?php echo base_asset_url(); ?>images/alus32x32x32.png" width="25" /></span>Administrator</a> 
                        <ul>  
                            <li><a href="#">Users</a></li> 
                            <li><?php echo anchor('groups/groups','Groups'); ?></li> 
                            <li><?php echo anchor('groups/user_group','User Groups'); ?></li> 
                            <li><?php echo anchor('menus/parent_menu','Parent Menu'); ?></li> 
                            <li><?php echo anchor('menus/child_menu','Child Menu'); ?></li> 
                            <li><?php echo anchor('auth/logout','Logout'); ?></li> 
                        </ul>
                    </li> 
				</ul> 
            </nav>
        </header>
        
        <section>
            <!-- Sidebar -->

            <!--<aside>
                <nav>
                    <ul>
                        <li class="current"><a href="#">Dashboard</a></li>
                        <li><a href="#">Media</a></li>
                        <li><a href="#">Forms</a></li>
                        <li><a href="#">Wizard</a></li>
                        <li><a href="#">Tables</a></li>
                    </ul>
                </nav>
                <nav>
                    <h2>Applications</h2>
                    <ul>
                        <li><a href="#">Calendar</a></li>
                        <li><a href="#">WYSIWYG Editor</a></li>
                    </ul>
                </nav>
            </aside>-->

            <!-- Sidebar End -->