
<script type="text/javascript">
      


      function saveedit(){
          let fname = $("#firstname").val();
          let mname = $("#middlename").val();
          let lname = $("#lastname").val();  
          let fullname = fname + "*" + mname+"*" +lname;
         
          let contact = $("#contact").val();
          let email = $("#email").val();
          let user_code = $("#user_code").val();
          let imageurl = $("#profileImage").attr("src");

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


          console.log("isfieldmissing - " + isfield_notmissed );

          if(isfield_notmissed){
                 $.ajax({
                  type: 'POST',
                  url: 'edit/editclass.php',
                  data: 'name='+fullname+
                  '&contact='+contact+
                  '&email='+email+
                  '&user_code='+user_code+
                  '&imageurl='+imageurl+
                  '&form=edituser',
                    success: function(data){
                      console.log(data);
                      Swal.fire({
                          title: 'Success!',
                          text: 'You have created an account.',
                          icon: 'success',
                          confirmButtonColor: '#28a745',
                          confirmButtonText: 'Procceed'
                        }).then((result) => {
                           loadTbl();
                      });
                    }
                });     
          }

}
 
function deleteUser(row){
  console.log(row);
   Swal.fire({
          title: 'Are you sure?',
          text: 'You want to delete the user?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
              $.ajax({
                  type: 'POST',
                  url: 'edit/editclass.php',
                  data: 'user_code='+row['user_code']+
                  '&form=deleteuser',
                    success: function(data){
                      console.log(data);
                      Swal.fire({
                          title: 'Success!',
                          text: 'You have deleted the user.',
                          icon: 'success',
                          confirmButtonColor: '#28a745',
                          confirmButtonText: 'Procceed'
                        }).then((result) => {
                           loadTbl();
                      });
                    }
              });     
            }
          });
}
</script>