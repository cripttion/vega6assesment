<?php
$data['title'] = 'Profile';
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
        .profile-pic {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 2px solid #000; /* Black border around the profile picture */
            border-radius: 50%; /* Make it a circle */
            margin-bottom: 15px;
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
        .btn-primary {
            background-color: #000; /* Black button */
            border-color: #000; /* Black button border */
        }
        .btn-primary:hover {
            background-color: #fff; /* White button on hover */
            color: #000; /* Black text on hover */
            border-color: #000; /* Black border on hover */
        }
        .mttop{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Your Profile</h2>

        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('error'); ?> 
        <?php echo $this->session->flashdata('success'); ?>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="profileTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="update-profile-tab" data-bs-toggle="tab" data-bs-target="#updateProfile" type="button" role="tab" aria-controls="updateProfile" aria-selected="true">Update Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="change-password-tab" data-bs-toggle="tab" data-bs-target="#changePassword" type="button" role="tab" aria-controls="changePassword" aria-selected="false">Change Password</button>
            </li>
        </ul>

        <div class="tab-content mt-4" id="profileTabContent">
            <div class="tab-pane fade show active" id="updateProfile" role="tabpanel" aria-labelledby="update-profile-tab">
                <div class="card">
                    <div class="card-header">
                        Update Profile
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('profile/update'); ?>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $user->name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="picture">Profile Picture:</label>
                                <input type="file" id="picture-file" accept="image/*" class="form-control">
                                <input type="hidden" id="picture-data" name="picture">
                            </div>
                            <div class="form-group text-center mttop">
                                <img src="data:image/jpeg;base64,<?php echo $user->picture; ?>" alt="Current Profile Picture" class="profile-pic">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Update Profile" class="btn btn-primary">
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="changePassword" role="tabpanel" aria-labelledby="change-password-tab">
                <div class="card mt-4">
                    <div class="card-header">
                        Change Password
                    </div>
                    <div class="card-body">
                        <?php echo form_open('auth/change_password'); ?>
                            <div class="form-group">
                                <label for="current_password">Current Password:</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <input type="password" name="new_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password:</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                            <div class="form-group text-center mttop ">
                                <input type="submit" value="Change Password" class="btn btn-primary">
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#picture-file').change(function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#picture-data').val(reader.result);
                    $('.profile-pic').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>

    <!-- Bootstrap JS (For dropdown functionality if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
