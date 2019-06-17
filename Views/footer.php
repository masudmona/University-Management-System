</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- START PRELOADS -->
<audio id="audio-alert" src="<?php echo SITE_URL ?>/assets/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?php echo SITE_URL ?>/assets/audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->


<!-- END THIS PAGE PLUGINS-->

<!-- START SCRIPTS -->

<!-- START PLUGINS -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/bootstrap/bootstrap.min.js"></script>

<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='<?php echo SITE_URL ?>/assets/js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='<?php echo SITE_URL ?>/assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='<?php echo SITE_URL ?>/assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<script type='text/javascript' src='<?php echo SITE_URL ?>/assets/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/owl/owl.carousel.min.js"></script>

<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/moment.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/daterangepicker/daterangepicker.js"></script>

<!-- END THIS PAGE PLUGINS-->

<!-- FORM PAGE PLUGINS -->
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<!--<script type="text/javascript" src="--><?php //echo SITE_URL ?><!--/assets/js/plugins/bootstrap/bootstrap-select.js"></script>-->
<script type='text/javascript' src='<?php echo SITE_URL ?>/assets/js/plugins/jquery-validation/jquery.validate.js'></script>
<!-- END FORM PAGE PLUGINS -->

<!-- TABLE PAGE PLUGINS -->
<script type='text/javascript' src='<?php echo SITE_URL ?>/assets/js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- END TABLE PAGE PLUGINS -->

<!-- START TEMPLATE -->
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/actions.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/demo_dashboard.js"></script>

<!-- END TEMPLATE -->
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/jx.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/custom.js"></script>
<!-- END SCRIPTS -->

<script type="text/javascript">
    var jvalidate = $("#jvalidate").validate({
        ignore: [],
        rules: {
            c_code: {
                required: true,
                minlength: 5
            },

            c_name: {
                required: true
            },
            c_credit: {
                required: true,
                min: 0.5,
                max: 5.0
            },
            t_name: {
                required: true
            },
            t_mail: {
                required: true,
                email: true
            },
            t_credit: {
                required: true,
                min:0
            },
            d_code: {
                required: true,
                minlength: 2,
                maxlength: 7
            }
        }
    });

</script>
</body>

</html>