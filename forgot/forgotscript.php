
<script type="text/javascript">

  function sendCodetoEmail(){
      let email = $("#email").val();
    
             $.ajax({
              type: 'POST',
              url: 'forgot/forgotclass.php',
              data: 
              'email='+email+
              '&form=sendemail',
                success: function(data){
                  console.log(data);
                  Swal.fire({
                      title: 'Success!',
                      text: 'A mail has been sent to youe email.',
                      icon: 'success',
                      confirmButtonColor: '#28a745',
                      confirmButtonText: 'Procceed'
                    });
                }
            });     
        
  }
  
  function saveNewPassword(){
    let password = $("#newpw").val();
    let passwordcode = $("#passwordcode").val();

    $.ajax({
              type: 'POST',
              url: 'forgot/forgotclass.php',
              data: 
              'password='+password+
              '&passwordcode='+passwordcode+
              '&form=changepassword',
                success: function(data){
                  console.log(data);
                  Swal.fire({
                      title: 'Success!',
                      text: 'Your password has been change',
                      icon: 'success',
                      confirmButtonColor: '#28a745',
                      confirmButtonText: 'Procceed'
                    }).then((result) => {
                     window.location = "index.php";

                  });
                }
            });     
  }

  function checkPasswordSame(){
    let password = $("#newpw").val();
    let retype = $("#retypepw").val();
    if(password == retype)
      $("#button_savepw").attr("disabled", false);
    else
      $("#button_savepw").attr("disabled", true);
  }

  function verifyCode(){
    let passwordcode = $("#passwordcode").val();
     $.ajax({
              type: 'POST',
              url: 'forgot/forgotclass.php',
              data: 
              'passwordcode='+passwordcode+
              '&form=verifycode',
                success: function(data){
                  console.log(data);
                  if(data == 1){
                    $("#sendmail_box").hide();
                    $("#change_password_box").show();
                  }else{
                    Swal.fire(
                      'CODE NOT FOUND',
                      'You have entered an invalid code.',
                      'warning'
                    )
                  }
                }
            });     
  }
</script>