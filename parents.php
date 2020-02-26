<?php 
//error_reporting(0);
require_once "includes/agentheader.php";
?>
                <!-- /. FORM FIELDS  -->
                <div class="form_container">

                    <form action="#" method="post" role="form">
                         <?php    if(!isset($_POST['add_parent'])){
                                
                               echo " <h3>Please fill in the blank fields of the Parents/Guardian</h3>";
                                
                                    }else{
                                        $pname = mysqli_escape_string($con,$_POST['pname']);
                                        $p_addr = mysqli_escape_string($con,$_POST['p_addr']);
                                        $job_type= mysqli_escape_string($con,$_POST['job_type']);
                                        $nationality = mysqli_escape_string($con,$_POST['nationality']);
                                        $budget =mysqli_escape_string($con,$_POST['budget']);
                                        $children =mysqli_escape_string($con,$_POST['children']);
                                        $email= mysqli_escape_string($con,$_POST['email']);
                                        $phone =mysqli_escape_string($con,$_POST['phone']);
                                        $gender= mysqli_escape_string($con,$_POST['gender']);
                                        $state= mysqli_escape_string($con,$_POST['state']);
                                        
                                   $q= "INSERT INTO `parents` (`id`, `agent_code`, `parents_name`, `gender`, `email`, `phone`, `residential_address`, `state_of origin`, `nationality`, `no_children`, `tuition_budget`, `job_status`,`status`)
                                   VALUES (NULL, '$agent', '$pname', '$gender', '$email', '$phone', '$p_addr', '$state', '$nationality', '$childern', '$budget', '$job_type','0')";
                                                 
                                                 ?>
                                                <script>
                                                    $(document).ready(function(){
                                                            $('.llp').hide();
                                                    });
                                                </script>
                                                
                                                <?php
                                                    if($q= mysqli_query($con,$q)){
                                                        echo"<h4 style='color:green'>Your Parent Registration was Successful 
                                                        <a href='all.php' title='View list added So far'>View Schools</a></h4>";
                                            }else{
                                                 echo"<h4 style='color:red'>Sorry, Your Registration Failed!</h4>";
                                            }
                                   
                                    }
                                    
                               ?>
                        
                     

                        <div class="row llp">
                            <div class="col-md-6 first-half">
                                <div class="form-cluster">
                                    <label for="">Name of Parents/Guardian</label>
                                    <input type="text" placeholder="" name="pname" required>
                                </div>

                                <div class="form-cluster">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id=""  required>
                                        <option value="">Please Specify</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="form-cluster">
                                    <label for="">Email Address</label>
                                    <input type="text" placeholder="" name="email">
                                </div>

                                <div class="form-cluster">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" placeholder="" name="phone"  required>
                                </div>

                               
                                    <div class="form-cluster">
                                        <label for="">Number of Children</label>
                                        <input type="text" placeholder="How many children do you have?" name="children"  required>
                                    </div>

                            </div>

                            <div class="col-md-6 second-half">
                                    <div class="form-cluster">
                                        <label for="">Residential Address</label>
                                        <input type="text" placeholder="" name="p_addr"  required>
                                    </div>
                                
                                
                                    <div class="form-cluster">
                                        <label for="">State of Orign</label>
                                        <input type="text" placeholder="" name="state">
                                    </div>
                                    
                                    <div class="form-cluster">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" placeholder="" name="nationality">
                                </div>

                                <div class="form-cluster">
                                    <label for="">Job Type</label>
                                    <select name="" id="" name="job_type">
                                        <option value="">Please Specify</option>
                                        <option value="Unemployed">Unemployed</option>
                                        <option value="Self Employed">Self Employed</option>
                                        <option value="Employed">Employed</option>
                                    </select>
                                </div>
                                   
    
                                    <div class="form-cluster">
                                        <label for="">Tution Budget</label>
                                        <input type="text" placeholder="Specify Term Budget for your Children" name="budget"  required>
                                    </div>
    
                                </div>
                                  <button type="submit" class="btn btn-default add" onclick="" name="add_parent">Add Parents</button>

                        </div>
                    </form>
                </div>


                <?php 
                error_reporting(0);
                require_once "includes/agentfooter.php";
                ?>