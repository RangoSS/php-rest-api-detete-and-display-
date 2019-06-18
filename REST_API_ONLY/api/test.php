
<?php
include "connection.php";

 class API extends connecting{

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

             

 	function fetch_users(){

 		$info="SELECT * from users";
 		$get_users=$this->queryAll($info);
         while($row=mysqli_fetch_assoc($get_users)){
         	   $data[]= $row;
         }

 		return $data;
 	}
 	function fetch_Bookings(){
        $info="SELECT first_name,last_name,user_name,address,contact,gernder,occupation,date_to,time_at,u.user_id FROM users u
                     JOIN booking b
                     ON u.user_id=b.user_id;
	                 ";
	   $get_booking=$this->queryAll($info);
	   while($row=mysqli_fetch_assoc($get_booking)){
	   	    $data[]=$row;
	   }
	   return $data;
 	}

 	function delete_booking($rowid){
 		
 		$info="DELETE FROM users WHERE user_id='$rowid'";
 		$data=$this->queryAll($info);
 		return $data;
 	}

 	function add_user(){
 		    
 		$info="INSERT INTO users(first_name,last_name,user_name,passwords,address,contact,gernder,occupation,disease_type,medicine_type)
 		     VALUES('$this->first_name','$this->last_name','$this->user_name','$this->passwords','$this->address','$this->contact',' $this->gernder',' $this->occupation','$this->disease_type','$this->medicine_type')";
 		$data=$this->queryAll($info);

 		return $data;
 	}
 	function update_user(){
 		$info="UPDATE users SET first_name='$this->first_name' WHERE user_id=2";
 		$update_data=$this->queryAll($info);
 		return $update_data;
 	}
 }


?>






<?php
//creating my objects and access function 
  $api_object= new API();

    if ($_GET['action']=='fetch_users'){
        $data=$api_object->fetch_users();
    }

    if($_GET['action']=='fetch_Bookings'){
        $data=$api_object->fetch_Bookings();
    }

    if($_GET['action']=='delete_booking'){
        $rowid = $_GET['rowid'];
        $data=$api_object->delete_booking($rowid);
    }
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