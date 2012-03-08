				<footer class="container_12 clearfix">
                    <div class="grid_12">
                        Copyright &copy; 2012. Created by <a target="_blank" href="http://webalus.com">Alus Solution</a>
                    </div>
                </footer>
            </section>

            <!-- Main Section End -->
        </section>
    </div>
    
    <!-- MAIN JAVASCRIPTS -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.js"></script>-->
    <script>window.jQuery || document.write("<script src='/master_system/one_assets/js/jquery.min.js'>\x3C/script>")</script>
    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/jquery.uniform.min.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/PIE.js"></script>
    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/ie.js"></script>
    <![endif]-->

    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/global.js"></script>
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
    
    

    <!-- DATATABLES -->
    <script type="text/javascript" src="<?php echo base_asset_url(); ?>js/lib/datatables/js/jquery.dataTables.js"></script> 
    <script type="text/javascript"> 
        $(document).ready(function() {
            $('#example').dataTable( {
                "sPaginationType": "full_numbers"
            } );
        } );
    </script> 
    <!-- DATATABLES END -->
</body>

</html>