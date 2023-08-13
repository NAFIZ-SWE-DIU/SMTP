<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2ecc71; /* Updated background color */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(#0ea5e9, #06b6d4);
            color: white;
            text-align: center;
            padding: 10px;
        }

        .content {
            padding: 10px 30px;
            border-right: 50px solid #06b6d4;
            border-left: 50px solid #06b6d4;
            text-align: center;
        }

        .note{
            border: 1.5px solid #ccc;
            margin-top: 5px;
            padding: 13px;
        }

        .content p {
            font-size: 16px;
            color: #000;
            font-weight: bold;
            text-decoration: none;
        }

        .content h4 {
            font-size: 16px;
            font-weight: none;
        }

        .content h5 {
            text-align: justify;
            color: #696262;
            font-size: 13px;
        }

        .content a {
            text-decoration: underline;
            color: #0ea5e9;
        }

        .footer {
            background: linear-gradient(#06b6d4, #0ea5e9);
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>Your ShosurBari Password</h1>
        </div>
        <div class='content'>
            <p>Password: <?php echo $password; ?></p>
            <p>Email: <?php echo $email; ?></p>

            <h4>Login to your account: <a href='https://www.shoshurbari.rf.gd/login.php' target='_blank'>ShosurBari Login </a></h4>

            <h5 class="note" style="font-weight: none;"> <strong style="color: red; font-weight: bold;">Note: </strong> Please remember to keep your passwords secure. Do not share them with anyone.</h5>
        </div>

        <div class='footer'>
            <p>&copy; 2022-23 ShosurBari.com | All Rights Reserved</p>
            <ul class="footer_social">
                <li><a href="https://www.facebook.com/ShosurBari.bd"><i class="fa fa-facebook" style="font-size: 20px; background: blue; color: #fff; padding: 5px 9px; border-radius: 3px;"></i></a></li>
                <li><a href="#"><i class="fa">&#xf082;</i></a></li>
            </ul>
        </div>

    </div>
</body>
</html>
