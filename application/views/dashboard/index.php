<?php
$data['title'] = 'Dashboard';
// $this->load->view('templates/header', $data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            color: #000; /* Black text color */
        }
        .container {
            margin-top: 20px;
        }
        .welcome-message {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-pic {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 2px solid #000; /* Black border around the profile picture */
            border-radius: 50%; /* Make it a circle */
        }
        .card {
            border: 1px solid #000; /* Black border for card */
        }
        .card-header {
            background-color: #000; /* Black header for card */
            color: #fff; /* White text for card header */
        }
        .card-body {
            background-color: #fff; /* White body for card */
        }
        .card-title {
            color: #000; /* Black card title */
        }
        .menu {
            margin-bottom: 20px;
            text-align: center; /* Center align menu links */
        }
        .menu a {
            margin-right: 15px;
            padding: 8px 15px;
            background-color: #000; /* Black background for menu */
            color: #fff; /* White text */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
        }
        .menu a:hover {
            background-color: #fff; /* White background on hover */
            color: #000; /* Black text on hover */
            border: 2px solid #000; /* Black border on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="welcome-message">Welcome, <?php echo $user_name; ?>!</h2>

        <div class="text-center">
        <?php if (!empty($user->picture)): ?>
                <img src="<?php echo $user->picture; ?>" alt="Profile Picture" style="max-width: 200px; max-height: 200px; border-radius: 50%;">
            <?php else: ?>
                <p>No profile picture available.</p>
            <?php endif; ?>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Dashboard Overview
            </div>
            <div class="card-body">
            <div class="menu">
        <a href="<?php echo base_url('index.php/profile'); ?>">Profile</a>
        <a href="<?php echo base_url('index.php/search'); ?>">Search</a>
        <a href="<?php echo base_url('index.php/auth/logout'); ?>">Logout</a>
    </div>

                <p class="card-title">This is your dashboard. You can access various features from the menu above.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (For dropdown functionality if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
