<?php 
    require'header.php';
    require'../includes/dbcon.php';
    $adminid=$_SESSION['adminid'];

    $q= mysqli_query($con,"SELECT schools.id,schools.team_lead_comment,agents.agent_team, schools.lga,schools.state,schools.contact_name,schools.contact_person_designation, schools.email,schools.phone,schools.status,schools.date,schools.sch_records,schools.sch_size, schools.`sch_name`,schools.`sch_addr`,schools.`sch_type`, agents.firstname, agents.`surname`,agents.agent_code FROM `schools` INNER JOIN agents ON schools.agent_id = agents.agent_code WHERE schools.status ='0' OR schools.sch_records ='1' OR schools.status ='5' ORDER BY date DESC ");
    ?>

    <!-- Main container -->

  
 
   
    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <?php ?>
                                <strong class="card-title">New Schools
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
                                            <th>School Details</th>
                                            <th>Contact Person</th>
                                            <th>Agent </th><th>List</th>
                                            <th> Team Lead Review</th>
                                            
                                           <th>Date Registered</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       if($q){

                                       while ($qq = mysqli_fetch_array($q)){ 
                                    
                                       ?>
                                        <tr>
                                            
                                            <td><?php echo $i++; ?></td>
                                            <td>
                                            <?php echo '   <a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pass'.$qq['id'].'"  title=" View school details" >'. $qq['sch_name'] .'</a>

                                                    <div class="collapse" id="pass'.$qq['id'].'">'; ?>
                                
                                        <div class="well" style="height:auto;">
                                      
                                                <span class="text-center"></span>
                                        
                                            <div class="box-body">
                                                 <div class="">
                                                    <p><b>School Name: </b> <?php echo $qq['sch_name']; ?></p>
                                                    <p><b>School Type: </b> <?php echo $qq['sch_type']; ?></p>
                                                    <p><b>School Size: </b> <?php echo $qq['sch_size']; ?></p>
                                                    <p><b>Address: </b> <?php echo $qq['sch_addr'];  ?></p>
                                                    <p><b>State | LGA: </b> <?php echo $qq['state']. " | " . $qq['lga']; ?></p>
                                                    
                            </div>
                                            </div>
                                        </div>



                                           </td>
                                            <td>
                                                 <?php echo '<a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pass2'.$qq['id'].'"  title=" View Contact details" >'. $qq['contact_name'] .'</a>

                                                    <div class="collapse" id="pass2'.$qq['id'].'">'; ?>
                                
                                        <div class="well" style="height:auto;">
                                      
                                                <span class="text-center"></span>
                                        
                                            <div class="box-body">
                                                 <div class="">
                                                    <p><b>Name: </b> <?php echo $qq['sch_name']; ?></p>
                                                    <p><b>Designation: </b> <?php echo $qq['contact_person_designation']; ?></p>
                                                    <p><b>Phone: </b> <?php echo $qq['phone'];  ?></p>
                                                    <p><b>Email: </b> <?php echo $qq['email']; ?></p>
                                                    
                            </div>
                                            </div>
                                        </div>

                                            
                                            </td>
                                            <td><?php  echo $qq['firstname']." ". $qq['surname'];?></td>
                                            <td>
                                               <?php $list= $qq['sch_records'];
                                                     $status= $qq['status'];
                                                    if($list== 1){
                                                        $sl= mysqli_query($con,"SELECT filename from list_upload WHERE type_id = '$qq[id]'");
                                                        if($sl){
                                                            $fetch = mysqli_fetch_array($sl);
                                                            $filename = $fetch['filename'];
                                                            
                                                            echo "<a href='../uploads/". $filename."' style='color:blue'>Download List</a>";
                                                        }
                                                       
                                                    }else{
                                                        echo "No List yet";
                                                    }
                                            ?>
                                            </td>
                                               <td/>
                                               <?php 
                                               if($qq['agent_code']==$qq['agent_team'])
                                               {
                                                   echo "User is a Team Lead";
                                               }elseif(!empty($qq['team_lead_comment'])){
                                                   echo "<span class='badge badge-success'>". $qq['team_lead_comment']."</span>"; 
                                                }else{ echo "<span class='badge badge-danger'> No comment by Team Lead </span>";}
                                                ?>
                                               </td> 
                                           
                                            <td> 
                                              <?php echo $date= $qq['date']; ?>
                                            </td>

                                            <td>
                                                <div class="btn-group">
											  
											      <?php 
											      //check if school listing was uploaded
											      
											      if( $status==0 || $status ==5 ){ ?>
											       <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Approve</button>-->
											           <a href="statusapprove.php?id=<?php echo $qq['id']."&admin=".$adminid."&agent=".$qq['agent_code']."&status=1"?>" class="btn btn-success"> Approve School</a>

											       
											        <?php }elseif($list==1){ ?>
											      	<a href="statusapprove.php?id=<?php echo $qq['id']."&admin=".$adminid."&agent=".$qq['agent_code']."&status=2"?>" class="btn btn-info"> Approve List</a>
											    	<?php }?>

											</div>
											
										
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
   <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>