<!-- MAIN JAVASCRIPTS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.js"></script>
    <script>window.jQuery || document.write("<script src='../one_assets/js/jquery.min.js'>\x3C/script>")</script>
    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/jquery.uniform.min.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/PIE.js"></script>
    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/ie.js"></script>
    <![endif]-->

    <script type="text/javascript" src="<?php echo base_asset_url();?>js/global.js"></script>
    <!-- MAIN JAVASCRIPTS END -->

    <!-- LOADING SCRIPT -->
    <script>
    $(window).load(function(){
        $("#loading").fadeOut(function(){
            $(this).remove();
            $('body').removeAttr('style');
        });
    });
    </script>
    <!-- LOADING SCRIPT -->

</body>

</html>