
<script type="text/javascript">
      var provcode = "";
      var provdesc = "";
      var citycode = "";
      var citydesc = "";

       function savesignup(){
          let fname = $("#firstname").val();
          let mname = $("#middlename").val();
          let lname = $("#lastname").val();  
          let fullname = fname + "*" + mname+"*" +lname;
         
          let contact = $("#contact").val();
          let email = $("#email").val();
      
          let username= $("#username").val();
          let password= $("#password").val();
          let retype= $("#retype").val();


          // console.log(fname + mname + lname+ bdate + age + gender + contact + email + country + province_code + city_code + barangay_code + province_desc + city_desc + barangay_desc + etc + username + password + retype);
          //sign up requirements

          let ispwdsame = (password == retype);
          if(!ispwdsame)
            $("#errorprompt").html("Password did not match");

          

          //must be filled up all required field
          let isfield_notmissed = true;
          $('.form-control').each(function(){
                if($(this).val() == "")
                {
                  console.log($(this).attr("id") + " - has missing field");
                  $(this).css("background-color", "#cc665f");
                  $("#errorprompt").html("You need to fill the missing field.");
                  isfield_notmissed = false;

                }
            })


          //check username uniqueness
          //let isusernameunique = checkUniqueUsername(username);


          console.log("ispwdsame - " + ispwdsame);
          console.log("isfieldmissing - " + isfield_notmissed );

          if(isfield_notmissed && ispwdsame){
            // if(true){

            $.ajax({
              type: 'POST',
              url: 'signup/signupclass.php',
              data:
              'username='+username+
              '&form=checkusername',
                success: function(data){
                  console.log("username unigue is " + data);
                  if(data ==0){
                       $.ajax({
                        type: 'POST',
                        url: 'signup/signupclass.php',
                        data: 'name='+fullname+
                        '&contact='+contact+
                        '&email='+email+
                        '&username='+username+
                        '&password='+password+
                        '&form=savesignup',
                          success: function(data){
                            console.log(data);
                            Swal.fire({
                                title: 'Success!',
                                text: 'You have created an account.',
                                icon: 'success',
                                confirmButtonColor: '#28a745',
                                confirmButtonText: 'Procceed'
                              }).then((result) => {
                                 window.location = "index.php";
                            });
                          }
                      });
                  }

                  else
                    $("#errorprompt").html("Username already exists.");
                }
            });
  
          }
      }



</script>