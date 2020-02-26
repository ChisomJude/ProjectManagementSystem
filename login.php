<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sales Ruby Limited: The No 1 Sales Training and Sales Enablement Consultant in Nigeria.">
    <meta name="description" content="Sales Ruby Limited: The No 1 Sales Training and Sales Enablement Consultant in Nigeria.">
    <meta name="keywords" content="Customer Acquisition, Agency banking, feild marketing">
    <meta name="author" content="Chilaka Michael Obinna - Frontend/Web Developer">
    <title>Log in your Account</title>
    <meta property="og:description" content="Schoolable works with Parents to save and get loans to pay tuition while with schools, we ensures that all payments are tracked and reconciled seamlessly.">
    <meta property="og:title" content="Schoolable: The simple way to plan, save and track tuition payments for schools and parents">
    <meta property="og:url" content="https://salesruby.com">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Salesruby Projects">
    <link rel="shortcut icon" href="assets/images/logo/SR-favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
        <?php
        require_once 'includes/dbcon.php';
            if(!isset($_POST['user_log_in'])){
              echo '<h4>Please login | <a href="index.php"><img src="assets/images/SRlogo.png" class="logo" alt="logo"></a></h4>';
              echo @$_GET['msg'];
            }else{
                $user = mysqli_escape_string($con, $_POST['user']);
                $password= mysqli_escape_string($con, $_POST['password']);
                $password= sha1($password);
                $Q = "SELECT * FROM agents WHERE email ='$user' and password = '$password'"; 
                if($q= mysqli_query($con, $Q)){
                        if(mysqli_num_rows($q) == 1){
                            $type= mysqli_fetch_array($q);
                            $fname=$type['firstname'];
                            $id = $type['id'];
                            $agent= $type['agent_code'];
                            $team= $type['agent_team'];
                           // $agent_type= $type['agent-type'];
                           // $agent = substr($agent, 5, 4); agent code no long has prefix, the substr() was to remove it prefix
                             
                                 $_SESSION['id']=$id;
                                 $_SESSION['fname'] = $fname;
                                 $_SESSION['agent'] = $agent;
                                 $_SESSION['team'] = $team
                                
                                ?>
                                <script type="text/javascript">
                                window.location.href = 'https://salesruby.com/projects/dashboard.php';
                                </script>
                                <?php  
                                

                        }else{
                        echo "<h4 style='color:red;'> Incorrect Login Details</h4>"; }
                }else{
                    echo "<h4 style='color:red;'> Try Again Later</h4>";
                }
                
            }?><form class="login-form" action="" method="post" role="form">
                <input type="email"  name="user" placeholder="Enter Email Address" />
                <input type="password" name="password" placeholder="password" />
                <button name="user_log_in" type="submit" style="color:#fff;">Login</button>
                <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
            </form>
        </div>
    </div>

    <!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>