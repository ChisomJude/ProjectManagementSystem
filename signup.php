<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Sales Ruby Limited: The No 1 Sales Training and Sales Enablement Consultant in Nigeria.">
    <meta name="description"
        content="Sales Ruby Limited">
    <meta name="keywords" content="Sales Ruby Limited - Frontend/Web Developer">
    <meta name="keywords"
        content="">
    <meta name="author" content="Chilaka Michael Obinna - Frontend/Web Developer">
    <title>Register to be a District Representative</title>
    <meta property="og:description"
        content="Join the Salesruby Field Agent team and Customer Acquisition">
    <meta property="og:title"
        content="Salesruby Project and Feild Agents">
    <meta property="og:url" content="https://salesruby.com/projects">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="salesruby">

    <link rel="shortcut icon" href="assets/images/logo/SR-favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/signup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <style>
        .red{color:#ff0000;}
        .green{color:#228B22;}   
    </style>

    <form action="" method="post" class="signup-form" role="form">
        <h3>Create an Agent Account | <a href="index.php"><img src="assets/images/SRlogo.png" class="logo" alt="logo"></a></h3>
        <p>  <?php
    
                require_once('includes/dbcon.php'); 
              if(isset($_POST['register'])){
           
                    $name= mysqli_escape_string($con, $_POST['fname']);
                    $email =mysqli_escape_string($con, $_POST['email']);
                    $phone= mysqli_escape_string($con, $_POST['phone_number']);
                    $password=mysqli_escape_string($con, $_POST['password']);
                    $password= sha1($password);
                    $agentcode= mt_rand('1202','9000');
                    
                    $check= mysqli_query($con, "SELECT * FROM agents WHERE email = '$email' or phone = '$phone'");
                        if(mysqli_num_rows($check)== 0){
                            $reg= "INSERT INTO `agents` (`id`, `password`, `firstname`, `email`, `phone`, `agent_code`, `surname`, `gender`, `marital_status`, `dob`, `residential_address`, `nationality`, `state_of_origin`, `kin_phone`, `next_of_kin`, `kin_relationship`, `kin_address`)
                             VALUES (NULL, '$password', '$name', '$email', '$phone', '$agentcode', '', '', '', '', '', '', '', '', '', '', '');";
                            $qq= mysqli_query($con, $reg);
                            if($qq){
                                ?>
                                <script>
                                    $(document).ready(function(){
                                            $('.llp').hide();
                                    });
                                </script>
                            <?php
                             echo'<h3 class="green"> Your Registration Was Successful '. $name .',Please 
                             <a href="login.php">Login</a>and Update your Profile</h3>';
                               
                            }else{
                            echo'<h3 class="red"> Registration Failed, please try again later</h3>';
                            }        
                        }else {
                            ?>
                            <script>
                                $(document).ready(function(){
                                        $('.llp').hide();
                                });
                            </script>
                        <?php
                            echo "<h3 class='red'> User Account Already Exist! Please <a href='login.php'>Login</a></h3>";
                        }
                    }
            
            ?>
           
        </p>
        <p class="llp">
            <label for="Full Name" class="floatLabel">Full Name</label>
            <input id="full_name" name="fname"  type="text" required>
        </p>
        <p class="llp">
            <label for="Email" class="floatLabel">Email</label>
            <input id="email" id="email" name="email" type="email"  required>
        </p>
        <p class="llp">
            <label for="phone_number" class="floatLabel">Phone Number</label>
            <input id="phone_number" name="phone_number" type="tel" required>
        </p>
        <p class="llp">
            <label for="password" class="floatLabel">Password</label>
            <input id="password" name="password" type="password" required>
            <span>Enter a password longer than 8 characters</span>
        </p>
        <p class="llp">
            <label for="confirm_password" class="floatLabel">Confirm Password</label>
            <input id="confirm_password" name="confirm_password" type="password">
            <span>Your passwords do not match</span>
        </p>
        <p class="llp">
            <input type="submit" name="register" value="Create My Account" id="submit">
            <p class="message"> Already Have an Account? <a href="login.php">Login</a></p>
        </p>
    </form>

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