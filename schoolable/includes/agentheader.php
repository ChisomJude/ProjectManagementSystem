<?php 
session_start();
require 'includes/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to your Dashboard</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/assets/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/assets/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/assets/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/assets/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" href="images/schoolable_fav.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<?php

          if(!isset($_SESSION['id']) && !isset($_SESSION['fname'])){
          ?>
                <script type="text/javascript">
                window.location.href = 'https://salesruby.com/projects/login.php?msg=Please Login';
                </script>
                <?php
          }

            $id=$_SESSION['id'];
             $name= $_SESSION['fname'];
              $agent= $_SESSION['agent'];
              $team = $_SESSION['team'];
              
?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebarW">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">My Dashboard</a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse" id="sidebarW">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/assets/assets/img/find_user.png" class="user-image img-responsive" class="sr-hidden"/>
                    </li>


                    <li>
                        <a class="active-menu" href="dashboard.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                    </li>
                    
                                       
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-2x"></i> Schoolable<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                             <a href="school.php"><i class="fa fa-university"></i> Add School</a>
                            </li>
                            <li>
                                 <a href="all.php"><i class="fa fa-users"></i> View All</a>
                             </li>
                            
                            <?php if($team == $agent){?>  
                                <li>
                                    <a class="" href="team.php"><i class="fa fa-users fa-2x"></i> Team Members </a>
                                </li>
                             <?php }?>
                        </ul>
                      </li>
                      
                      <li>
                        <a href="#"><i class="fa fa-sitemap fa-2x"></i> Gidimo <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                             <a href="gidischool.php"><i class="fa fa-university"></i> Add School</a>
                            </li>
                            <li>
                                 <a href="gidiall.php"><i class="fa fa-users"></i> View All</a>
                             </li>
                            
                            <?php if($team == $agent){?>  
                                <li>
                                    <a class="" href="team.php"><i class="fa fa-users fa-2x"></i> Team Members </a>
                                </li>
                             <?php }?>
                        </ul>
                      </li>
                    
                    
                
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-2x"></i> Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Agent Dashboard</h2>
                        <h5>Welcome <strong><?php echo $name; ?></strong>, Your Agent Code is <b>SR- <?php  echo $agent; ?></b></h5>
                    </div>
                </div>
                <!-- /. ROW  -->