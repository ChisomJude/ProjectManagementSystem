<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Salesruby Admin</title>
    <meta name="description" content="Salesruby with Naija Lottery">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   

    <link rel="shortcut icon" type="image/png" href="images/9ja lottery.png"/>
   
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="parsley3.css">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        a{cursor: pointer;}
    </style>
</head>

<body class="sidebar-collopse">

 <?php 
       
        require 'dbcon.php';
        session_start();
          if(!isset($_SESSION['username']) && !isset($_SESSION['adminid'])){
           header("Location:login.php?msg=Please Login");
          }
      $adminid = $_SESSION['adminid'];
      //$q = mysqli_query($con,"SELECT * FROM salesrep WHERE id='$id' ");
      //$row=mysqli_fetch_array($q);
      //$now= date("l jS \, F Y  H:i:s A");
      //$qq=mysqli_query($con,"UPDATE `salesrep` SET `last_login` = '$now' WHERE `salesrep`.`id` = '$id' ");
      ?>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">SalesRuby</a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <h3 class="menu-title">Agent Recruitment</h3><!-- /.menu-title -->
                   
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-user-plus"></i>New Applicant</a>
                    </li>
                    <li class="">
                        <a href="reviewing.php"> <i class="menu-icon fa fa-undo"></i>On Review</a>
                    </li>
                     <li class="">
                        <a href="approved.php"> <i class="menu-icon fa fa-check"></i>Approved List</a>

                    </li>

                     <li class="">
                        <a href="unapproved.php"> <i class="menu-icon fa fa-times"></i>Unapproved List</a>
                    </li>
                    
                     <li class="">
                        <a href="all.php"> <i class="menu-icon fa fa-users"></i>All Applicants</a>
                    </li>
                
                    <li class="">
                        <a href="dwld.php"> <i class="menu-icon fa fa-download"></i>Download File</a>
                    </li>
                     


                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

      <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <h4>Naija Lottery Admin</h4>

                        
                    </div>
                </div>

             
            </div>

        </header><!-- /header -->
        <!-- content body 1-->