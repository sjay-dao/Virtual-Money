<?php
    include ("connect.php");?>
    <?php include("forgot/forgotscript.php"); ?>
<style type="text/css">
 

</style>
 <form id="sendmail_box" class='container need-validation p-5' style=" display:; width:40%; box-shadow: 5px 5px 20px red; background:#f66e; border-radius: 3rem; position:fixed; top:10%; left:30%; margin: auto">
      <div class="row" style='border:px solid black'>
          <div class="col-md-12">
             
            <div class="row form-group">
                <label class="col-md-12 text-center font-weight-bold">Step 1: Enter your email address to get verification </label>
                <div class="col-md-12">
                  <input type="text" class="form-control input-sm letteronly txt_firstCapital border- transparent-" placeholder='sample@email.com' id="email" autocomplete="off" >
                </div>
            </div>
             <br><br>
             <div class="row form-group" style="margin:auto;  width:100%;">
                  <button type="button" class="btn btn-lg btn-success" onclick="sendCodetoEmail()"   style="height:100%; width:100%; float:left">Send</button>
            </div>
            <br><br>
            <div class="row form-group">
                <label class="col-md-12 text-center font-weight-bold">Step: 2 Enter the code sent to you via email </label>
                <div class="col-md-12">
                  <input type="text" class="form-control input-sm letteronly txt_firstCapital border- transparent-" placeholder='e.g. 1007512' id="passwordcode" autocomplete="off" >
                </div>
            </div>
             <br><br>
             <div class="row form-group" style="margin:auto;  width:100%;">
                  <button type="button" class="btn btn-lg btn-success" onclick="verifyCode()"   style="height:100%; width:100%; float:left">Proceed</button>
            </div>
          </div>
          
        
        
    </div>

</form>

 <form id="change_password_box" class='container need-validation p-5' style=" display:none; width:40%; box-shadow: 5px 5px 20px red; background:#f66e; border-radius: 3rem; position:fixed; top:10%; left:30%; margin: auto">
      <div class="row" style='border:px solid black'>
          <div class="col-md-12">
            <div id="pwbox" class="" style="display: ">
                <div class="row form-group" >
                     <label class="col-md-4 font-weight-bold" style="font-size:30px;">Password </label>
                   
                </div>
                 <div class="row form-group" style="display:;" >
                     <label class="col-md-4"></label>
                    <div class="col-md-8" style="overflow: auto;">
                      <input type="password" class="form-control input-sm p-0" placeholder='New Password' id="newpw" onkeyup="checkPasswordSame()" autocomplete="off" style="width:80%;float:left">
                      <span class="fa fa-eye-slash" onclick="showPassword('newpw', this)" style="cursor:pointer; border-radius:2rem;  background:red;color:white;padding:0 5px 0 5px">show</span>
                    </div>
                </div>
                <div class="row form-group" style="display:;" >
                     <label class="col-md-4"></label>
                    <div class="col-md-8" style="overflow: auto;">
                      <input type="password" class="form-control input-sm p-0" placeholder='Retype new Password' id="retypepw" onkeyup="checkPasswordSame()" autocomplete="off" style="width:80%; float:left">
                      <span class="fa fa-eye-slash" onclick="showPassword('retypepw', this)" style="cursor:pointer; border-radius:2rem;  background:red;color:white;padding:0 5px 0 5px ">show</span>
                    </div>
                </div>
            </div>
            <div class="row form-group" style="margin:auto;  width:100%;">
                  <button type="button" class="btn btn-lg btn-success" onclick="saveNewPassword()"  id="button_savepw" style="height:100%; width:100%; float:left" disabled>Save</button>
            </div>
          </div>
          
        
        
    </div>

</form>

<script type="text/javascript">
  function showPassword(id, elem){
    if($(elem).attr('class') == 'fa fa-eye-slash'){
        $(elem).attr('class', 'fa fa-eye'); 
        $(elem).html('hide'); 
        $("#"+id).attr("type", "text");
        console.log($("#"+id).attr("type") + " - type");
    }
    else{ 
        $(elem).attr('class', 'fa fa-eye-slash');
        $(elem).html('show'); 
        $("#"+id).attr("type", "password");
    }
}
</script>