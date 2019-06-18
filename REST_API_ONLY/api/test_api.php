
<?php
include "Api.php";

  $api_object= new API();
    if ($_GET['action']='fetch_users'){
    	$data=$api_object->fetch_users();
    }

if($_GET['action']='fetch_Bookings'){
        $data=$api_object->fetch_Bookings();
    }
   
 /* 
  if($_GET['action']='delete_booking'){
        $data.=$api_object->delete_booking();
    }
    
  
  if($_GET['action']='add_user'){
        $data=$api_object->add_user();
    }

   
   
   if($_GET['action']='update_user'){
    	$data=$api_object->update_user();
    }
*/
echo json_encode($data);    

?>