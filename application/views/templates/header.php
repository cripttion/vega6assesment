<!-- application/views/templates/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'My Application'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        /* Black and white theme */
        body {
            background-color: #f8f9fa; /* Light gray background */
            color: #000; /* Text color */
        }
        .navbar {
            background-color: #000; /* Black navbar */
            border-bottom: 2px solid #fff; /* White bottom border */
        }
        .navbar-brand {
            color: #fff; /* White logo text */
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #fff; /* White nav links */
            font-size: 16px;
            margin-right: 20px;
        }
        .navbar-nav .nav-link:hover {
            color: #ccc; /* Lighter hover effect */
        }
        .profile-pic {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border: 2px solid #fff; /* White border around the profile picture */
        }
        .dropdown-toggle {
            color: #fff; /* White dropdown toggle */
        }
        .dropdown-menu {
            background-color: #000; /* Black dropdown menu */
            border: 1px solid #fff; /* White border */
        }
        .dropdown-item {
            color: #fff; /* White dropdown items */
        }
        .dropdown-item:hover {
            background-color: #333; /* Dark gray hover background */
        }
        .navbar-toggler {
            border-color: #fff; /* White border on the toggle button */
        }
        .navbar-toggler-icon {
            background-color: #fff; /* White toggle icon */
        }
        .container {
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">My App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/profile'); ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/search'); ?>">Search</a>
                    </li>
                </ul>
                <?php if ($this->session->userdata('user_id')): ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <img src="data:image/jpeg;base64,<?php echo $this->session->userdata('user_picture'); ?>" alt="Profile" class="profile-pic rounded-circle">
                                <?php echo $this->session->userdata('user_name'); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container">
        <!-- Content will be injected here -->
    </div>

    <!-- Bootstrap JS (For dropdown functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
