<?php
  
/* Getting file name */
$filename = $_FILES['file']['name'];
  
/* Location */
echo $location =  __DIR__ . "/upload/image/".$filename;
$uploadOk = 1;
  
if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
      echo $location;
   }else{
      echo 0;
   }
}
?>