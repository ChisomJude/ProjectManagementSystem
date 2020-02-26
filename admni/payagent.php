<?php 
//error_reporting(0);
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
                                
                                <strong class="card-title">Payments for Agent
                                
                                    <span style="color:#4aa00f">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  <?php echo @$_GET['msg']; ?></span>
                                    <span class="pull-right"><a href="bonus.php" class='btn btn-warning'>Pay Bonus</a><a href="print.php" class='btn btn-danger'>Payment List</a></span>
                                        </strong>

                            </div>
                           
                            <div class="card-body">
                            <div class="">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                                <th>S/N</th>
                                                <th>School</th>
                                                <th>Agent Detials</th>
                                                <th>Approvals</th>
                                                <th>Total Earned</th><th>Total Unpaid</th>
                                                <th>Give Payment Aprroval</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $q=mysqli_query($con,"SELECT agents.agent_code,agents.surname, agents.firstname, schools.id,schools.sch_name, payment.schappr_by_admin, payment.regdate_approved,payment.listappr_by_admin,payment.listdate_approved,payment.invoiceappr_by_admin,payment.invoicedate_approved, payment.reg_earning,payment.list_earning,payment.paid_out_amount,payment.invoice_earning,payment.paid_out_status,payment.total FROM schools INNER JOIN agents ON schools.agent_id = agents.agent_code INNER JOIN payment ON schools.id = payment.sch_id AND schools.status >= 1 order by payment.total DESC");
                                             $x=0;
                                            if($q){
                                               if($check= mysqli_num_rows($q) != 0){
                                                   while( $qr= mysqli_fetch_array($q)){
                                                       $x++;
                                                     $sch_id= $qr['id']; $sch= $qr['sch_name']; $agent=$qr['agent_code']; $agent_name= $qr['firstname']; $surname=$qr['surname'];
                                                    $reg=$qr['reg_earning']; $list=$qr['list_earning']; $invoice=$qr['invoice_earning'];
                                                    $total=$qr['total']; $unpaid= $total-$qr['paid_out_amount'];
                                                    $admin_4_sch= $qr['schappr_by_admin'];
                                                    $admin_4_list= $qr['listappr_by_admin'];
                                                    $admin_4_invoice= $qr['invoiceappr_by_admin'];
                                                    
                                                    //query to get approval names;
                                                    $q1=mysqli_query($con, "SELECT name FROM `admins` where id = '$admin_4_sch'");
                                                    $q2= mysqli_query($con, "SELECT name FROM `admins` where id = '$admin_4_list'");
                                                    $q3=mysqli_query($con, "SELECT name FROM `admins` where id = '$admin_4_invoice'");
                                                        $reg_admin_name= mysqli_fetch_array($q1);
                                                        $list_admin_name=  mysqli_fetch_array($q2);
                                                        $invoice_admin_name= mysqli_fetch_array($q3);
                                                    
                                        
                                             ?>
                                        
                                        
                                        <tr class="odd gradeX">
                                            <td> <h6><?php echo $x;?></h6></td>
                                            <td><b><?php echo $sch;?> <br>(Sch-ID:<?php echo $sch_id;?>)</b></td>
                                            <td> <b> <?php echo $agent_name." ".$surname; ?> <br>(code-: <?php echo $agent; ?> )</b></td>
                                            <td> <?php
                                                        echo "<small class='badge badge-success'> Registration Approval  by ". $reg_admin_name['name'] ."-  NGN". $reg." </small> <br>"; 
                                                         
                                                         //list Approval
                                                         if($list==0){
                                                                echo "<small class='badge badge-danger'> No List Aprroval </small>";
                                                            }else{ echo "<small class='badge badge-success'>  List Approval  by ". $list_admin_name['name'] ."-  NGN". $list."</small>"; }
                                                             echo"<br>";
                                                            //invoice approval
                                                             if($invoice==0){
                                                                    echo "<small class='badge badge-danger'> No Invoice Approval </small>";
                                                                }else{ echo "<small class='badge badge-success'> Invoice Approval  by ". $invoice_admin_name['name'] ."-  NGN". $invoice."</small>"; }
                                                                 
                                                 ?></td>
                                            
                                                    <td> <?php echo "<small class='badge badge-success'> ". $total. "<small>";?></td>
                                                    <td> <?php echo "<small class='badge badge-danger'> ". $unpaid. "<small>";?></td>
        
                                                    <td class="center">
                                                       <?php  if($unpaid > 0){ ?>
                                                    <a href="pay.php?sch=<?php echo $sch_id;?>&&amt=<?php echo $unpaid;?>&&admin=<?php echo $adminid;?>" title="Pay Now"><i class="fa fa-check-circle x2"style="color:green"></i></a>
                                                    
                                                        <?php }else{
                                                         echo "<small class='badge badge-danger'> No debt <small>";
                                                        }?>
                                                    </td>
									
                                        </tr>
                                    <?php    
                                             }
                                           } 
                                            }
                                     ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                 </div>
                </div>
      </div>
                        
          </div>                              
                <?php 
                require_once "footer.php";
                ?>