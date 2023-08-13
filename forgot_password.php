<?php include_once("functions.php");?>
<!DOCTYPE HTML>
<html>
<head>
<title>Forgot Password | ShosurBari</title>
<link rel="icon" href="images/shosurbari-icon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" /><!-- eye icon password show -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<script src="js/optionsearch.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!--font-Awesome-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--font-Awesome-->
<!-- Facebook Icon Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Facebook Icon Link -->
</head>
<body>
<!-- ============================  Navigation Start =========================== -->
<?php include_once("includes/navigation.php");?>
<!-- ============================  Navigation End ============================ -->
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;<|>&nbsp;</span>
        <li class="current-page"><h4>Forgot Password </h4></li>
     </ul>
   </div>
</div>
</div>




<div class="shosurbari-biodata">
    <form action="forgot_password.php" method="post">
	<div class="flex-container">
    <div class="sb-register-login">

		    <h2 style="text-align:center; margin-bottom:50px">Reset Password</h2>

	    <div class="form-group">
            <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
	        <input type="text" id="email_or_username" placeholder="Your Email" name="email" value="" size="60" maxlength="60" class="form-text required" required>
        </div>

	    <div class="form-actions">
            <button  type="submit" id="edit-submit" name="op"  class="btn_1 submit"  style="width: 50%;"> <span> </span>Send to Email</button>
        </div>

    </div>
    </div>
	</form>
</div>

<?php include_once("footer.php");?>

</body>
</html>	





<?php
// Include database configuration file
include('includes/dbconn.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    // Get user's email from form input
    $email = $_POST['email'];
    
    // Prepare SQL statement to fetch user's password
    $sql = "SELECT password FROM users WHERE email = '$email'";
    
    // Execute SQL statement
    $result = mysqli_query($conn, $sql);
    
    // Check if user exists in the database
    if (mysqli_num_rows($result) > 0) {
        
        // Fetch user's password from the database
        $row = mysqli_fetch_assoc($result);
        $password = $row['password'];


        // Set up SMTP configuration for Gmail
        $to = $email;
        $subject = "Your ShosurBari Password";
        
        // HTML version of the email body
        ob_start();
        include('email_body.php');
        $email_body = ob_get_clean();
        
        // Plain text version of the email body
        $plain_text_message = "Your ShosurBari Password\n\nYour password is: $password\n\nYour Email is: $email\n\nLogin your account: https://www.shoshurbari.rf.gd/login.php\n\nNote: Please remember to keep your passwords and usernames secure. Do not share them with anyone.\n\n[fa fa-facebook]:https://www.facebook.com/ShoshurBari.bd\nhttps://www.yourwebsite.com\nhttps://www.facebook.com\nhttps://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\n\n(c) 2022-23 ShosurBari.com | All Rights Reserved";

        // Headers
        $headers = "From: nafizulislam.swe@gmail.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Gmail SMTP configuration
        $smtp_host = "smtp.gmail.com";
        $smtp_port = 587;
        $smtp_username = "nafizulislam.swe@gmail.com"; // Your Gmail email
        $smtp_password = "qsjjbejxbottlwry"; // Your Gmail password
        $smtp_secure = "tls"; // Use 'ssl' for SSL encryption
        
        // Configure PHPMailer
        require 'PHPMailer/PHPMailerAutoload.php';
        
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = $smtp_host;
        $mail->Port = $smtp_port;
        $mail->SMTPSecure = $smtp_secure;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $smtp_password;
        
        $mail->setFrom($smtp_username, 'ShosurBari');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $email_body;
        $mail->AltBody = $plain_text_message; // Plain text version of the email
        
        if ($mail->send()) {
            // Password sent successfully
            echo "Your password has been sent to your email address.";
        } else {
            // Error sending email
            echo "There was an error sending your password. Please try again later.";
        }
        
    } else {
        // User not found in the database
        echo "We couldn't find a user with that email address.";
    }
}
?>
