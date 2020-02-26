<?php
require'../includes/dbcon.php';

	$agent= $_GET['agent'];
	$status= $_GET['status'];
	$sch_id= $_GET['id'];
	$admin=$_GET['admin'];
	 $date = date("Y-m-d");
	
	
	// first level approval Aprroving a sch 
	 if($status== 1){
    	$query= "UPDATE `schools` SET `status` = '1' WHERE `schools`.`id` = '$sch_id' && agent_id ='$agent'";
	  	 $qrr=mysqli_query($con, $query);
            if($qrr){
                 $query2="INSERT INTO `payment` (`id`, `agent_id`, `sch_id`, `reg_earning`, `regdate_approved`,`schappr_by_admin`, `total`) 
                                            VALUES (NULL, '$agent', '$sch_id', '2000', '$date', '$admin', '2000');";
	                                        
	                                        $query2= mysqli_query($con, $query2);
	                                        	header("Location:index.php?msg=School registration approval was successful.");
                        					}
	     
	 }


// second Level approval -- approving a list 
 
	 if($status== 2){
    	$query= "UPDATE `schools` SET `status` = '2', `sch_records` = '2' WHERE `schools`.`id` = '$sch_id' && agent_id ='$agent'";
	  	 $qrr=mysqli_query($con, $query);
            if($qrr){
                 $query2="UPDATE `payment` SET `list_earning` = '3000', `listdate_approved` = '$date', `listappr_by_admin` = '$admin', `total` = '5000' WHERE `payment`.`sch_id` = '$sch_id' ";

	                                        $query2= mysqli_query($con, $query2);
	                                        	header("Location:index.php?msg=School List approval was successful.");
                        					}
	     
	 }

?>