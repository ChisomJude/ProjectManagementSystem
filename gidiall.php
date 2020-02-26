<?php 
//error_reporting(0);
require_once "includes/agentheader.php";
?>
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>  

  <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Added Schools
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr><th>S/N</th>
                                            <th>School </th>
                                            <th>Contact Person</th>
                                            <th>Progress Status:</th>
                                            <th>Approval</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $q=mysqli_query($con,"SELECT * FROM gidimosch WHERE agent_id ='$agent' ORDER BY date DESC");
                                             $x=0;
                                            if($q){
                                               if($check= mysqli_num_rows($q) != 0){
                                                   while( $qr= mysqli_fetch_array($q)){
                                                       $x++;
                                                     $sch_id= $qr['id']; $sch= $qr['sch_name']; $sch_typ=$qr['sch_type']; $sch_size= $qr['sch_size']; $state=$qr['state'];
                                                    $sch_addr=$qr['sch_addr']; $lga=$qr['lga']; $contact_name=$qr['contact _name']; $invoiced=$qr['invoiced']; $listing=$qr['sch_records'];
                                               $email=$qr['email'];$phone=$qr['phone']; $status= $qr['status']; $designation = $qr['contact_person_designation']; $appr=$qr['approval'];
                                        
                                             ?>
                                        
                                        
                                        <tr class="odd gradeX">
                                            <td> <h4><?php echo $x;?></h4></td>
                                            <td><b>School Name:</b><?php echo $sch;?> (Sch-ID:<?php echo $sch_id;?>)<br> <b>School Size:</b><?php echo $sch_size;?>  <br><b> Address:</b><?php echo $sch_addr;?><br> <b>LGA:</b> <?php echo $lga;?><b> State:</b><?php echo $state;?></td>
                                            <td> <b>Contact Person:</b> <?php echo $contact_name; ?> <b>Designation:</b> <?php echo $designation;?> <br><b>Email: </b><?php echo $email;?> <br><b>Phone: </b><?php echo $phone;?></td>
                                            <td>
                                                 
                                                 <?php 

                                    					  switch ($status){
                                    						  case "0":
                                    							  echo "<small class='label label-danger'> Visited</small>";
                                    							  break;
                                    						  case "1":
                                    							  echo "<small class='label label-warning'>Presention Done</small>";
                                    							  break;
                                    							 case 2:
                                    							    echo "<small class='label label-success'>Subcribed!</small>";
                                    							 
                                    					  };
                                                    ?>
                                           
                                            </td>
                                            <td>
                                                    <?php 

                                    					  switch ($appr){
                                    						  case "0":
                                    							  echo "<small class='label label-danger'> Awaiting TeamLead Review</small>";
                                    							  break;
                                    						  case "1":
                                    							  echo "<small class='label label-warning'>Teamlead sent Review</small>";
                                    							  break;
                                    						  case "2":
                                    							  echo "<small class='label label-info'> Admin  Approved School </small>";
                                    							  break;
                                    						  case "3":
                                    							  echo "<small class='label label-success'> Approved for Payment </small>";
                                    							  

                                    					  };
                                            
                                            
                                            ?></td>
                                            <td class="center">
                                            
                                            <div class="btn-group">
											 <a href="gidiupdate.php?sch=<?php echo $sch_id; ?>" title="Update Progress" class="btn btn-success">Update Progress</a></li>
											        
											</div>
										  </div>
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