<?php 
    require'header.php';
    require'dbcon.php';




$q= mysqli_query($con,"SELECT applicants.id,applicants.sname, applicants.fname, applicants.gender, applicants.email, applicants.marital_stat,applicants.nationality, applicants.phone, applicants.spouse_name, applicants.spouse_phone, applicants.state, applicants.lga, applicants.residential_addr, applicants.area_close2u, applicants.identification, applicants.id_number, applicants.name_nxtkin,applicants.kin_phone, applicants.kin_addr, applicants.relationship, applicants.meduim_reached, applicants.agent_code,applicants.date, status.status, status.remark ,status.agent FROM applicants INNER JOIN status ON applicants.id=status.applicant_id WHERE status.status=2 ORDER BY applicants.date desc");
    
   ?>

    <!-- Main container -->

  
 
   
    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Rejected Applicants
                                <span class="badge badge-danger"><b>
                                    <?php 
                                         $sql="SELECT COUNT(id) AS new FROM status  WHERE status.status=2  ";
                                         $sql= mysqli_query($con, $sql);
                                         $total= mysqli_fetch_array($sql);
                                         echo $total['new'];
                                    ?></b>
                                </span>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date Registered</th>
                                            <th>Applicant Bio Details</th>
                                            <th>Residential Address</th>
                                            <th>Close Location</th>
                                            <th>Next Of Kin</th>
                                            <th>Meduim Reached</th>
                                            <th> Remarks </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       if($q){

                                       while ($qq = mysqli_fetch_array($q)){ 
                                    
                                       ?>
                                        <tr>
                                            <td> <?php  echo $status= $qq['date'];?></td>
                                            <td>
                                            <?php echo '   <a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pass'.$qq['id'].'"  title=" View Applicant detials" >'. $qq['sname'].'  ' .$qq['fname'].'
                                                </a>

                                                    <div class="collapse" id="pass'.$qq['id'].'">'; ?>
                                
                                        <div class="well" style="height:auto;">
                                      
                                                <span class="text-center"></span>
                                        
                                            <div class="box-body">
                                                 <div class="">
                                                    <p><b>Gender: </b> <?php echo $qq['gender']; ?></p>
                                                    <p><b>Phone: </b> <?php echo $qq['phone'];  ?></p>
                                                    <p><b>Email: </b> <?php echo $qq['email']; ?></p>
                                                    <p><b>Marital Status: </b> <?php echo $qq['marital_stat']; ?></p>
                                                    <p><b>Nationality: </b> <?php echo $qq['nationality']; ?></p>
                                                    <p><b>State | LGA: </b> <?php echo $qq['state']. " | " . $qq['lga']; ?></p>
                                                    <hr>
                                                    <p><b>Spouse Details: </b> <?php echo $qq['spouse_name']." | ".$qq['spouse_phone']; ?></p>


                            </div>
                                            </div>
                                        </div>



                                           </td>
                                            <td><?php  echo $qq['residential_addr'];?></td>
                                            <td><?php  echo $qq['area_close2u'];?></td>
                                            <td>
                                               <p> <b>Name: </b> <?php echo  $qq['name_nxtkin'];?></p>
                                               <p><b> Tel: </b><?php echo $qq['kin_phone'];?></p>
                                               <p> <b> Address: </b><?php echo $qq['kin_addr'];?> </p>  
                                            </td>

                                             <td><?php  echo $qq['meduim_reached'];?></td>

                                             <?php  $agent= $qq['agent'];
                                                 $qa=" SELECT name FROM agents WHERE id= '$agent' ";
                                                    $qa= mysqli_query($con, $qa);
                                                    $qa= mysqli_fetch_array($qa);
                                                    $agent=$qa['name'];

                                            ?>
                                            <td> <?php  echo $status= $qq['remark']."<br/>by <span class='badge badge-warning'> ".$agent."</span>";?></td>
                                            <td>
                                                <a href="remark.php?id=<?php echo $qq['id']; ?>" class="btn btn-primary btn-sm" data-toggle="tooltip"><i class="fa  fa-Edit " style="color:green"  data-toggle="tooltip" title="Add a Remark"></i> Change Remark</a>
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
    </div><!-- /#right-panel -->

  <?php require'footer.php';?>