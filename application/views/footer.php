        </v-col>
      </v-row>
    </v-main>
  </v-app>
</template>

<!-- BEGIN FOOTER -->
  <v-card>
    <v-footer
      absolute
      class="font-weight-medium"
    >
      <v-col
        class="text-center"
        cols="12"
      >
        {{ new Date().getFullYear() }} — <strong>©  ICE CREAM ENGLISH "Developed by 
  <span><a href="http://bitsclan.com/">Bitsclan</a></strong>
      </v-col>
    </v-footer>
  </v-card>
<!-- <p class="copyright" style="color: #1F3E67; left: 0; bottom: 0;"> <?php echo date("Y"); ?> ©  ICE CREAM ENGLISH "Developed by 
  <span><a href="http://bitsclan.com/">Bitsclan</a></span>"
</p> -->
<a href="#index" class="go2top">
  <i class="icon-arrow-up"></i>
</a>
<!-- END FOOTER -->
</div>
</div>

<!-- END CONTAINER -->

<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
  <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
  <div class="page-quick-sidebar">
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
          <span class="badge badge-danger">2</span>
        </a>
      </li>
      <li>
        <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
          <span class="badge badge-success">7</span>
        </a>
      </li>
      <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
          <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu pull-right">
          <li>
            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
              <i class="icon-bell"></i> Alerts </a>
            </li>
            <li>
              <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                <i class="icon-info"></i> Notifications </a>
              </li>
              <li>
                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                  <i class="icon-speech"></i> Activities </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                    <i class="icon-settings"></i> Settings </a>
                  </li>
                </ul>
              </li>
            </ul>

          </div>
        </div>
        <!-- END QUICK SIDEBAR -->


<!-- level_test_report -->
<div id="level_test_report" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 style="font-weight: bold;" class="modal-title text-center">LEVEL TEST EVALUATION REPORT</h3>
      </div>
      <div class="modal-body level_test_report_body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>





<script src="<?php echo base_url(); ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/pages/scripts/ui-confirmations.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- custom vue -->
<script src="<?php echo base_url(); ?>assets/vuejs/customvue.js" type="text/javascript"></script>

<script type="text/javascript">
var v = new Vue({
   el:'#app',
   vuetify: new Vuetify(),
    data:{
        teachers: [
          { title: 'Dashboard', icon: 'mdi-view-dashboard',href: '#' },
          { title: 'Availability', icon: 'mdi-image',href: '#' },
          { title: 'Tutors', icon: 'mdi-human-child',href: '#' },
          { title: 'Students', icon: 'mdi-account',href: '' },
          { title: 'Lessons', icon: 'mdi-book-open-variant',href: '' },
          { title: 'Requests', icon: 'mdi-help-box',href: '' },
          { title: 'Tickets', icon: 'mdi-ticket',href: '' },
          { title: 'Notifications', icon: 'mdi-alarm-note',href: '' },
          { title: 'Salary', icon: 'mdi-cash',href: '' },
          { title: 'Support', icon: 'mdi-account-question' ,href: '' },
          { title: 'Booking for Student', icon: 'mdi-account-box',href: '' },

        ],
                students: [
          { title: 'Dashboard', icon: 'mdi-view-dashboard',href: '#' },
          { title: 'Availability', icon: 'mdi-image',href: '#' },
          { title: 'Tutors', icon: 'mdi-human-child',href: '#' },
          { title: 'Students', icon: 'mdi-account',href: '' },
          { title: 'Lessons', icon: 'mdi-book-open-variant',href: '' },
          { title: 'Requests', icon: 'mdi-help-box',href: '' },
          { title: 'Tickets', icon: 'mdi-ticket',href: '' },
          { title: 'Notifications', icon: 'mdi-alarm-note',href: '' },
          { title: 'Salary', icon: 'mdi-cash',href: '' },
          { title: 'Support', icon: 'mdi-account-question' ,href: '' },
          { title: 'Booking for Student', icon: 'mdi-account-box',href: '' },

        ],
                admins: [
          { title: 'Dashboard', icon: 'mdi-view-dashboard',action: 'test' },
          { title: 'Availability', icon: 'mdi-image',action: 'test' },
          { title: 'Tutors', icon: 'mdi-human-child',action: 'test' },
          { title: 'Students', icon: 'mdi-account',action: 'test' },
          { title: 'Lessons', icon: 'mdi-book-open-variant',action: 'test' },
          { title: 'Requests', icon: 'mdi-help-box',action: 'test' },
          { title: 'Tickets', icon: 'mdi-ticket',action: 'test' },
          { title: 'Notifications', icon: 'mdi-alarm-note',action: 'test' },
          { title: 'Salary', icon: 'mdi-cash',action: 'test' },
          { title: 'Support', icon: 'mdi-account-question' ,action: 'test' },
          { title: 'Booking for Student', icon: 'mdi-account-box',action: 'test' },

        ],
        right: null,
    },

  })
</script>


</body>

</html>

