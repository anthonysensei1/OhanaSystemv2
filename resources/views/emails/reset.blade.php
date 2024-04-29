<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 40px auto;
            text-align: center;
        }
        a {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Password Reset Request</h3>
        <p>Hello,</p>
        <p>We received a request to reset your password for your account. If you did not make this request, please ignore this email.</p>
        <p>To reset your password, click on the link below:</p>
        <a href="https://ohanaresort.online/reset-password?id={{$forgot_password}}" target="_blank">Reset Password</a>
       
        <p>Thank you,</p>
        <p>Ohana Resort.</p>
    </div>
</body>
</html>