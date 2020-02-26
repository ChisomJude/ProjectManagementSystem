<?php 
    require'header.php';
    require'../includes/dbcon.php';
    $adminid=$_SESSION['adminid'];

 
    ?>

    <!-- Main container -->
     <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-header">
                                
                                <strong class="card-title">SELECT AGENTS TO VIEW  SCHOOLS
                                
                                    <span style="color:#4aa00f">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  <?php echo @$_GET['msg']; ?></span>
                                        </strong>

                            </div>
                           
                            <div class="card-body">
                                 <div class="row">
                                        <div class="col-md-6">
                                            
                                                <div class='form-group'>
                                                    <form action="" method="post">
                                                    <label class=''>Agent:
                                                    <select name="agent" class="agent" class='form-control-sm form-control' required>
                                                    <option value="0">Select Agent</option>
                                                    <?php
                                                
                                                    $sql = mysqli_query($con,"SELECT * FROM agents");
                                                    while($row=mysqli_fetch_array($sql))
                                                    {
                                                    echo '<option value="'.$row['agent_code'].'">'.$row['firstname'].' '.$row['surname'].' '. $row['agent_code'].'</option>';
                                                    } ?>
                                                    </select><br/><br/>
                                                    <input type="submit" name="view_schools" class="btn btn-primary" value="View Agent Schools">
                                                    </label>
                                                    </form>
                                                </div>
                                                </div>
                                                
                                        <div class="col-md-6">
                                             <div class='form-group'>
                                                    <form action="" method="post">
                                                    <label class=''>
                                                        <input type="submit" name="view_agent" class="btn btn-primary" value="View Agent Details">
                                                    </label>
                                                    </form>
                                                </div>
                                                </div>
                                        </div>
                                                <?php 
                                                     if($_POST['view_agent'] ){
                                                      // $agent= $_POST['agent'];
 
                                                    ?>
                                            
                                                     <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                     <thead>
                                                            
                                                    <tr>
                                                        <th>s/n</th>
                                                         
                                                        <th>Agent Details </th>
                                                        <th>Next of Kin</th>
                                                        <th>Schools</th>
                                                        <th>Amount Earned</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php 
                                                    $qr= mysqli_query($con, "SELECT * FROM agents");
                                                    $x=0;
                                                   if($qr){
                                                     while ($qqr = mysqli_fetch_array($qr)){ 
                                                    $x++;
                                                   ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $x; ?></td>
                                                        <td> 
                                                      
                                                        <?php echo '<a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pass'.$qqr['id'].'"  title=" View Agent detials" >'. $qqr['firstname'].'  '. $qqr['surname'].' ('.$qqr['agent_code'].')
                                                            </a>
            
                                                                <div class="collapse" id="pass'.$qqr['id'].'">'; ?>
                                            
                                                                 <div class="well" style="height:auto;">
                                                  
                                                            <span class="text-center"></span>
                                                    
                                                        <div class="box-body">
                                                             <div class="">
                                                                <p><b>Phone: </b> <?php echo $qqr['phone']; ?> &nbsp; &nbsp; ><b>Email: </b> <?php echo $qqr['email'];  ?></p>
                                                                <p><b>Gender: </b> <?php echo $qqr['gender'];  ?> &nbsp;&nbsp; <b>Marital Status: </b> <?php echo $qqr['marital_status'];  ?></p>
                                                                <p>><b>Date of Birth: </b> <?php echo $qqr['dob']; ?></p>   <hr>
                                                                <p><b>Address: </b> <?php echo $qqr['residential_address']; ?></p>
                                                                <p><b>State of Origin | Nationality: </b> <?php echo $qqr['state_of_origin']. " | " . $qqr['nationality']; ?></p>
                                                              
            
            
                                        </div>
                                                        </div>
                                                    </div>
            
            
            
                                                       </td>
                                                        <td><?php echo '   <a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pas'.$qqr['id'].'"  title=" View Contact Detials" >'. $qqr['next_of_kin'].' 
                                                            </a>
            
                                                                <div class="collapse" id="pas'.$qqr['id'].'">'; ?>
                                            
                                                    <div class="well" style="height:auto;">
                                                  
                                                            <span class="text-center"></span>
                                                    
                                                        <div class="box-body">
                                                             <div class="">
                                                                <p><b>Relationship: </b> <?php echo $qqr['kin_relationship']; ?></p>
                                                                <p><b>Phone: </b> <?php echo $qqr['kin_phone'];  ?></p>
                                                               <hr>
                                                               <p><b>Address: </b> <?php echo $qqr['kin_address'];  ?></p>
                                                               </td>
                                                        
                                                        <td>
                                                        <?php  
                                                            $sch= mysqli_query($con, "SELECT COUNT(id) as sch FROM schools WHERE agent_id = '$qqr[agent_code] '");
                                                             $sch= mysqli_fetch_array($sch);
                                                              echo  $agent = "<span class='badge badge-danger'>". $sch['sch']."</span>";
                                                                ?>
                                                            </td>
                                                        <td><?php
                                                             $sch= mysqli_query($con, "SELECT SUM(total) as pay FROM payment WHERE agent_id = '$qqr[agent_code] '");
                                                             $sch= mysqli_fetch_array($sch);
                                                             if($sch['pay'] != 0){
                                                                     echo  $agent = "<span class='badge badge-success'>NGN ". $sch['pay']."</span>";
                                                             }else{
                                                                 echo "<span class='badge badge-danger'>No Amount Earned</span>";
                                                             }
                                                                ?>
                                                               
                                                        </td>
                                       
                                     
            
            
                                                             
                                                    </tr>
                                                  </div></div>
                                                  <?php } ?>
                                                </tbody>
                                            </table>
                                </div>
            
                     </div>
                        </div><!-- .animated -->
                    </div><!-- .content -->
            
            
            
            <?php } 
            
        
                                                     }
                                                    ?>
                                                
                                                
                                                

                                                    <?php 
                                                    //view schools by agents selected
                                                     if($_POST['view_schools'] &&  ($_POST['agent'] != 0)){
                                                       $agent= $_POST['agent'];
                                                     ?>
                                            
                                                     <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                     <thead>
                                                            
                                                    <tr>
                                                        <th>s/n</th>
                                                         <th>Date Registered</th>
                                                        <th>School Details</th>
                                                        <th>Contact Person</th>
                                                        <th>List</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php 
                                                    $q= mysqli_query($con, "SELECT * FROM schools WHERE agent_id='$agent'");
                                                    $x=0;
                                                   if($q){
            
                                                   while ($qq = mysqli_fetch_array($q)){ 
                                                    $x++;
                                                   ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $x; ?></td>
                                                        <td> <?php  echo $status= $qq['date'];?>
                                                        <td>
                                                        <?php echo '   <a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pass'.$qq['id'].'"  title=" View School detials" >'. $qq['sch_name'].' 
                                                            </a>
            
                                                                <div class="collapse" id="pass'.$qq['id'].'">'; ?>
                                            
                                                    <div class="well" style="height:auto;">
                                                  
                                                            <span class="text-center"></span>
                                                    
                                                        <div class="box-body">
                                                             <div class="">
                                                                <p><b>School Type: </b> <?php echo $qq['sch_type']; ?></p>
                                                                <p><b>School Size: </b> <?php echo $qq['sch_size'];  ?></p>
                                                                <p><b>Address: </b> <?php echo $qq['sch_addr']; ?></p>
                                                                <p><b>State | LGA: </b> <?php echo $qq['state']. " | " . $qq['lga']; ?></p>
                                                                <hr>
            
            
                                        </div>
                                                        </div>
                                                    </div>
            
            
            
                                                       </td>
                                                        <td><?php echo '   <a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pas'.$qq['id'].'"  title=" View Contact Detials" >'. $qq['contact_name'].' 
                                                            </a>
            
                                                                <div class="collapse" id="pas'.$qq['id'].'">'; ?>
                                            
                                                    <div class="well" style="height:auto;">
                                                  
                                                            <span class="text-center"></span>
                                                    
                                                        <div class="box-body">
                                                             <div class="">
                                                                <p><b>Designation: </b> <?php echo $qq['contact_person_designation']; ?></p>
                                                                <p><b>Phone: </b> <?php echo $qq['phone'];  ?></p>
                                                               <hr></td>
                                                        <td><?php  $list= $qq['sch_records'];
                                                        
                                                        
                                                        switch ($list) {
                            							  case "0":
                            								  echo "<small class='badge badge-danger'> No List  </small>";
                            								  break;
                            							  case "1":
                            								  echo "<small class='badge badge-warning'> List Upload Unapproved </small>";
                            								  break;
                            							  case "2":
                            								  echo "<small class='badge badge-success'>List  Approved </small>";
                            								  break;
                            								  
                            							  default:
                            								  echo "<small class='badge badge-danger'> New </small>";
                            						  };
                            						  
                                                        ?></td>
                                                        <td>
                                                          <?php  $status= $qq['status'];
                                                        
            
                            						  switch ($status) {
                            							  case "0":
                            								  echo "<small class='badge badge-warning'> New </small>";
                            								  break;
                            							  case "1":
                            								  echo "<small class='badge badge-success'> School Approved </small>";
                            								  break;
                            							  case "2":
                            								  echo "<small class='badge badge-info'>List  Approved </small>";
                            								  break;
                            								  
                            							  default:
                            								  echo "<small class='badge badge-warning'> New </small>";
                            						  };
                            						  echo '</td>';
                                       
                                        ?>
            
            
                                                             
                                                    </tr>
                                                  </div></div>
                                                  <?php } ?>
                                                </tbody>
                                            </table>
                                </div>
            
                     </div>
                        </div><!-- .animated -->
                    </div><!-- .content -->
            
            
            
            <?php } 
            
        
                                                     }
                                                    ?>
                    </div>
                </div>
            </div>
    </div>
                                                <!-- /#right-panel -->

  <?php require'footer.php';?>