<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <div class="container">
        <center>
            <h2>Ohana Resort</h2>
            <h5>Reset Your Password</h5>
        </center>

        <form id="passwordResetForm" action="/request-pass" method="POST">
            <input type="hidden" name="id" value="{{ session('id') }}">
            <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password"
                required>
            <button type="button" id="submitBtn">Reset Password</button>
        </form>
    </div>

    <script>
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault();  // Prevent the default form submission

        var newPassword = document.getElementById('new_password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        if (newPassword === confirmPassword) {
            // If the passwords match, submit the form
            if (newPassword.length < 6) { // Check if the password is at least 6 characters long
                alert("Password must be at least 6 characters.");
                return false;
            }
            submitForm(); // Call a function to submit the form
        } else {
            // If the passwords do not match, alert the user
            alert("The passwords do not match. Please try again.");
        }
    });

    function submitForm() {
        var form = document.getElementById('passwordResetForm');
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            location.href = '/';
            // Redirect or update UI as needed
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }
</script>
</body>

</html>