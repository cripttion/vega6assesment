<?php
$data['title'] = 'Search';
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
        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
            color: #000; /* Black text */
        }
        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }
        .search-form input[type="text"],
        .search-form select {
            margin-right: 10px;
            padding: 10px;
            border: 2px solid #000; /* Black border */
            border-radius: 5px; /* Rounded corners */
        }
        .search-form input[type="submit"] {
            padding: 10px 15px;
            background-color: #000; /* Black background */
            color: #fff; /* White text */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
        }
        .search-form input[type="submit"]:hover {
            background-color: #fff; /* White background on hover */
            color: #000; /* Black text on hover */
            border: 2px solid #000; /* Black border on hover */
        }
        #results {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .result-item {
            border: 1px solid #000; /* Black border for result items */
            border-radius: 5px; /* Rounded corners */
            margin: 10px;
            padding: 10px;
            background-color: #fff; /* White background for result items */
            width: 300px; /* Fixed width for result items */
            text-align: center; /* Centered text */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Search Images and Videos</h2>

        <form class="search-form" action="<?php echo base_url('index.php/search/search_media'); ?>" method="get">
            <input type="text" name="query" placeholder="Enter search query" required>
            <select name="media_type">
                <option value="image">Images</option>
                <option value="video">Videos</option>
            </select>
            <input type="submit" value="Search">
        </form>

        <div id="results">
            <!-- Search results will be displayed here -->
        </div>
    </div>

    <!-- Bootstrap JS (For dropdown functionality if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
