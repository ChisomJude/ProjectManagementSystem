<?php 
    require'header.php';
    require'../includes/dbcon.php';
    $adminid=$_SESSION['adminid'];

    $q= mysqli_query($con,"SELECT * FROM payment");
    ?>

    <!-- Main container -->

  
 
   
    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <?php ?>
                                <strong class="card-title">Registered Schools and Payments
                                <span class="badge badge-danger"><b>
                                    <?php 
                                         $sql="SELECT COUNT(schools.id) AS new FROM `schools` INNER JOIN agents ON schools.agent_id = agents.agent_code WHERE schools.status=0 ";
                                         $sql= mysqli_query($con, $sql);
                                         $total= mysqli_fetch_array($sql);
                                         echo $total['new'];
                                    ?></b>
                                </span>
                                
                                <span style="color:#4aa00f">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo @$_GET['msg']; ?></span>
                                </strong>

                            </div>
                           
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                                 <?php 
                                                    $i=1;
                                                ?>
                                        <tr>
                                            <th>S/N</th>
                                          
                                            <th>Registered School Details</th>
                                            <th>Agent Details </th>
                                            <th>Approvals</th>
                                            
                                            <th>Amount Earned</th>
                                           
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       if($q){

                                       while ($qq = mysqli_fetch_array($q)){ 
                                           $qqrr= mysqli_query($con,"SELECT * FROM schools WHERE schools.id = $qq[sch_id]");
                                           $qqr= mysqli_fetch_array($qqrr);
                                    
                                       ?>
                                        <tr>
                                            
                                            <td><?php echo $i++; ?></td>
                                            
                                             <td>
                                            <?php echo '   <a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pass'.$qq['sch_id'].'"  title=" View school details" >'. $qqr['sch_name'] .'</a>

                                                    <div class="collapse" id="pass'.$qq['sch_id'].'">'; ?>
                                
                                        <div class="well" style="height:auto;">
                                      
                                                <span class="text-center"></span>
                                        
                                            <div class="box-body">
                                                 <div class="">
                                                    <p><b>Date Registered: </b> <?php echo $qqr['date']; ?> </p>
                                                    <p><b>School Type: </b> <?php echo $qqr['sch_type']; ?> <b>School Size: </b> <?php echo $qqr['sch_size']; ?></p>
                                                    <p><b>Address: </b> <?php echo $qqr['sch_addr']; ?></p>
                                                    <p><b>State | LGA: </b> <?php echo $qqr['state']. " | " . $qqr['lga']; ?></p>
                                                    <hr>
                                                    <p><b>List: </b>
                                                         <?php $list= $qqr['sch_records'];
                                                     $status= $qqr['status'];
                                                    if($list== 1){
                                                        $sl= mysqli_query($con,"SELECT filename from list_upload WHERE type_id = '$qq[sch_id]'");
                                                        if($sl){
                                                            $fetch = mysqli_fetch_array($sl);
                                                            $filename = $fetch['filename'];
                                                            
                                                            echo "<a href='../uploads/". $filename."' style='color:blue'>Download List</a>";
                                                        }
                                                       
                                                    }else{
                                                        echo "<span style='color:#ff0000;'>No List Uploaded</span>";
                                                    }
                                            ?>
                                                    </p>
                                                    
                            </div>
                                            </div>
                                        </div>



                                           </td>
                                            <td>
                                                 <?php 
                                                        $agent= mysqli_query($con, "SELECT firstname, surname, phone  FROM agents WHERE agent_code = '$qqr[agent_id]'");
                                                        $agent=mysqli_fetch_array($agent);
                                                 
                                                 echo '<a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pass2'.$qq['sch_id'].'"  title=" View  Agent details" >'. $agent['firstname'] .'</a>

                                                    <div class="collapse" id="pass2'.$qq['sch_id'].'">'; ?>
                                
                                        <div class="well" style="height:auto;">
                                      
                                                <span class="text-center"></span>
                                        
                                            <div class="box-body">
                                                 <div class="">
                                                    <p><b>Name: </b> <?php echo $agent['firstname']." ". $agent['surname']; ?></p>
                                                    <p><b>Phone: </b> <?php echo $agent['phone'];  ?></p>
                                                    <p><b>Email: </b> <?php echo $agent['email']; ?></p>
                                                    
                                                 </div>
                                            </div>
                                        </div>

                                            
                                            </td>
                                            
                                            
                                            
                                              <td>
                                                 <?php 
                                                       
                                                 
                                                 echo '<a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pass3'.$qq['sch_id'].'"  title=" View  Agent details" > Click to view  </a>

                                                    <div class="collapse" id="pass3'.$qq['sch_id'].'">'; ?>
                                
                                        <div class="well" style="height:auto;">
                                      
                                                <span class="text-center"></span>
                                        
                                            <div class="box-body">
                                                 <div class="">
                                                    <?php  $sch_admin= mysqli_query($con, "SELECT name  FROM admins WHERE id = '$qq[schappr_by_admin]'");
                                                        $sch_admin =mysqli_fetch_array($sch_admin);
                                                        
                                                         $sch_adminlist= mysqli_query($con, "SELECT name  FROM admins WHERE id = '$qq[listappr_by_admin]'");
                                                        $sch_adminlist =mysqli_fetch_array($sch_adminlist);
                                                        
                                                         $sch_admininv= mysqli_query($con, "SELECT name  FROM admins WHERE id = '$qq[invoiceappr_by_admin]'");
                                                        $sch_admininv =mysqli_fetch_array($sch_admininv);
                                                    ?>
                                                     
                                                    <p><b>Registration Approved: </b> <?php echo $qq['regdate_approved']; ?> by <?php echo $sch_admin['name']; ?></p>
                                                    <p><b>Listing Approved: </b> <?php echo $qq['listdate_approved']; ?> by <?php echo $sch_adminlist['name']; ?></p>
                                                    <p><b>Invoiced Approved: </b> <?php echo $qq['date_approved']; ?> by <?php echo $sch_admininv['name']; ?></p>
                                                    
                                                   </div>
                                            </div>
                                        </div>

                                            
                                            </td> 
                                            
                                            
                                            
                                           
                                            <td><b>Total Earned-</b>
                                               <?php 
                                                 echo  ($qq['reg_earning'] +  $qq['list_earning'] +  $qq['invoice_earning']);
                                                ?>
                                            </td>
                                                
                                           
                                           

                                            <td>
                                                    <?php       
            										if($qq['paid_out_status']==0){
            										    echo "<span style='color:red;'>Unpaid</span>";
            										}else{
            										   echo "<span style='color:green;'>Paid</span>"; 
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



<?php } ?>
    </div>
 <?php require'footer.php';?>