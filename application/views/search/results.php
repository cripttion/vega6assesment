<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            color: #000; /* Black text */
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
        h2 {
            text-align: center;
            margin: 20px 0;
        }
        .results {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Responsive grid */
            gap: 15px; /* Spacing between items */
            padding: 0 20px; /* Side padding */
        }
        .result-item {
            background-color: #fff; /* White background for result items */
            border: 1px solid #000; /* Black border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px;
            text-align: center; /* Centered text */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: transform 0.2s; /* Animation effect */
            cursor: pointer; /* Pointer cursor on hover */
        }
        .result-item:hover {
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
        .result-item img, .result-item video {
            max-width: 100%; /* Full width */
            max-height: 150px; /* Fixed height for consistency */
            border-radius: 5px; /* Rounded corners */
        }
        /* Modal image style */
        #modalImage {
            width: 100%; /* Full width in modal */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>

    <div class="menu">
       
        <a href="<?php echo base_url('index.php/search'); ?>">Search Another</a>
    </div>

    <h2>Search Results</h2>

    <div class="results">
        <?php foreach ($results as $result): ?>
            <div class="result-item" data-bs-toggle="modal" data-bs-target="#mediaModal" data-src="<?php echo $media_type == 'image' ? $result['previewURL'] : $result['videos']['tiny']['url']; ?>" alt="<?php echo htmlspecialchars($result['tags']); ?>">
                <?php if ($media_type == 'image'): ?>
                    <img src="<?php echo $result['previewURL']; ?>" alt="<?php echo htmlspecialchars($result['tags']); ?>">
                <?php else: ?>
                    <video controls>
                        <source src="<?php echo $result['videos']['tiny']['url']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
                <p><?php echo htmlspecialchars($result['tags']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediaModalLabel">Media Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="" class="img-fluid d-none">
                    <video id="modalVideo" class="w-100 d-none" controls>
                        <source src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('index.php/search'); ?>" class="btn btn-secondary">Search Again</a>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mediaModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var src = button.data('src'); // Extract info from data-* attributes
                var mediaType = button.find('img').length ? 'image' : 'video'; // Check if it's an image or video

                if (mediaType === 'image') {
                    $('#modalImage').attr('src', src).removeClass('d-none');
                    $('#modalVideo').addClass('d-none'); // Hide video
                } else {
                    $('#modalVideo').find('source').attr('src', src);
                    $('#modalVideo')[0].load(); // Load video
                    $('#modalVideo').removeClass('d-none');
                    $('#modalImage').addClass('d-none'); // Hide image
                }
            });
        });
    </script>
</body>
</html>
