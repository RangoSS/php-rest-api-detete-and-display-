
<?php
include "connection.php";

 class API extends connecting{

 	       var $first_name='aaaaa';
 		   var  $last_name='dm';
 		   var $user_name='sa';
 		    var $passwords='mo';
 		    var $address='el';
 		    var  $contact='453556556';
 		     var $gernder='yu';
 		     var $occupation='de';
 		    var  $disease_type='de';
 		     
 		     var $medicine_type='de';
           
              var $use_id=16588;

             

 	function fetch_users(){

 		$info="SELECT * from users";
 		$get_users=$this->queryAll($info);
         while($row=mysqli_fetch_assoc($get_users)){
         	   $data[]= $row;
         }

 		return $data;
 	}

 	function fetch_Bookings(){
        $info1="SELECT first_name,last_name,user_name,address,contact,gernder,occupation,date_to,time_at,u.user_id FROM users u
                     JOIN booking b
                     ON u.user_id=b.user_id;
	                 ";
	   $get_booking=$this->queryAll($info1);
	   while($row=mysqli_fetch_assoc($get_booking)){
	   	    $data[]=$row;
	   }
	   return $data;
 	}

 	function delete_booking(){
 		
 		$info2="DELETE FROM users WHERE user_id='$this->use_id'";
 		$del_me=$this->queryAll($info2);
 		echo 'one record has been deleted';
 		return $del_me;
 	}

 	function add_user(){
 		    
 		$info3="INSERT INTO users(first_name,last_name,user_name,passwords,address,contact,gernder,occupation,disease_type,medicine_type)
 		     VALUES('$this->first_name','$this->last_name','$this->user_name','$this->passwords','$this->address','$this->contact',' $this->gernder',' $this->occupation','$this->disease_type','$this->medicine_type')";
 		$insert=$this->queryAll($info3);

 		return $insert;
 	}
 	function update_user(){
 		$info4="UPDATE users SET first_name='$this->first_name' WHERE user_id=2";
 		$update_data=$this->queryAll($info4);
 		return $update_data;
 	}
 }


?>