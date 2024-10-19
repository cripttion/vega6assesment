<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            color: #212529; /* Dark text */
        }
        .container {
            max-width: 500px; /* Max width for the form */
            margin-top: 50px; /* Space above the form */
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
        .form-group input[type="file"] {
            padding: 5px; /* Padding for file input */
        }
        .btn-primary {
            width: 100%; /* Full width button */
        }
        .footer-link {
            text-align: center; /* Center align footer link */
            margin-top: 20px; /* Space above footer link */
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Register</h2>
        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('error'); ?>
        <?php echo form_open('auth/register', array('id' => 'register-form')); ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="picture">Profile Picture:</label>
                <input type="file" id="picture-file" class="form-control" accept="image/*" required>
                <input type="hidden" id="picture-data" name="picture">
            </div>
            <div class="form-group">
                <input type="submit" value="Register" class="btn btn-secondary">
            </div>
        <?php echo form_close(); ?>
        <p class="footer-link">Already have an account? <a href="<?php echo base_url('index.php/auth/login'); ?>">Login here</a></p>
    </div>

    <script>
        $(document).ready(function() {
            $('#picture-file').change(function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#picture-data').val(reader.result);
                }
                reader.readAsDataURL(file);
            });

            $('#register-form').submit(function(e) {
                if ($('#picture-data').val() == '') {
                    alert('Please select a profile picture');
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
