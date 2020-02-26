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
                                    
                                    <strong class="card-title">Pay Bonus For Up to 8 Records
                                    
                                        <span style="color:#4aa00f">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  <?php echo @$_GET['msg']; ?></span>
                                            </strong>
    
                                </div>
                               
                                <div class="card-body">
                                     <div class="row">                                      
                                             <div class="col-md-12">
                                                 <div class='form-group'>
                                                        <form action="" method="post">
                                                       
                                                             <label class=''>Select :
                                                                <select name="mm" class="agent" class='form-control-sm form-control' required>
                                                                    <option value="">Select Month</option>
                                                                    <option value="10">October</option><option value="11">November</option>
                                                                    <option value="12">December</option><option value="01">January/option>
                                                                    <option value="02">Febuary</option><option value="03">March</option>
                                                                    <option value="04">April</option><option value="05">May</option>
                                                                    </select>
                                                                    <input type="submit" name="view_bonus" class="btn btn-primary" value="View Agent Bonus">
                                                             </label>
                                                        </form>
                                                    </div>
                                            </div>
                                            
                                                
                                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                            <th>S/N</th>
                                                            <th>Agent Details </th>
                                                            <th>Schools</th>
                                                            <th>Bonus Earned</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                               
                                                               <?php 
                                                                 if(isset($_POST['view_bonus'])){
                                                                     $month= $_POST['mm'];
                                                                      
                                                                
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
                                                                            </div>
                                                                    </td>
                                                                    
                                                                    
                                                                    <td>
                                                                        <?php  
                                                                        $sch= mysqli_query($con, "SELECT COUNT(id) as sch FROM schools WHERE agent_id = '$qqr[agent_code]' AND  MONTH(date)= '$month'");
                                                                         $sch= mysqli_fetch_array($sch);
                                                                          echo  $agent = "<span class='badge badge-danger'>". $sch['sch']."</span>";
                                                                            ?>
                                                                    </td>
                                                                    
                                                                    <td><?php
                                                                            if($sch['sch'] >= 8){
                                                                                echo  $agent = "<span class='badge badge-success'>NGN 20,000 </span> <a href='paybonus.php'> Approve Bonus</a>";
                                                                            }else{
                                                                                 echo "<span class='badge badge-danger'>No Bonus Earned</span>";
                                                                            }
                                                                         
                                                                            ?>
                                                                           
                                                                    </td>
                                                   
                                                 
                        
                        
                                                                         
                                                                </tr>
                                                             
                                                              <?php } ?>
                                                            </tbody>
                                                        </table>
                                            </div>
                        
                                 </div>
                                                            
             </div><!-- .card -->
        </div><!-- .content -->
               </div></div>      
                    
                    
                    <?php 
                    
                
                                                        }
                                                                
                                                             }
                                                             ?>
                                                        