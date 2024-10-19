<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            color: #212529; /* Dark text */
        }
        .container {
            max-width: 400px; /* Max width for the form */
            margin-top: 100px; /* Space above the form */
            padding: 20px; /* Inner padding */
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        h2 {
            text-align: center; /* Center the heading */
            margin-bottom: 20px; /* Space below heading */
        }
        .form-group {
            margin-bottom: 15px; /* Space between form groups */
        }
        .form-group label {
            font-weight: bold; /* Bold labels */
        }
        .footer-link {
            text-align: center; /* Center align footer link */
            margin-top: 20px; /* Space above footer link */
        }
        .btn-black {
            background-color: #000; /* Black background */
            color: #fff; /* White text */
            border: none; /* Remove border */
        }
        .btn-black:hover {
            background-color: #333; /* Darker shade on hover */
            color: #fff; /* White text on hover */
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Login</h2>
        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('error'); ?>
        <?php echo $this->session->flashdata('success'); ?>
        <?php echo form_open('auth/login'); ?>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-black w-100">
            </div>
        <?php echo form_close(); ?>
        <p class="footer-link">Don't have an account? <a href="<?php echo base_url('index.php/auth/register'); ?>">Register here</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
