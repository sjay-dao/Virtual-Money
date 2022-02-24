<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<head>
    <?php
        session_start(); 
        if($_SESSION["userinfo"]['user_code'] == 'none' && ($_GET['url'] != 'forgot' && $_GET['url'] != 'signup'))
            echo "<script>window.location = 'index.php';</script>";
    ?>
    
<?php include('mainstyle.php'); ?>
<?php include('mainscripts.php'); ?>
</head>

<body >
        <!-- ============================================================== -->
        
        <?php 
            $issignup = ($_GET['url'] == 'signup');
            if($_GET['url'] != "signup"){
                // include('topbar/design_format.html');
                    // include('right sidebar/design_format.html');
            }
        ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
      
            <div class="container-fluid" >
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                
                <?php
                  if(!isset($_GET['url'])){
                   echo "<script>window.location='mainpage.php?url=dashboard';</script>";
                  }
                  else{
                      include $_GET['url']. "/".$_GET['url'].".php";
                  }
                ?>
           
            </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
   

  <div id="main_background" style="background:url('images/background/curency_bg.png') no-repeat; background-size:cover ; height:100%; width: 100%; position: fixed; left:0%; top:0; z-index:-1000"></div>
</body>

</html>


<script type="text/javascript">
      var ismobile = false;
      // window.onload = function(){$(window).trigger('resize')};

    // $( window ).resize(function() {
    //     if(screen.width < 990 && !ismobile){
    //         $( "#frequency_list_frame" ).css( "left", "50%" );
    //         // rightsidebarSetInit();
    //         ismobile = true;
    //         console.log("mobile");
    //     }
    //     else if(screen.width >= 990 && ismobile){
    //       $( "#frequency_list_frame" ).css( "left", "80%" );
    //       // rightsidebarSetInit();
    //       ismobile = false;
    //       console.log("desktop");
    //     }
    // });
</script>