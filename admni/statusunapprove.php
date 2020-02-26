<?php
require'dbcon.php';

	$agent_id= $_GET['id'];
	$admin=$_GET['admin'];
	 $date = date("Y-m-d");
	
	   $query="UPDATE `status` SET 
                            `status` = '2',
                             `init` = '1',
                             `agent` = '$admin',
                            `remark` = '$remark',
                            `status_date` = '$date'
                                     WHERE `applicant_id` = '$agent_id' ";
                        					$qrr=mysqli_query($con, $query);
                        					if($qrr){
	                                        	header("Location:index.php?msg=Your approval was successful.");
                        					}
	





?>