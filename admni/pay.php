<?php
require'../includes/dbcon.php';

	$sch= $_GET['sch'];
	$amount= $_GET['amt'];
	//$sch_id= $_GET['id'];
	$admin=$_GET['admin'];
	 $date = date("Y-m-d");
	
	
	//approving the first time- check if the school has been paid before
        
    	$query= "UPDATE `payment` SET `paid_out_status` = '1',paid_out_amount='$amount', paid_out_admin='$admin', paid_out_date='$date'  WHERE `payment`.`sch_id` = '$sch' ";
	  	 $qrr=mysqli_query($con, $query);
            if($qrr){
              	header("Location:payagent.php?msg=Payment has been  cashed out successful! ");
                        					}
	     
	