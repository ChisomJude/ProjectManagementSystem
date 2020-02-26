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
                                
                                <strong class="card-title">CASHED OUT LIST 
                                
                                    <span style="color:#4aa00f">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  <?php echo @$_GET['msg']; ?></span>
                                        </strong>

                            </div>
                           
                            <div class="card-body">
                                 <div class="row">
                                      <div class="col-md-12">  
                                         <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                     <thead>
                                                            
                                                    <tr>
                                                        <th>s/n</th>
                                                         
                                                        <th>Agent Details </th>
                                                        <th>Schools</th>
                                                        <th>Amount Earned</th>
                                                        <th>Date Cashed Out</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php 
                                                    $qr= mysqli_query($con, "SELECT DISTINCT agents.surname, agents.firstname, agents.agent_code FROM agents INNER JOIN schools ON schools.agent_id = agents.agent_code INNER JOIN payment on agents.agent_code = payment.agent_id");
                                                    $x=0;
                                                   if($qr){
                                                     while ($qqr = mysqli_fetch_array($qr)){ 
                                                    $x++;
                                                   ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $x; ?></td>
                                                        <td> 
                                                      
                                                        <?php echo '<a style="text-decoration: underline;color:#28a745;" href="javascript:void(0)" data-toggle="collapse" data-target="#pass'.$qqr['id'].'"  title=" View Agent detials" >'. $qqr['firstname'].'  '. $qqr['surname'].' ('.$qqr['agent_code'].')
                                                            </a> ';
                                                                ?>
                                                             
            
                                                       </td>
                             
                                                        
                                                        <td>
                                                        <?php  
                                                            $sch= mysqli_query($con, "SELECT COUNT(payment.sch_id) as sch FROM payment WHERE payment.agent_id = '$qqr[agent_code]' AND payment.paid_out_status=1");
                                                             $sch= mysqli_fetch_array($sch);
                                                              echo  $agent = "<span class='badge badge-danger'>". $sch['sch']."</span>";
                                                                ?>
                                                            </td>
                                                        <td><?php
                                                             $sch= mysqli_query($con, "SELECT SUM(paid_out_amount) as pay FROM payment WHERE agent_id = '$qqr[agent_code] '");
                                                             $sch= mysqli_fetch_array($sch);
                                                             if($sch['pay'] != 0){
                                                                     echo  $agent = "<span class='badge badge-success'>NGN ". $sch['pay']."</span>";
                                                             }else{
                                                                 echo "<span class='badge badge-danger'>No Amount Earned</span>";
                                                             }
                                                                ?>
                                                               
                                                        </td>
                                                        <td><?php 
                                                        $date= mysqli_query($con, "SELECT payment.paid_out_date FROM payment WHERE payment.agent_id = '$qqr[agent_code]' AND payment.paid_out_status=1 order by paid_out_date DESC limit 1
");
                                                             $date= mysqli_fetch_array($date);
                                                             if($date['paid_out_date'] != 0){
                                                                     echo  $agent = "<span class='badge badge-success'>NGN ". $date['paid_out_date']."</span>";
                                                             }
                                                        ?></td>
                                       
                                     
            
            
                                                             
                                                    </tr>
                                                  </div></div>
                                                  <?php } ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                        </div>
                     </div>
                        </div><!-- .animated -->
                    </div><!-- .content -->
            
            
            
            <?php } 
            
        
                                                     
                                                    ?>
                                                
                                                >
                    </div>
                </div>
            </div>
    </div>
                                                <!-- /#right-panel -->

  <?php require'footer.php';?>