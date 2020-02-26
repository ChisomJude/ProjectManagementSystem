<?
 session_start();
 if($_SESSION['adminid'] && $_SESSION['username'])
 $redirect= header("Location:index.php"); 
?>
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
    <title>Salesruby - Schoolable</title>
    <meta name="description" content="Salesruby - HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="images/salesruby logo.jpg"/>


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-cyan">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
               
                <div class="login-form">
                     <div class="login-logo">
                    <a href="index.php">
                        <h4>Salesruby Admin</h4>
                        </a>
                </div>
                <form method="post" action=""> 
                <div class="class-group">
                   
                <?php
                
                    require'../includes/dbcon.php';     
                    if(isset($_POST['login'])){
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                         $query = "SELECT * FROM `admins` WHERE email='$username' and password='".md5($password)."'";
                            $result = mysqli_query($con,$query) or die(mysql_error());

                    if(mysqli_num_rows($result)== 1){


                            $type= mysqli_fetch_array($result);
                            $name=$type['name'];
                            $id = $type['id'];
                            
                                $_SESSION['adminid']=$id;
                                $_SESSION['username'] = $_POST['username'];

                                 $redirect;
        }else{echo"<div align='center'><h4 class='text-danger'>Wrong Login Detials</h4></div>";
         }
                                

                echo "<div align='center'><h4 class='text-danger'>".@$_GET['msg']."</h4></div>";
            }
        ?>

                            

                </div>
                    
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter email ">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                                <div class="" align="center">
                                  
                                    <label class="">
                                    <a href="#">Forgotten Password? Contact Salesruby Tech Team</a>
                                     </label>

                                </div>
                                <button type="submit" name="login" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                              
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
