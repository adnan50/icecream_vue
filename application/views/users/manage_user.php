<style type="text/css">
.form-control{
  margin: 10px;
}
  .control-label {
    margin-top: 20px!important;
}

</style>

<?php
if($this->session->flashdata('success'))
  { ?>

    <script type="text/javascript">
      toasterOptions();
       toastr.success("<?php echo $this->session->userdata('success'); ?>","Profile");
    </script>
    
  <?php
}
?>


<div class="">
  <?php
  if (isset($user) && !empty($user)) {
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        <?php
        foreach ($user as $key => $value) {

         ?>
         var key = "<?php echo $key ?>";
         <?php

         if ($key == "teaching_experience" || $key == "competency") {
          ?>
          $("."+key+"").html("<?php echo $value ?>");
          <?php
        }elseif ($key == "profile_image") {
          ?>
          $('#profile_image_preview').html("<img src='"+base_url+"<?php echo PROFILE_IMAGE_UPLOAD_PATH.$value ?>'>");
          $("."+key+"").val("<?php echo $value ?>");

          <?php
        }elseif ($key == "profile_video") {
          ?>

          $('#profile_video_preview').html("<video width='200' height='150' controls><source src='"+base_url+"<?php echo PROFILE_VIDEO_UPLOAD_PATH.$value ?>'></video>");

          $("."+key+"").val("<?php echo $value ?>");

          <?php
        }else{
          ?>

          $("."+key+"").val("<?php echo $value ?>");

          <?php

        }
      }

      ?>
    });
  </script>
  <?php
}
$user_role = get_user_role();

