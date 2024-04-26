<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .otp-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 340px;
        }

        .otp-container p {
            color: #333;
            font-size: 18px;
        }

        strong {
            font-size: 22px;
            color: #1572A1;
            display: inline-block;
            border-radius: 5px;
            padding: 5px 10px;
            background-color: #E8F0FE;
        }

        button {
            background-color: #1572A1;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #13597D;
        }

        .toast {
            visibility: hidden;
            min-width: 250px;
            color: #fff;
            text-align: center;
            border-radius: 15px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            transform: translateX(-50%);
            bottom: 30px;
            background-color: #4CAF50;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            font-size: 16px;
        }

        .show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @keyframes fadein {
            from {
                bottom: 20px;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 20px;
                opacity: 0;
            }
        }

        .rounded-circle {
            border-radius: 50%;
            object-fit: cover;
            /* This will ensure that the image covers the area without stretching */
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: left;
            /* This aligns the child elements (logo and h1) to the left */
            margin-bottom: 20px;
            /* Adds some space between the header and the OTP message */
        }

        .logo {
            margin-right: 10px;
            /* Adds some space between the logo and the text */
        }
    </style>
</head>

<body>
    <div class="otp-container">
        <div class="header">
            <img src="https://ohanaresort.online/images/ohana.png" class="rounded-circle logo" alt="Ohana Resort Logo" style="width: 40px; height: 40px;">
            <h2>Ohana Resort</h2>
        </div>
      
        <p>Your booking has been confirmed, thank you for your trust.</p>

    </div>
    <script>
        function copyOTP() {
            const otp = document.getElementById('otp').innerText;
            navigator.clipboard.writeText(otp).then(() => {
                showToast();
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }

        function showToast() {
            const toast = document.getElementById("toast");
            toast.className = "show";
            setTimeout(function () { toast.className = toast.className.replace("show", ""); }, 3000);
        }
    </script>
</body>

</html>
