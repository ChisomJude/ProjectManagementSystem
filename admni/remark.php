<?php 
require'header.php';
require'dbcon.php';
 if(isset($_GET['id'])){
 	$id = $_GET['id'];
 }
 

?>

    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                        			<?php
                        			 $date = date("Y-m-d");
                        				$r= mysqli_query($con,"SELECT * FROM `applicants` WHERE `id`= '$id'");
                        						$n=mysqli_fetch_array($r);
                        						$name1=$n['sname'];
                        						$name2=$n['fname'];
                        						$name= $name1." ".$name2;
                                                $init=1;
                        				if(isset($_POST['remark'])){
                        					
                        					$status=$_POST['status'];
                        					$remark= $_POST['remarkcomment'];
                        					$admin=  $_SESSION['adminid'];

                                           $query="UPDATE `status` SET 
                                                            `status` = '$status',
                                                             `init` = '1',
                                                             `agent` = '$admin',
                                                             `remark` = '$remark',
                                                             `status_date` = '$date'
                                                                     WHERE `applicant_id` = '$id' ";
                        					$qrr=mysqli_query($con, $query);
                        					if($qrr){
                        						$goodmsg= "Remark has been added successfully";
                        					}else{
                        						$baddmsg= "Error Occcured Pls Try again later";
                        					}
                        				}
                        			?>

                            <div class="card-header">
                                <strong class="card-title">Add Remark For Applicant</strong>
                                <span class="pull-right fadeIn" style="color:green;"><?php echo @$goodmsg; ?></span>
                                <span class="pull-right fadeIn" style="color:#ff0000;"><?php echo @$baddmsg; ?></span>

                            </div>
                            <div class="card-body">

									
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                           
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Applicant Name</label></div>
                                                                <div class="col-12 col-md-9">
                                                                <input type="text" id="text-input" value="<?php echo $name; ?>" readonly="" name="name"  class="form-control">
                                                                <small class="form-text text-muted text-success">Pls Confirm Applicant Name</small></div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Your Remark</label></div>
                                                                <div class="col-12 col-md-9">
                                                                <textarea name="remarkcomment" required="" id="textarea-input" rows="4" class="form-control"></textarea></div>
                                                            </div>
                                                               
                                                         <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Select Applicant Status </label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="status" id="SelectLm" required="" class="form-control-sm form-control">
                                                                            <option value="">Please select</option>
                                                                            <option value="1">Approve</option>
                                                                            <option value="2">Unapprove</option>
                                                                            <option value="3">On Review</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                    
                                                        <button type="submit" name="remark" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Add Remark
                                                        </button>
                                                       
                                                    </form>
                                                </div>
                                                
                                            </div>





                            </div>
                        </div>
                    </div>

         </div>
            </div><!-- .animated -->
        </div><!-- .content -->

 <?php 
require'footer.php';

?>