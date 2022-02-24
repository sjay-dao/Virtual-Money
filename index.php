<?php 
session_start();
$_SESSION["userinfo"]['user_code'] = "none";
// remove all session variables
echo "<script>console.log('".$_SESSION["userinfo"]['user_code']."');</script>";
?>
<!DOCTYPE html>
<html lang="en">
<?php include('mainstyle.php'); ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mickey Mouse Money</title>
</head>

<style type="text/css">
  .input-box{
    width:70%;
    text-align: center;
    margin:auto;
    margin-bottom:15px;
  }

  #login-box{
    text-align: center; background-image: linear-gradient(to bottom , #FFFa, #f21a); padding-top:5%; position:fixed; top:0; left:66.6%; height: 100%; 
  }

  #login-signup-box button{
    height:50px; width:90px; border-radius:3rem; background:#fff5;
  }

  #login-signup-box{
    display: none;
    position: fixed; 
    bottom:100px;
    width:100%;
    text-align: center;
    z-index: 10;
  }

  @media screen and (max-width: 990px){
    #login-box{
      display: none;
      left:0;
      background-image: linear-gradient(to bottom , #FFF, #f21); padding-top:5%;
    }

    #login-signup-box{
      display: block;
    }
  }
</style>

<body id="frame" style="overflow-x:hidden; padding:0 margin:0">
<div id="main_background" style="background:url('images/background/curency_bg.png') no-repeat; background-size:cover ; height:100%; width: 100%; position: fixed; left:0; top:0 ;z-index:-100"></div>
<section class="row" >
  <div id="login-info" class="col-lg-8 mt-5">
    <div id="login-signup-box">
        <button  style=" left:50px;" onclick="$('#login-box').show();$('#login-signup-box').hide();">Login</button>
        <button style="right:50px;">Signup</button>
    </div>
        <div class="offset-md-3 col-md-6 "style="border:px solid black; height: 100%; margin-top: 200px; text-align: center"> 
            <label style="font-size:40px; font-family: Impact; text-shadow: 5px 5px 10px  #fff8" >Virtual Money for your Company, Institution, Friends, or Games</label>
        </div>
        <div class="offset-md-3 col-md-6 h-100" style="border:px solid black; height: 100%; text-align: center"> 
            <label style="font-size:40px; font-family: Impact; color:white; text-shadow: 5px 5px 10px  black; " >Name your Currency</label>
        </div>
        <div class="offset-md-3 col-md-6 "style="border:px solid black; height: 100%; text-align: center"> 
            <label style="font-size:40px; font-family: Impact;text-shadow: 5px 5px 10px  #fff8" >Add your ways to earn</label>
        </div>
  </div>
  <div id="login-box"  class="col-lg-4" style=" ">
      <div class="form-group" style="float: none; margin: 0 auto; width:70%">
        <a href="javascript:void(0)" class="text-center db">
        <img src="images/fg.jpg" alt="Home" width="100px" height="auto" />
        <br>
          <h2>
            <span style="color:#803; font-weight: bold">Mickey Mo</span><span style="color:#070; font-weight: bold">use Money</span> 
          </h2>
        </a>  
        <div class="input-box">
          <input class="form-control" type="text" required="" placeholder="Username" id="txtusername">
        </div>
     
        <div class="input-box">
          <input class="form-control" type="password" required="" placeholder="Password" id="txtpassword">
        </div>
     
        <div class="input-box" style="text-align:right">
          <a href="mainpage.php?url=forgot" id="to-recover" ><i class="fa fa-lock mr-1"></i> Forgot password?</a>
        </div>
     
        <div class="input-box">
          <button class="btn btn-lg btn-success btn-block text-uppercase waves-effect waves-light" onclick="loginToVoteNow();" style="background:#090;">Sign In</button>
        </div>
     
        <div class="input-box">
          <p>Don't have an account? <a href="mainpage.php?url=signup" class="text-primary ml-1"><b>Sign Up Here</b></a></p>
        </div>
      </div>

      <a href="javascript:void(0)" class="text-center db"><h5>SP Software Development</h5><img src="images/fg.jpg" alt="Home" width="20%" height="auto" /></a>
      
  </div>
</section>

</body>

</html>
<?php include('mainscripts.php'); ?>

<script type="text/javascript">
  var ismobile = false;

$( window ).resize(function() {
  if(screen.width < 990 && !ismobile){
    $( "#frequency_list_frame" ).css( "left", "50%" );
    ismobile = true;
    console.log("mobile");
  }
  else if(screen.width >= 990 && ismobile){
      $( "#frequency_list_frame" ).css( "left", "80%" );
      ismobile = false;
      console.log("desktop");
  }
});



  function loginToVoteNow(){
    var txtusername = $("#txtusername").val();
    var txtpassword = $("#txtpassword").val();
    $.ajax({
      type: 'POST',
      url: 'loginclass.php',
      data: 'txtusername='+txtusername+
      '&txtpassword='+txtpassword+
      '&form=loginuser',
      success: function(data){
        console.log(data);
        if(data > 0){
          window.location = 'mainpage.php?url=dashboard';
        }else{
          Swal.fire(
            'USER NOT FOUND',
            'You have entered invalid username or password.',
            'warning'
          )
        }
      }
    })
  }

 
</script>