<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Custom styles for the project carousel */
        .project-section {
            background-color: #6f42c1; /* Purple background */
            padding: 20px 0;
        }

        .project-carousel {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            background-color: #ffffff; /* White background for carousel items */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%; /* Ensure it expands to the full width */
            position: relative;
        }

        .project-card {
            flex: 0 0 auto;
            width: 250px; /* Adjust the width of each card as needed */
            margin-right: 20px;
            scroll-snap-align: start;
            background-color: #ffffff; /* Ensure background is white for the card */
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            text-decoration: none;
        }

        .project-card img {
            max-width: 100%;
            height: auto;
        }

        .project-description {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .view-all-btn {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        /* Optional: Style for scrollbar to make it more visible */
        .project-carousel::-webkit-scrollbar {
            height: 8px;
        }

        .project-carousel::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        .project-carousel::-webkit-scrollbar-track {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>

    <!-- Include Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Main Hero Section with Video Background -->
    <section class="hero">
        <video autoplay muted loop id="bgVideo">
            <source src="video/background.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="overlay"></div>
        <div class="container text-center hero-content">
            <img src="images/your-profile-pic.jpg" class="profile-pic" alt="Your Name">
            <h1>Lalit Shakya</h1>
            <p>Creative designer & video editor showcasing work.</p>
            <a href="#projects" class="btn btn-primary">Explore My Work</a>
        </div>
    </section>

    <!-- Portfolio Projects Section -->
    <section id="projects" class="container mt-5 position-relative project-section">
        <h2 class="text-center mb-4 text-light">My Projects</h2>
        <button id="viewAllProjectsBtn" class="btn btn-primary view-all-btn">View All Projects</button>

        <script>
        document.getElementById('viewAllProjectsBtn').addEventListener('click', function() {
            window.location.href = 'projects.php';
        });
        </script>

        <div class="project-carousel">
            <?php
            // Connecting to the MySQL database
            $conn = new mysqli('localhost', 'root', '', 'mydb');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch 12 random projects from the database
            $sql = "SELECT * FROM projects ORDER BY RAND() LIMIT 12";
            $result = $conn->query($sql);

            // Display each project as a card
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Limit description to 15 words
                    $description = implode(' ', array_slice(explode(' ', $row['description']), 0, 15)) . (strlen($row['description']) > 15 ? '...' : '');
                    
                    echo "
                    <a href='project_detail.php?id=".$row['id']."' class='project-card text-decoration-none text-dark'>
                        <img src='".$row['image']."' class='card-img-top' alt='".$row['title']."'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$row['title']."</h5>
                            <p class='card-text project-description'>".$description."</p>
                        </div>
                    </a>";
                }
            } else {
                echo "<p>No projects found.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </section>

    <!-- Include Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