?>
<div class="row div-center">
  <div class="col-md-6 col-sm-12 col-xs-12 ">
    <form method="post" enctype="multipart/form-data" id="userdata" action="<?php echo base_url('users/manage_user'); ?>">
      <div class="col-md-12">
        <label for="id" class="control-label">
          <h3><?php echo $this->lang->line('general_info'); ?>
          </h3>
        </label>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"><?php echo $this->lang->line('full_name'); ?>
        </label>
        <div class="col-md-9 pl0">
          <input class="form-control pl0 full_name" type="text" id="full_name" name="full_name" value=""> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3  control-label"><?php echo $this->lang->line('email'); ?>
        </label>
        <div class="col-md-9 pl0">
          <input class="form-control email pl0" type="email" id="email" name="email" value=""> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"><?php echo $this->lang->line('password'); ?>
        </label>
        <div class="col-md-9 pl0">
          <input class="form-control password pl0" type="password" id="password" name="password" value=""> 
        </div>
      </div>
         <div class="form-group">
        <label class="col-md-3 control-label"><?php echo $this->lang->line('confirm-password'); ?>
        </label>
        <div class="col-md-9 pl0">
          <input class="form-control password pl0" type="password" id="c_password" name="c_password" value=""> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"><?php echo $this->lang->line('contact_no'); ?>
        </label>
        <div class="col-md-9 pl0">
          <input class="form-control contact_number pl0" id="contact_number" type="text" name="contact_number" value=""> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"><?php echo $this->lang->line('date_of_birth'); ?>
        </label>
        <div class="col-md-9 pl0">
          <input class="form-control date_of_birth pl0"  type="date" id="date_of_birth" name="meta[date_of_birth]" value=""> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"><?php echo $this->lang->line('gender'); ?>
        </label>
        <div class="col-md-9 pl0">
          <select class="form-control gender pl0" id="gender" name="meta[gender]">
            <option value="1"><?php echo $this->lang->line('male'); ?>
            </option>
            <option value="0"><?php echo $this->lang->line('female'); ?>
            </option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"><?php echo $this->lang->line('zoom_id'); ?>
        </label>
        <div class="col-md-9 pl0">
          <input class="form-control skype_id pl0" type="text" id="skype_id" name="meta[skype_id]" value=""> 
        </div>
      </div>
      <?php
      if ($role == "student") {
        ?>

        <div class="form-group">
          <label class="col-md-3 control-label"><?php echo $this->lang->line('what_do_you_want_to_learn'); ?>
          </label>
          <div class="col-md-9 pl0">
            <select class="form-control want_to_learn pl0" id="want_to_learn" name="meta[want_to_learn]">
              <!-- <option value="1">Grammar – 문법 영어
              </option>
              <option value="2">Pronunciation/Accent reduction – 영어 발음 교정
              </option> -->
              <option value="3">Conversation [General, Travel]  – 영어 회화
              </option>
              <!-- <option value="4">Junior English – 주니어 영어 -->
              </option>
              <option value="5"> Business English – 비니지스 영어
              </option>
              <option value="6"> Interview English – 인터뷰 영어
              </option>
              <option value="7"> Speaking Test Preparation [TOEIC, OPIC, IELTS] - 스피킹 시험 준비 [TOEIC, OPIC, IELTS]
              </option>
            </select>
          </div>
        </div>
          <?php
        }elseif ($role == "teacher") {
          ?>
          <div class="form-group">
            <label class="col-md-3 control-label">Class Name
            </label>
            <div class="col-md-9 pl0">
              <input class="form-control class_name pl0" type="text" id="class_name" name="meta[class_name]" value=""> 
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Address
            </label>
            <div class="col-md-9 pl0">
              <input class="form-control address pl0" type="text" id="address" name="meta[address]" value=""> 
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label">Per Hour Rate
            </label>
            <div class="col-md-9 pl0">
              <input class="form-control per_hour_rate pl0" <?php if($user_role != 'admin'){echo "readonly";} ?> type="number" name="meta[per_hour_rate]" value=""> 
            </div>
          </div>

          <div class="col-md-12">
            <label for="id" class="control-label">
              <h3>Education Info
              </h3>
            </label>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Univ/Location
            </label>
            <div class="col-md-9 pl0">
              <input class="form-control univ_location pl0" id="univ_location" type="text" name="meta[univ_location]" value=""> 
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Degree/Major
            </label>
            <div class="col-md-9 pl0">
              <input class="form-control degree_major pl0" type="text" id="degree_major" name="meta[degree_major]" value=""> 
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Teaching Experience
            </label>
            <div class="col-md-9 pl0">
            	<textarea class="form-control teaching_experience pl0" id="teaching_experience" name="meta[teaching_experience]"></textarea>
            </div>
          </div>

          <!-- <div class="form-group">
            <label class="col-md-3 control-label">TOEFL/TOEIC
            </label>
            <div class="col-md-9 pl0">
              <select class="form-control toefl_toeic" name="meta[toefl_toeic]">
                <option value="1">Enable
                </option>
                <option value="0">Disable
                </option>
              </select>
            </div>
          </div> -->

          <!-- <div class="form-group">
            <label class="col-md-3 control-label">ILETS/OPIC
            </label>
            <div class="col-md-9 pl0">
              <select class="form-control ilets_opic" name="meta[ilets_opic]">
                <option value="1">Enable
                </option>
                <option value="0">Disable
                </option>
              </select>
            </div>
          </div> -->

          <div class="col-md-12">
            <label for="id" class="control-label">
              <h3>Profile Info
              </h3>
            </label>
          </div>

          <div class="form-group ">
            <label class="control-label col-md-3">Profile Image</label>
            <div class="col-md-9 pl0">
              <div class="fileinput fileinput-new dis-inherit" data-provides="fileinput" style="margin-left: 10px;">
                <div id="profile_image_preview " class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100%; height: 150px;"> </div>
                <div>
                  <span class="btn red btn-outline btn-file">
                    <span class="fileinput-new"> Select image </span>
                    <span class="fileinput-exists"> Change </span>
                    <input type="file" name="profile_image"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                  </div>
                </div>
              </div>
            </div>


            <?php


            if ($user_role == "admin") {
              ?>

              <div class="form-group ">
                <label class="control-label col-md-3">Profile Video</label>
                <div class="col-md-9 pl0">

                            <div class="dropzone" style="margin-left: 10px;"></div>
                                         
   <!--                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div id="profile_video_preview" class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                    <div>
                      <span class="btn red btn-outline btn-file">
                        <span class="fileinput-new"> Select Video </span>
                        <span class="fileinput-exists"> Change </span>
                        <input type="file" name="profile_video" id="profile_video"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                      </div>
                    </div> -->
                  </div>
                </div>

                <?php
              }

              ?>




              <div class="form-group">
                <label class="col-md-3 control-label">Competency
                </label>
                <div class="col-md-9 pl0">
                 <textarea class="form-control competency" rows="10" id="competency" cols="10" name="meta[competency]"></textarea>
               </div>
             </div>

             <div class="col-md-12">
              <label for="id" class="control-label">
                <h3>Bank Account Details
                </h3>
              </label>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Account Name
              </label>
              <div class="col-md-9 pl0">
                <input class="form-control paypal_account" type="text" id="paypal_account" name="meta[paypal_account]" value=""> 
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Account Number
              </label>
              <div class="col-md-9 pl0">
                <input class="form-control bank_account" type="text" id="bank_account" name="meta[bank_account]" value=""> 
              </div>
            </div>




            <?php
          }
          ?>
          <div class="text-center">
            <input type="hidden" class="profile_image" name="old_profile_image" value="">
            <input type="hidden" class="profile_video" name="old_profile_video" value="">
            <input type="hidden" class="id" name="id" value="">
             <input type="hidden" name="profile_video" id="profile_video">
            <input type="hidden" class="role" name="role" value="<?php echo $role ?>">	
            <button type="submit" class="btn blue "><?php echo $this->lang->line('submit'); ?>
            </button>
          </div>
        </form>
      </div>	
    </div>
  </div>
   <script>
