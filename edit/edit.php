<?php
    include ("connect.php");?>
    <?php include("edit/editstyle.php"); ?>
    <?php include("edit/editscript.php"); ?>
<style type="text/css">
  
  <style type="text/css">
    .container label{
        font-weight: bold;
    }
    #imageframe{
        border:1px ridge orange;  border-radius:50%; height:300px; width:300px; margin:0 auto;
    }

    .container input{
        border:0; border-bottom: 1px solid black;

    }

    @media screen and (max-width: 500px) {
        .container{
            margin:0;
            padding: 0;
        }
        #imageframe{
           height:150px; width:150px;
        }
    }
</style>

</style>
 <form id="modal_edit" class='container need-validation p-5' style=" display:none; width:40%; box-shadow: 5px 5px 20px red; background:#f66e; border-radius: 3rem; position:fixed; top:0; left:30%; margin: auto">
  <div class="row">
        <div class="col-lg-12">
            <div id="profile-container" style=" width:100%; border-bottom:3px solid #9bf; text-align: center; margin-bottom: 10px">
                <div style="" id="imageframe">
                    <image id="profileImage" src="" style="width:100%; height:100%; border-radius: 50%" onclick = '$( "#imageUpload" ).trigger( "click" );'/>   
                </div>
                <center>Tap to change</center>
            </div>
            <input id="imageUpload" class= "addsalesperson d-none" type="file" name="profile_photo" placeholder="Photo" required=""  capture>
        </div>
      </div>

      <div class="row"-md-4 style='border:px solid black'>
            <div class="col-md-12">
             <div class="row form-group">
                <label class="col-md-5">Name ✓</label>
                <div class="col-md-7">
                  <input type="text" class=" form-control input-sm letteronly t border- transparent-" id="firstname" placeholder='First Name ✓' autocomplete="off" >
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-5"></label>
                <div class="col-md-7">
                  <input type="text" class="form-control input-sm letteronly txt_firstCapital border- transparent-" id="middlename" placeholder='Middle Name' autocomplete="off" >
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-5"></label>
                <div class="col-md-7">
                  <input type="text" class="form-control input-sm letteronly l border- transparent-" id="lastname"  placeholder='Last Name ✓'autocomplete="off" >
                </div>
            </div>
            
            <div class="row form-group">
                <label class="col-md-5">Mobile No ✓</label>
                <div class="col-md-7">
                  <input type="text" class="form-control input-sm letteronly t border- transparent-" placeholder='09123456789' id="contact" autocomplete="off" >
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-5">Email ✓</label>
                <div class="col-md-7">
                  <input type="text" class="form-control input-sm letteronly txt_firstCapital border- transparent-" placeholder='sample@email.com' id="email" autocomplete="off" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-7">
                  <input type="hidden" class="form-control input-sm letteronly txt_firstCapital border- transparent-" placeholder='' id="user_code" autocomplete="off" >
                </div>
            </div>
           <br><br>
           <div class="row form-group" style="margin:auto;  width:100%;">
                <button type="button" class="btn btn-lg btn-success" onclick="saveedit()"   style="height:100%; width:50%; float:left">Save</button>
                <button type="button" class="btn btn-lg btn-danger" onclick="$('#modal_edit').hide()"   style="height:100%; width:50%; float:right">Cancel</button>
            </div>
          </div>
          
        
        <label  class=" col-md-9 border- transparent-" aria-label="Text input with checkbox" ><center style="font-color:red" id="errorprompt"><center></label>
        
    </div>

</form>


<script type="text/javascript">
$("#imageUpload").on('change', function() {
        // alert('wpwowowowo');
        var fd = new FormData();
        var files = $('#imageUpload')[0].files[0];
        console.log(files.name);
        fd.append('file', files);

        $.ajax({
            url: 'uploadFile.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
              console.log(response + " - response");
                if(response != 0){
                   console.log('file uploaded'+ response);
                   $("#profileImage").attr("src","upload/image/"+files.name);
                }
            },
        });
    });


// Restricts input for the set of matched elements to the given inputFilter function.
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

$(document).ready(function() {
  $("#contact").inputFilter(function(value) {
    return /^\d*$/.test(value);    // Allow digits only, using a RegExp
  });

   $("#age").inputFilter(function(value) {
    return /^\d*$/.test(value);    // Allow digits only, using a RegExp
  });

     $('#firstname').keypress(function (e) {
       validatealphabetsOnly(e)
    });

      $('#middlename').keypress(function (e) {
       validatealphabetsOnly(e)
    });

       $('#lastname').keypress(function (e) {
       validatealphabetsOnly(e)
    });

      

});

     function validatealphabetsOnly(e){
       var regex = new RegExp("^[a-zA-Z\s]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        alert('Please Enter only alphabet');
        return false;
        }
     }
</script>


<?php include("signup/signupscript.php"); ?> 