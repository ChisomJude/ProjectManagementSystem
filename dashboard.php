<?php 
//error_reporting(0);
require_once "includes/agentheader.php";
?>
    <!-- /. ROW  -->
    <?php
    $count= mysqli_query($con, "SELECT COUNT(id) as mysch FROM `schools` WHERE `agent_id` = '$agent' ");
    $count= mysqli_fetch_array($count);
    $sch= $count['mysch'];
    
    
   $count2= mysqli_query($con, "SELECT SUM(invoiced) as invoiced FROM `schools` WHERE `agent_id` = '$agent' ");
    $count2= mysqli_fetch_array($count2);
    $invoice= $count2['invoiced'];
    
    $list= mysqli_query($con, "SELECT COUNT(id) as listing FROM list_upload WHERE `agent_id`= '$agent'");
        $list= mysqli_fetch_array($list);
        $listing= $list['listing']; 
        
          $earn= mysqli_query($con, "SELECT SUM(total) as amount  FROM payment WHERE `agent_id`= '$agent'");
        $earned= mysqli_fetch_array($earn);
        $earned= $earned['amount']; 
    ?>
                    <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-university"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"> Acquired List</p>
                    <p class="text-muted"><a href="">View </a></p>
                </div>
             </div>
		     </div>
           
		       <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-list"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Team Lead</p>
                    <p class="text-muted"><a href="">View </a> </p>
                </div>
             </div>
		     </div>
		     
		     <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-user"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Profile</p>
                    <p class="text-muted"><a href="">View </a></p>
                </div>
             </div>
		     </div>
		     
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-get-pocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Earned</p>
                    <p class="text-muted">NGN <?php
                    if(mysqli_num_rows($earn)==0){
                        echo "0.0";
                        }else{
                            echo $earned ;
                        } ?></p>
                </div>
             </div>
		     </div>
			</div>
                 <!-- /. ROW  -->
                <hr /> 


                <div class="form_container">
                    <div class="">
                        <div class="">
                            <form action="#" method="post" role="form">
                                <?php
                                $fetch= mysqli_query($con, "SELECT * FROM  agents WHERE id= '$id'") or die(mysqli_error());
                                $fetch=mysqli_fetch_assoc($fetch);
                                $email= $fetch['email']; $sname= $fetch['surname'];$nationality= $fetch['nationality']; $gender= $fetch['gender']; $dob=$fetch['dob'];
                                $fname = $fetch['firstname']; $phone= $fetch['phone']; $raddress = $fetch['residential_address']; $status=$fetch['marital_status'];$sor=$fetch['state_of_origin'];
                                $kin= $fetch['next_of_kin']; $kin_who= $fetch['kin_relationship']; $kin_phone= $fetch['kin_phone']; $kin_addr= $fetch['kin_address'];
                                
                                    if(!isset($_POST['update_p'])){
                                        echo '<h3>Please fill in your complete details, to update your profile</h3>';
                                    }else{
                                        //update profile;
                                        $sname= mysqli_escape_string($con,$_POST['sname']);$fname=mysqli_escape_string($con,$_POST['fname']);
                                        $phone= mysqli_escape_string($con, $_POST['phone']);$nationality =mysqli_escape_string($con,$_POST['nationality']);
                                        $gender=mysqli_escape_string($con,$_POST['gender']);
                                        $status= mysqli_escape_string($con,$_POST['status']); $sor= mysqli_escape_string($con,$_POST['sor']);
                                        $raddress= mysqli_escape_string($con,$_POST['raddress']);
                                        $dob= mysqli_escape_string($con,$_POST['dob']); $kin_who=mysqli_escape_string($con,$_POST['kin_who']);
                                        $kin=mysqli_escape_string($con,$_POST['kin']); $kin_phone=mysqli_escape_string($con,$_POST['kin_phone']);
                                        $kin_addr= mysqli_escape_string($con,$_POST['kin_address']);
                                        $agent_team = mysqli_escape_string($con,$_POST['agent_team']);
                                        
                                        $q="UPDATE `agents` SET `firstname`='$fname',`phone`='$phone',
                                                                `surname`='$sname',`gender`='$gender',
                                                                `marital_status`='$status',`dob`='$dob',
                                                                `residential_address`='$raddress',`nationality`='$nationality',
                                                                `state_of_origin`='$sor',`kin_phone`='$kin_phone',
                                                                `next_of_kin`='$kin',`kin_relationship`='$kin_who',`agent_team`='$agent_team',
                                                                `kin_address`='$kin_addr' WHERE id='$id'";
                                        $Q= mysqli_query($con,$q) or die(mysqli_error());
                                        if($Q){
                                            echo "<h4 style='color:green'>Your Profile have been Updated Successfully!</h4>";
                                        }else{
                                            echo "<h4 style='color:#ff0000'>Your Profile Update Failed! Try Again Later</h4>";

                                        }
                                    }
                                ?>
                            </div>
                                <div class="row">
                                    <div class="col-md-6 first-half">
                                        <div class="form-cluster">
                                            <label for="first_name">First Name</label>
                                            <input type="text" placeholder="Enter First Name" name= "fname" required value='<?php echo $fname; ?>';>
                                        </div>

                                        <div class="form-cluster">
                                            <label for="surname">Surname</label>
                                            <input type="text" placeholder="Enter Surname" name="sname" value="<?php echo $sname; ?>" required>
                                        </div>

                                        <div class="form-cluster">
                                            <label for="enter_address">Email</label>
                                            <input type="text" placeholder="Enter Email Address" readonly name="email" value='<?php echo $email; ?>'>
                                        </div>

                                        <div class="form-cluster">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="tel" placeholder="Enter Phone Number" required name="phone" value='<?php echo $phone; ?>'>
                                        </div>

                                        <div class="form-cluster">
                                            <label for="gender">Gender</label>
                                            <select name="gender" required value='<?php echo $gender; ?>'>
                                                <option value="">Please Specify</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-cluster">
                                            <label for="m_status">Marital Status</label>
                                            <select name="status" required>
                                                <option value="">Please Specify</option>
                                                <option value="married">Married</option>
                                                <option value="single">Single</option>
                                            </select>
                                        </div>

                                        <div class="form-cluster">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" name="dob" max="2018-12-31" min="1950-01-31" required name="dob" value="<?php echo $dob;?>">
                                        </div>
                                    </div>
                                

                                
                                <!-- <div class="row"> -->
                                <div class="col-md-6 second-half">
                                    <div class="form-cluster">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" placeholder="Enter Nationality" required name="nationality" value='<?php echo $nationality; ?>'>
                                    </div>

                                    <div class="form-cluster">
                                        <label for="home_address">Residential Address</label>
                                        <input type="text" placeholder="Enter Residential Address" name="raddress" required value='<?php echo $raddress; ?>'>
                                    </div>

                                    <div class="form-cluster">
                                        <label for="state">State</label>
                                        <input type="text" placeholder="Enter State of Origin" name="sor" required value='<?php echo $sor; ?>'>
                                    </div>

                                    <div class="form-cluster">
                                        <label for="next_kin">Next of Kin</label>
                                        <input type="text" placeholder="Enter Next of Kin" name="kin"  required value="<?php echo $kin; ?>">
                                    </div>
                                    
                                    <div class="form-cluster">
                                        <label for="next_kin">Kin's Phone</label>
                                        <input type="text" placeholder="Enter Kin's Phone" name="kin_phone" required value='<?php echo $kin_phone; ?>'>
                                    </div>

                                    <div class="form-cluster">
                                        <label for="next_kin">Kin's Relationship</label>
                                        <input type="text" placeholder="Enter Kin's Relationship" name="kin_who" required value='<?php echo $kin_who ?>'>
                                    </div>

                                    <div class="form-cluster">
                                        <label for="next_kin">Kin's Residential Address</label>
                                        <input type="tel" placeholder="Enter Kin's Residential Address" required name="kin_address" value='<?php echo $kin_addr?>'>
                                    </div>
                                    
                                    <div class="form-cluster">
                                        <label for="next_kin">Select Team Lead</label>
                                        <select name="agent_team" class="agent" class='form-control-sm form-control' required>
                                                    <option value="0">Select Agent</option>
                                                    <?php
                                                
                                                    $sql = mysqli_query($con,"SELECT * FROM agents WHERE agent_code = agent_team ");
                                                    while($row=mysqli_fetch_array($sql))
                                                    {
                                                    echo '<option value="'.$row['agent_code'].'">'.$row['firstname'].' '.$row['surname'].' '. $row['agent_code'].'</option>';
                                                    } ?>
                                                    </select><br/><br/>
                                                    </div>
                                <!-- </div> -->
                                </div>

                                    <button type="submit" class="btn btn-primary update" name="update_p">Update Profile</button>
                                    
                            </form>
                        </div>
                    </div>
                </div>
 <?php require_once "includes/agentfooter.php";?>