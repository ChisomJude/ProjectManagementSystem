<?php error_reporting(0);
require_once "includes/agentheader.php";
?>              
              <!-- /. FORM FIELDS  -->
                <div class="form_container">
                    <div class="">
                        <div class="">
                            <form action="" method="post" role="form">
                             <?php   
                            // echo  $date= date('Y-m-d');
                             if(!isset($_POST['add_school'])){
                                   echo "<h3>Please fill in complete profile of the School</h3>";
                                   
                                    }else{
                                        $sch_name = mysqli_escape_string($con,$_POST['sch_name']);
                                        $sch_addr = mysqli_escape_string($con,$_POST['sch_addr']);
                                        $bstop= mysqli_escape_string($con,$_POST['bstop']);
                                        $lga = mysqli_escape_string($con,$_POST['lga']);
                                        $state =mysqli_escape_string($con,$_POST['state']);
                                        
                                        $person =mysqli_escape_string($con,$_POST['person']);
                                        $email= mysqli_escape_string($con,$_POST['email']);
                                        $phone =mysqli_escape_string($con,$_POST['phone']);
                                        $type= mysqli_escape_string($con,$_POST['type']);
                                        $sch_size= mysqli_escape_string($con,$_POST['size']);
                                         $person_desig = mysqli_escape_string($con,$_POST['person_desig']);
                                         $date= date('Y-m-d');
                                        
                                   $q= "INSERT INTO `gidimosch` (`id`, `agent_id`, `sch_name`, `sch_addr`, `status`, `sch_size`,`lga`, `state`, `contact_name`,`contact_person_designation`,`email`, `phone`,`date`)
                                                         VALUES (NULL, '$agent', '$sch_name', '$sch_addr', '$type',$sch_size, '$lga', '$state', '$person', '$person_desig','$email', '$phone', '$date')";
                                                 
                                                 ?>
                                                <script>
                                                    $(document).ready(function(){
                                                            $('.llp').hide();
                                                    });
                                                </script>
                                                
                                                <?php
                                                    if($q= mysqli_query($con,$q)){
                                                        echo"<h4 style='color:green'>Your School Registration was Successful 
                                                        <a href='gidiall.php' title='View list of your schools'>View Schools</a></h4>";
                                            }else{
                                                 echo"<h4 style='color:red'>Your School Registration Failed!</h4>";
                                            }
                                   
                                    }
                                    
                               ?>
                        </div>
                    </div>
                        <div class="row llp">
                            <div class="col-md-6 first-half">
                                <div class="form-cluster">
                                    <label for="">Name of School</label>
                                    <input type="text" placeholder="" name="sch_name" required>
                                </div>

                                <div class="form-cluster">
                                    <label for="">School Address</label>
                                    <input type="text" placeholder="" name="sch_addr" required>
                                </div>

                                <div class="form-cluster">
                                    <label for="">Nearest Bus Stop</label>
                                    <input type="text" placeholder="" name="bstop" required>
                                </div>

                                <div class="form-cluster">
                                    <label for="">Local Government Area</label>
                                    <input type="text" placeholder="" name="lga" required>
                                </div>

                                <div class="form-cluster">
                                    <label for="">State</label>
                                    <input type="text" placeholder="" name="state" required>
                                </div>


                            </div>



                            <!-- <div class="row"> -->
                            <div class="col-md-6 second-half">
                                <div class="form-cluster">
                                    <label for="">Contact Name</label>
                                    <input type="text" placeholder="" required name="person">
                                </div>
                                <div class="form-cluster">
                                    <label for="">Contact Person Designation</label>
                                    <input type="text" placeholder="" required name="person_desig">
                                </div>

                                <div class="form-cluster">
                                    <label for="">Email Address</label>
                                    <input type="text" placeholder="" name="email">
                                </div>

                                <div class="form-cluster">
                                    <label for="">Phone Number</label>
                                    <input type="tel" placeholder="" required name="phone">
                                </div>
                                    
                                <div class="form-cluster">
                                    <label for="">School Size(Population) </label>
                                    <input type="number" placeholder="" required name="size">
                                </div>
                                    
                                <div class="form-cluster">
                                    <label for="">Progress Status</label>
                                    <select name="type" id="" required>
                                        <option value="">Please Specify</option>
                                        <option value="0">Visited</option>
                                        <option value="1">Presented</option>
                                        <option value="2">Subcribed</option>
                                    </select>
                                </div>

                            </div>
                            <button type="submit"name="add_school" class="btn btn-default add" onclick="">Add School</button>
                           </div>

                    </form>
                 </div>
                    </div>
                 </div>

<?php 
error_reporting(0);
require_once "includes/agentfooter.php";
?>