let mockFile;

let user = '<?php echo (isset($user) && !empty($user) ? $user->id: "" ) ?>';

 $('#profile_video').val();
var profile_video = "";
Dropzone.autoDiscover = false;
$(".dropzone").dropzone({

    acceptedFiles: ".mp4,.mov,.avi,.mpeg4,.flv,.3gpp",
    dictDefaultMessage: "Drag Your Video Here (*Only One)",
    uploadMultiple: false,
    parallelUploads: 1,
    clickable: true,
    maxFiles: 1,
    addRemoveLinks: true,
    url:base_url+"users/image_upload",
     maxFilesize: 209715200,
     timeout: 180000,
    createImageThumbnails: true,

    success : function(file, response){
      var data_response = JSON.parse(response);
      if(data_response.status){
        file.previewElement.querySelector("[data-dz-name]").innerHTML = data_response.data;
        
       $('#profile_video').val(data_response.data);
       
       
      }
    },
    removedfile: function(file) {
     var name = file.previewElement.querySelector("[data-dz-name]").innerHTML;
     $.ajax({
       type: 'POST',
       url:'<?php echo base_url('users/delete_image');?>',
       data: {name: name},
       dataType:'json',
       success: function(data){
        if(data.status){
          $('#profile_video').val("");
        }
      }
    });
     var _ref;
     return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :void 0;
   },

   init: function () {

    thisDropzone = this;
    
    $.get(base_url+'users/get_project_images', {user:user}, function(data) {

    data = JSON.parse(data);

    console.log(data);
    if (data != "") {
           $.each(data, function(key,value){

        if(value.meta_key == 'profile_video')
        {

        size = getFileSize(base_url+"assets/videos/users/"+value.meta_value);
        mockFile = { name: value.meta_value, size: size, id:value.id };
        thisDropzone.options.addedfile.call(thisDropzone, mockFile);
        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, base_url+"assets/videos/users/"+value.meta_value);

        }


           });
    }

 
             
        });
    }

});

function getFileSize(url)
{
    var fileSize = '';
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send(null); 
    if (http.status === 200) {
        fileSize = http.getResponseHeader('content-length');
    }
    return fileSize;
}


</script>
<script type="text/javascript">
  $(document).ready(function(){
   $("[name='profile_video']").bind("change", function () {
     if(this.files[0].size > 37748736) {
       alert("Please upload file less than 36 MB. Thanks!!");
        $("[name='profile_video']").val("");
      
     }
    }); 
      $("[name='profile_image']").bind("change", function () {
     if(this.files[0].size > 15728640) {
       alert("Please upload file less than 15 MB. Thanks!!");
        $("[name='profile_image']").val("");
      
     }
    });
  });
</script>

  <script type="text/javascript">
      
      $(document).ready(function() {
        $("#userdata").validate({
            rules: {
        
             password: {
            required: true,
            minlength: 6
},
             full_name:"required",
             email:"required",
             contact_number:"required",
             date_of_birth:"required",
             gender:"required",
             skype_id:"required",
             c_password: {
              equalTo: "#password"
            }
        },
        messages: {
            password:{
                 required: "<?php echo $this->lang->line('please_enter_atleat_6'); ?>",
            }
        }
    });

    });
  </script>