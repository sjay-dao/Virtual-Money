<?php
    include ("connect.php");?>
<style type="text/css">
  
  #info { 
    height: 150px; 
    left:0;
    position: fixed; 
    bottom:0%;
    width:100%; 
    background-image: linear-gradient(to bottom , #FFF, #f21);
    opacity: 1;
    border-top:3px ridge #900;
    font-size:30px;

}



@media screen and (max-width: 650px) {

   #info { 
    height: 50px; 
    font-size:12px;
  }
}
</style>
 <form class='container need-validation mb-3'>
      <div class="row"-md-4 style='box-shadow: 5px 5px 10px red;  background:#f44; margin:5%; margin-top:100px; padding:2%; border-radius: 3rem'>
            <label class="col-md-12 border-bottom" style="border-bottom: 5px ">All fields marked with (✓) are required</label>
            <div class="col-md-6">
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
           
          </div>
          <div class="col-md-6">
             <label class="col-md-12">Login Information ✓</label>
                
             <div class="row form-group">
                <label class="col-md-5">Username</label>
                <div class="col-md-7">
                  <input type="text" class="form-control input-sm letteronly t border- transparent-" id="username" placeholder='Username' autocomplete="off" >
                </div>
            </div>
            <div class="row form-group">
              <label class="col-md-5">Password</label>
                <div class="col-md-7">
                  <input type="Password" class="form-control input-sm letteronly txt_firstCapital border- transparent-" id="password" placeholder='Password' autocomplete="off" >
                </div>
            </div>
             <div class="row form-group">
              <label class="col-md-5">Retype</label>
                <div class="col-md-7">
                  <input type="Password" class="form-control input-sm letteronly txt_firstCapital border- transparent-" id="retype" placeholder='Retype Password'autocomplete="off" >
                </div>
            </div>
          </div>
        <div class="input-group mb-3">
            <div class="input-group-text">
              <input type="checkbox" aria-label="Checkbox for following text input" id="tandc" >
            </div>
          <label  class=" col-md-9 border- transparent-" aria-label="Text input with checkbox" style='font-size: 80%'>I have read and approved VoteNow's terms and condition.</label>
        </div>
        <label  class=" col-md-9 border- transparent-" aria-label="Text input with checkbox" ><center style="font-color:red" id="errorprompt"><center></label>
        <br><br>
    </div>

    <div id ="info">
          <div class="col-lg-4 text-right" style="margin:auto">
              <button type="button" class="btn btn-lg btn-success" onclick="savesignup()" disabled id="signup_btn" style="height:100%; width:100%; border:1px solid black"><span class="mdi mdi-forward">Next</button>
                <!-- <h4>SP Development</h4> -->
          </div>
    </div>
</form>


<script type="text/javascript">

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

      $('#province').on('change',function () {
        provcode = this.value.split("&")[0];
        provdesc = this.value.split("&")[1];
        console.log(provcode + provdesc);
        $.ajax({
            type: 'POST',
            url: 'signup/signupclass.php',
            data: 'provcode='+provcode+
            '&form=browsecity',
              success: function(data){
                $('#city').html(data);
                console.log(data);
              }
          });
    });


      $('#city').on('change',function () {
        citycode = this.value.split("&")[0];
        citydesc = this.value.split("&")[1];

        console.log(citycode);
        $.ajax({
            type: 'POST',
            url: 'signup/signupclass.php',
            data: 'citycode='+citycode+
                  '&form=browsebarangay',
              success: function(data){
                $('#barangay').html(data);
                console.log(data);
              }
          });
    });


      $('#tandc').on('change',function () {
         if(this.checked)
              $("#signup_btn").prop("disabled", false);
          else
            $("#signup_btn").prop("disabled", true);
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