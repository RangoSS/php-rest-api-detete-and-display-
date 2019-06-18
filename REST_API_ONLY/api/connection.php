<?php
 abstract class connecting {
  	var $host="localhost";
    var $user="root";
    var $pwd="";
  	var $database="phashions";
  	
  	function getConnection(){
  		$conn=mysqli_connect($this->host,$this->user,$this->pwd,$this->database);
      if (!$conn){
        
         Die(mysqli_error($conn));
      }
  		return $conn;
  	}

  	function queryAll($quest){

  		$con=$this->getConnection();
  		$result=mysqli_query($con,$quest) or Die(mysqli_error($con));

  		return $result;
  	}
  }


?>