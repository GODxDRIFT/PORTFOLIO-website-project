<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .sidebar {
            background-color: #f8f9fa; /* Light background for the sidebar */
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .sidebar h2 {
            margin-bottom: 20px;
        }
        .sidebar .nav-link {
            cursor: pointer;
        }
        .sidebar .nav-link.active {
            font-weight: bold;
            color: #007bff;
        }
        .project-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Include Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Projects Page Content -->
    <section class="container mt-5">
        <div class="row">
            <!-- Sidebar for Category Selection -->
            <div class="col-md-3">
                <div class="sidebar">
                    <h2>Projects</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" data-category="all">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-category="motion-graphics">Motion Graphics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-category="visual-graphics">Visual Graphics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-category="graphic-design">Graphic Design</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-category="web-design">Web Design</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Projects Display Area -->
            <div class="col-md-9">
                <div id="projects-container" class="row">
                    <!-- Projects will be loaded here via JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <!-- Include Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to load projects based on category
            function loadProjects(category) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_projects.php?category=' + category, true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        document.getElementById('projects-container').innerHTML = this.responseText;
                    }
                };
                xhr.send();
            }

            // Load default category (All) projects on page load
            loadProjects('all');

            // Event listeners for category selection
            document.querySelectorAll('.sidebar .nav-link').forEach(function(link) {
                link.addEventListener('click', function() {
                    document.querySelectorAll('.sidebar .nav-link').forEach(function(l) {
                        l.classList.remove('active');
                    });
                    this.classList.add('active');
                    loadProjects(this.getAttribute('data-category'));
                });
            });
        });
    </script>
</body>
</html>


