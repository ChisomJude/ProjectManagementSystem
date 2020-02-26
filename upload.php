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
if(isset($_POST['progress'])){
    if(isset($_GET['list'])){
         $invoiced= $q['invoiced'];
           $listing =$_POST['listing'];   
        }
        
          if(isset($_GET['invoice'])){
         $listing = $q['sch_records'];
           $invoiced = $_POST['invoiced'];   
        }
    
     if(!empty($_FILES['image'])){
               
              $errors= array();
              $filename = $_FILES['image']['name'];
              $file_name= $sch_name." ".$filename;
              $file_size =$_FILES['image']['size'];
              $file_tmp =$_FILES['image']['tmp_name'];
              $file_type=$_FILES['image']['type'];
              $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
              
              $extensions= array("xls","xlsx","docx");
              
              if(in_array($file_ext,$extensions)=== false){
                 $errors[]="<h4 style='color:red'>No File uploaded! </h4>";
              }
              
              if($file_size > 2097152){
                 $errors[]="<h4 style='color:red'>File size must be excately 2 MB</h4>";
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,"uploads/".$file_name);
                 
                 //Add to the Database
                 $date= date('Y-m-d');
                 //CHECK IF EXIST THEN INSERT ELSE UPDATE
                 $q= mysqli_query($con,"SELECT id FROM list_upload WHERE type_id='$sch'");
                 if(mysqli_num_rows($q)==0){
                 
                     $q= mysqli_query($con, "INSERT INTO `list_upload` (`id`,`type`, `type_id`, `agent_id`, `filename`, `date`) VALUES (NULL, 'School', '$sch', '$agent', '$file_name', '$date')");
                     if($q){
                        "UPDATE `schools` SET `sch_records` = '$listing', invoice= '$invoiced' WHERE `schools`.`id` = '$sch'";
                         $update= mysqli_query($con, $update);
                           if($update){
                            echo "<h4 style='color:green'>Your School List progress has been Updated </h4>";
                     }
                    }else{
                     echo "Insert Error! Please try again later ";
                        
                    }
                    
                 }else{
                     //update list
                     
                     $up= mysqli_query($con,"UPDATE `list_upload` SET `filename` = '$file_name', date= '$date' WHERE `list_upload`.`id` = '$sch'");
                      if($up){
                         
                         $update= "UPDATE `schools` SET `sch_records` = '1' WHERE `schools`.`id` = '$sch'";
                         $update= mysqli_query($con, $update);
                           if($update){
                            echo "<h4 style='color:green'>Your School List progress has been Updated </h4>";
                     }else{
                         echo "<h4 style='color:danger'>Sorry, Please try again later! </h4>"; 
                     }
                       
                     }
                 }
                 
                 
              }else{
                 print_r($errors);
              }
           }
    
       $update= "UPDATE `schools` SET `sch_records` = '$listing',`invoiced` = '$invoiced' WHERE `schools`.`id` = '$sch'";
                 $update= mysqli_query($con, $update);
                   if($update){
                    echo "<h4 style='color:green'>Your School List progress has been Updated </h4>";
             }else{
                 echo "<h4 style='color:danger'>Sorry, Please try again later! </h4>"; 
             }
               

          
  
    
}else{
                 echo "<span>
		    	      <h4> Comfirm your registration progress on -  $sch_name </h4> <br>
		    	            <strong> Please Ensure to Upload Excel File  only </strong> or 
		    	            <br><i style='color:red'> <a href='all.php'> View School Registration List</a></i>
		    	        </span>";
   }
?>
	    
		    	
		    </div>	        
			
			 <div class="row">
                   <div class="col-md-8 col-xs-12 first-half">          
			     <form action="" method="post" enctype="multipart/form-data">
			                <div class="form-inline">
                                    <p class="h4">Update Process <small>Check the box below</small></p><br>
                                       
                                       <?php if(isset($_GET['list'])){ ?>
                                        <select name="listing" class="form-control">
                                            <option value="0">No Listing Uploaded yet</option>
                                            <option value="1">I have uploaded Listing for this School</option>
                                            
                                        </select>
                                        <div class="form-cluster">
                                         <label for="">	Upload excel file for Listing (optional) </label>
	                                    <input type="file" name="image" value=""  class="form-control"/>                         
	                                 </div>
	                            <br>
                                        <?php }
                                        if(isset($_GET['invoice'])){ ?>
	                                   <hr>
                                        <select name="invoiced" class="form-control">
                                            <option value="0">Not Invoiced yet</option>
                                            <option value="1">I have sent Invoice for this School</option>
                                            
                                        </select>     
                                        <?php }?>
	                            </div>
	                            <br>
			                    
	                            
	                            <div class="form-cluster">
			                    	<input type="submit"  class='btn btn-danger' name="progress" value="Submit Progress" />
			                    </div>
	                   </div>         
			
			         
		    	</form>









<?php 
require_once "includes/agentfooter.php";
?>