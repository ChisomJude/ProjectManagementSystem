<?php error_reporting(0);
require_once "includes/agentheader.php";

   $sch= $_GET['sch'];
    session_start();
    //$_SESSION['sch_id']= $sch;
        $q= "SELECT * from gidimosch where id = '$sch'";    
        $q= mysqli_query($con, $q);
        $q= mysqli_fetch_array($q);
       $sch_name= $q['sch_name']; 
       
        
            
?> 
 <div class="panel-body">
	<div class="alert alert-danger">
	    		    
<?php
if(isset($_POST['progress'])){
         $status= $q['status'];
       $update= "UPDATE `gidimosch` SET `status` = '$status' WHERE `gidimosch`.`id` = '$sch'";
                 $update= mysqli_query($con, $update);
                   if($update){
                    echo "<h4 style='color:green'>Your School  progress has been Updated Successfully</h4>";
             }else{
                 echo "<h4 style='color:danger'>Sorry, Please try again later! </h4>"; 
             }
               

          
  
    
}else{
                 echo "<span>
		    	      <h4> Comfirm your progress on -  $sch_name </h4> <br>
		    	            <i style='color:red'> <a href='gidiall.php'> View School Registration List</a></i>
		    	        </span>";
   }
?>
	    
		    	
		    </div>	        
			
			 <div class="row">
                   <div class="col-md-8 col-xs-12 first-half">          
			     <form action="" method="post" enctype="multipart/form-data">
			                <div class="form-inline">
                                    <p class="h4">Update Process 
                                       <select name="status" class="form-control">
                                            <option value="0">Just Visited this School</option>
                                            <option value="1">Done Gidimo Presentation to Student and Teachers</option>
                                            <option value="2">This school has subcribed for Gidimo</option>
                                            
                                        </select>
                                       
	                           </p>
	                         </div>
	                            <br>
			                    
	                            
	                            <div class="form-cluster">
			                    	<input type="submit"  class='btn btn-danger' name="progress" value="Submit Progress" />
			                    </div>
	            </form> </div>  









<?php 
require_once "includes/agentfooter.php";
?>