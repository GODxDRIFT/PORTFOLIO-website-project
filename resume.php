<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Include Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Resume Section -->
    <section class="resume container mt-5">
        <div class="row">
            <!-- Profile Section -->
            <div class="col-md-4">
                <div class="profile-box p-3 mb-4">
                    <img src="images/your-profile-pic.jpg" class="profile-img" alt="Your Name">
                    <h1>Lalit Shakya</h1>
                </div>
            </div>

            <!-- Details Section -->
            <div class="col-md-8">
                <div class="details-box p-3 mb-4">
                    <h2 class="text-center">Details</h2>
                    <div class="details-category">
                        <h3>Personal Details</h3><hr>
                        <p>Age: 18</p>
                        <p>Address: my address</p>
                        <p>Location: New Delhi, India</p>
                        <p>Nationality: India</p>
                    </div>
                    <div class="details-category">
                        <h3>Skills</h3><hr>
                        <p>Video Editing</p>
                        <p>Graphic Design</p>
                        <p>Motion Graphics</p>
                    </div>
                    <div class="details-category">
                        <h3>Qualification</h3><hr>
                        <p>10th CBSE Board </p>
                        <p>12th CBSE Board </p>
                        <p>Pursuing BCA with Specialization of coud & Cybersecurity <br>at AMITY UNIVERSITY ONLINE</p>
                        
                        <h3>Certifications</h3><hr>
                        <p>Advanced Excel</p>
                    </div>
                  
                    <div class="details-category">
                        <h3>Experience</h3><hr>
                        <p>Fresher</p>
                    </div>
                    <div class="details-category">
                        <h3>Contact</h3><hr>
                        <p>Email: user@gmail.com</p>
                        <p>Phone: +91 xxxxxxxxxx</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
