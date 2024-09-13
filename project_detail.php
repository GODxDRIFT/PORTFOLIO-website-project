<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Set light grey background for all pages */
        body {
            background-color: #f0f0f0; /* Light grey */
            color: #333; /* Text color (optional) */
        }

        /* Optional: Set a different background for specific sections */
        .hero, .container {
            background-color: #ffffff; /* White background for content areas */
            border-radius: 10px;
            padding: 20px;
        }

        /* Ensure header and footer stand out */
        header, footer {
            background-color: #ffffff; /* White background for header and footer */
            border-bottom: 1px solid #ddd; /* Optional border to distinguish sections */
        }

        .go-back {
    position: fixed;
    top: 60px; /* Adjust this value as needed */
    left: 10px;
    display: inline-block;
    font-size: 18px;
    color: #007bff;
    text-decoration: none;
    background: #fff;
    border: 1px solid #ddd;
    padding: 5px 10px;
    border-radius: 5px;
}

        .go-back::before {
            content: '\2190'; /* Unicode for left arrow */
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <!-- Include Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Project Details Section -->
    <section class="container mt-5">
        <a href="javascript:history.back()" class="go-back">Go Back</a>
        <?php
        // Connect to the MySQL database
        $conn = new mysqli('localhost', 'root', '', 'mydb');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the project ID from the URL
        $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        // Fetch project details from the database
        $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->bind_param('i', $project_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $project = $result->fetch_assoc();

        if ($project) {
            echo '
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <img src="'.$project['image'].'" class="card-img-top" alt="'.$project['title'].'">
                        <div class="card-body">
                            <h2 class="card-title">'.$project['title'].'</h2>
                            <p class="card-text">'.$project['description'].'</p>
                            <h5>Final Result</h5>
                            <video controls class="img-fluid">
                                <source src="'.$project['video_url'].'" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <h3>Project Details</h3>
                        <p><strong>Category:</strong> '.$project['category'].'</p>
                        <p><strong>Date:</strong> '.$project['date'].'</p>
                        <p><strong>Client:</strong> '.$project['client'].'</p>
                    </div>
                </div>
            </div>';
        } else {
            echo '<p>Project not found.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </section>

    <!-- Include Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
