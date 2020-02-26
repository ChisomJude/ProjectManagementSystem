<?php 
//error_reporting(0);
require_once "includes/agentheader.php";
     if($_SESSION['team'] != $_SESSION['agent']){
          ?>
                <script type="text/javascript">
                window.location.href = 'https://salesruby.com/schoolable/dashboard.php?msg=Sorry You cant access that url';
                </script>
                <?php
          }
?>
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>  

  <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Agents in Your Team
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr><th>S/N</th>
                                            <th>School</th>
                                            <th>School Contact</th><th>Agent</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            
                                            $q=mysqli_query($con,"SELECT agents.agent_code, agents.firstname,agents.surname,schools.id,schools.sch_name,schools.sch_addr,schools.sch_type,schools.sch_size,schools.lga,schools.state,schools.contact_name, schools.contact_person_designation,schools.email, schools.phone, schools.invoiced, schools.status FROM schools INNER JOIN agents ON schools.agent_id = agents.agent_code WHERE agents.agent_team ='$agent' AND agents.agent_code <> '$agent' ORDER BY date DESC");
                                             $x=0;
                                            if($q){
                                               if($check= mysqli_num_rows($q) != 0){
                                                   while( $qr= mysqli_fetch_array($q)){
                                                       $x++;
                                                     $sch_id= $qr['id']; $sch= $qr['sch_name']; $sch_typ=$qr['sch_type']; $sch_size= $qr['sch_size']; $state=$qr['state'];
                                                    $sch_addr=$qr['sch_addr']; $lga=$qr['lga']; $contact_name=$qr['contact _name'];
                                               $email=$qr['email'];$phone=$qr['phone']; $status= $qr['status']; $designation = $qr['contact_person_designation'];
                                               $agent_name=$qr['firstname']." ". $qr['surname']; $agent_code=$qr['agent_code'];
                                        
                                             ?>
                                        
                                        
                                        <tr class="odd gradeX">
                                            <td> <h4><?php echo $x;?></h4></td>
                                            <td><b>School Name:</b><?php echo $sch;?> (Sch-ID:<?php echo $sch_id;?>)<br> <b>School Size:</b><?php echo $sch_size;?>  <br><b> Address:</b><?php echo $sch_addr;?><br> <b>LGA:</b> <?php echo $lga;?><b> State:</b><?php echo $state;?></td>
                                            <td> <b>Contact Person:</b> <?php echo $contact_name; ?> <b>Designation:</b> <?php echo $designation;?> <br><b>Email: </b><?php echo $email;?> <br><b>Phone: </b><?php echo $phone;?></td>
                                            <td> <b>Name:</b> <?php echo $agent_name; ?> <b>Code:</b> <?php echo $agent_code;?> </td>

                                            <td>
                                                    <?php 

                                    					  switch ($status){
                                    						  case "0":
                                    							  echo "<small class='label label-warning'> Awaiting TeamLead Review</small>";
                                    							  break;
                                    						  case "1":
                                    							  echo "<small class='label label-success'>School Approved</small>";
                                    							  break;
                                    						  case "2":
                                    							  echo "<small class='label label-info'> Listing Approved </small>";
                                    							  break;
                                    						  case "5":
                                    							  echo "<small class='label label-primary'> Team Lead Reviewed </small>";
                                    							  break;
                                    							  
                                    						  case "4":
                                    							  echo "<small class='label label-warning'> School Unapproved</small>";
                                    							  break;
                                    							case "6":
                                    							 echo "<small class='label label-warning'>List pending</small>";

                                    					  };
                                            
                                            
                                            ?></td>
                                            <td class="center">
                                            	<?php if($status == 5){?>
											    	<a href="teamapprove.php?sch=<?php echo $sch_id; ?>" class="btn btn-danger" title="Approval">Update Review</a>
											        <?php }else{?>
											        <a href="teamapprove.php?sch=<?php echo $sch_id; ?>" class="btn btn-success" title="Approval">Send Review</a>
											        <?php }?>
											  </td>
											
                                        </tr>
                                    <?php    
                                             }
                                           }else{
                                               echo "<h4 style='color:red'>No School Added Yet. <a href='school.php'>Add School</a></h4>";
                                           } 
                                            }
                                     ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>   
                                        
                <?php 
                require_once "includes/agentfooter.php";
                ?>