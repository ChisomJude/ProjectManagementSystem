<?php error_reporting(0);
require_once "includes/agentheader.php";

   $sch= $_GET['sch'];
    session_start();
    //$_SESSION['sch_id']= $sch;
        $q= "SELECT * from schools where id = '$sch'";    
        $q= mysqli_query($con, $q);
        $q= mysqli_fetch_array($q);
       $sch_name= $q['sch_name']; 
        
        
            
?> 
 <div class="panel-body">
	<div class="alert alert-danger">
	    		    
<?php
   if(isset($_POST['comment'])){
      $review= $_POST['comments'];
       $up= mysqli_query($con,"UPDATE `schools` SET `team_lead_comment` = '$review', `status` = '5' WHERE `schools`.`id` = '$sch'");
              if($up){
                 
                 
                    echo "<h4 style='color:green'>Your School Review has been sent to Admin Successfully </h4>";
              }
   }else{
                 echo "<span>
		    	      <h4> Give your Review  For Approval -  $sch_name </h4>
		    	            <strong>Confirm all details details about this School</strong> or 
		    	            <br><i style='color:red'> <a href='team.php'> Back to View School Again</a></i>
		    	        </span>";
   }
?>
	    
		    	
		    </div>	        
			
			 <div class="row">
                   <div class="col-md-8 first-half">          
			     <form action="" method="post" >
			       
			                    <div class="">
                                    <label for="">	Give Remark for Admin Approval </label>
	                                    <textarea  name="comments" class="form-control" required/></textarea>                         
	                            </div>
	                            <br>
	                            
	                            <div class="form-cluster">
			                    	<input type="submit"  class='btn btn-danger' name="comment" value="Send Review" />
			                    </div>
	                   </div>         
			
			         
		    	</form>









<?php 
require_once "includes/agentfooter.php";
?>