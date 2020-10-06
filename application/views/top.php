<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <base href="<?php echo base_url();?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- <link rel="shortcut icon" href="favicon.ico" />  -->
    <!-- BEGIN LAYOUT FIRST STYLES -->
    <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
    <!-- END LAYOUT FIRST STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/jquery-ui-git.css">
   
    <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
   
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="assets/layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/layouts/layout5/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- END THEME LAYOUT STYLES -->

    <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
    
    <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-toastr/toastr.min.css">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href='assets/fullcalendar/css/fullcalendar.min.css' rel='stylesheet' />

    <link href="assets/apps/css/ticket.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/pages/css/jquery-confirm.min.css" rel="stylesheet" type="text/css">
    <link href="assets/pages/css/toastr.css"  rel="stylesheet" type="text/css">
    <link href="assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css"/>

    <!-- custom Css -->
    <link href="assets/pages/css/custom.css" rel="stylesheet" type="text/css" />
      <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
    <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
    
    <!-- END THEME GLOBAL SCRIPTS -->
    <script src="assets/js/jquery-confirm.min.js" type="text/javascript"></script>
    <script src="assets/js/toastr.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/js/additional-methods.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->

   
    <!-- END THEME LAYOUT SCRIPTS -->

    <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="assets/global/plugins/confirm-jquery/jquery-confirm.js" type="text/javascript"></script>
    
    <script src="assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>   
    <script src="assets/pages/scripts/ui-bootbox.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/checkboxes.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.form.js"></script>

    <script src="assets/global/plugins/bootstrap-summernote/summernote.js"></script>
    <script src="assets/fullcalendar/js/fullcalendar.min.js" type="text/javascript"></script>

    <script src="assets/js/fl-booking.js" type="text/javascript"></script>
    <script src="assets/js/availability.js" type="text/javascript"></script>
    <script src="assets/js/support.js" type="text/javascript"></script>

    <!-- vuejs -->
    
<link href="<?php echo base_url() ?>assets/vuejs/customvue.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">

      <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script> -->
  
    <script src='<?php echo base_url() ?>assets/vuejs/vue.js' type='text/javascript'></script>
    <script src='<?php echo base_url() ?>assets/vuejs/customvue.js' type='text/javascript'></script>
    <script src="<?php echo base_url() ?>assets/vuejs/vuetify.js"></script>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js' type='text/javascript'></script>





    <script type="text/javascript">

        let base_url = "<?php echo base_url() ?>";
        $(document).ready(function(){

            let page_menu =  $(".<?php echo $title ?>");

            page_menu.addClass("active open selected");



      

        })
          

      function toasterOptions() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
      };
      
    </script>
    <script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
});
</script>
<!-- <style type="text/css">
    .select2-selection{
        border-radius: 8px !important;
    }
    .select2{
            margin-left: 10px;
    }
</style> -->

</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo">
    <!-- BEGIN CONTAINER -->
    <div id="app">
            <!-- BEGIN HEADER -->