
<?php
include "connection.php";

 class API extends connecting{
     /*
 	       var $first_name='iiiiiii';
 		   var  $last_name='dm';
 		   var $user_name='sa';
 		    var $passwords='mo';
 		    var $address='el';
 		    var  $contact='453556556';
 		     var $gernder='yu';
 		     var $occupation='de';
 		    var  $disease_type='de';
 		     
 		     var $medicine_type='de';
           
              var $use_id=16659;

       */      

 	function fetch_users(){

 		$info="SELECT * from users";
 		$get_users=$this->queryAll($info);
        // here we are jst reading all data from server
        while($row=mysqli_fetch_assoc($get_users)){
         	   $data[]= $row;

      foreach ($data as $rows) {
    echo '
     <tr>
         <td>'. $rows['first_name'] .'</td>
          <td>'. $rows['last_name'].'</td>
          <td>'. $rows['user_name'].'</td>
          <td>'. $rows['address'].'</td>
          <td>'. $rows['contact'].'</td>
          <td>'. $rows['gernder'].'</td>
          <td>'. $rows['occupation'].'</td>
          <td> <button type="button" name="edit"
     class="btn btn-success xs " id="'.$rows['user_id'].'">Edit</button></td>
     <td><button type="button" name="delete"
     class="btn btn-danger btn-xs " onclick="del_users('.$rows['user_id'].')" id="'.$rows['user_id'].'">Delete</button></td> 
         
     </tr>
     '; 
       }
     }
 	return $data;

 	}
   
      //we got this $rowid parameter from object action and pass value from ajax 
    function delete_booking($rowid){
        
        $info="DELETE FROM users WHERE user_id='$rowid'";
        $data=$this->queryAll($info);
        return $data;
    }

 	}

?>






<?php
//creating my objects and access function 
 $api_object= new API();
   
    if ($_GET['action']=='fetch_users'){
        $data=$api_object->fetch_users();
    }


    if($_GET['action']=='delete_booking'){
        $rowid = $_GET['rowid'];
        $data=$api_object->delete_booking($rowid);
    }
/*
    if($_GET['action']=='fetch_Bookings'){
        $data=$api_object->fetch_Bookings();
    }

    
    */
/*
   if($_GET['action']=='add_user'){
        $data=$api_object->add_user();
    }
   
   if($_GET['action']=='update_user'){
        $data=$api_object->update_user();
    }
*/
echo json_encode($data);    

?>