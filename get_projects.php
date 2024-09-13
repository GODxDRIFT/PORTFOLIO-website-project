<?php
// Connect to the MySQL database
$conn = new mysqli('localhost', 'root', '', 'mydb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the category from the request, default to 'all'
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

// If 'all' is selected, show all projects
if ($category === 'all') {
    $sql = "SELECT * FROM projects";
    $projects_result = $conn->query($sql);
} else {
    // Convert category slug to actual category name (e.g., 'motion-graphics' to 'Motion Graphics')
    $category_name = str_replace('-', ' ', $category);

    // Prepare the SQL query to get the category ID
    $stmt = $conn->prepare("SELECT id FROM categories WHERE name = ?");
    $stmt->bind_param('s', $category_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $category_row = $result->fetch_assoc();

    // If a category ID is found, fetch projects under that category
    if ($category_row) {
        $category_id = $category_row['id'];

        // Fetch projects for this category
        $stmt = $conn->prepare("SELECT * FROM projects WHERE category_id = ?");
        $stmt->bind_param('i', $category_id);
        $stmt->execute();
        $projects_result = $stmt->get_result();
    } else {
        // If no category is found, set $projects_result to empty result
        $projects_result = $conn->query("SELECT * FROM projects WHERE 1 = 0");  // Empty result
    }
}

// Display projects if found
if ($projects_result->num_rows > 0) {
    while ($row = $projects_result->fetch_assoc()) {
        $short_description = implode(' ', array_slice(explode(' ', $row['description']), 0, 15)) . (strlen($row['description']) > 15 ? '...' : '');
        echo '
        <div class="col-md-4 project-card">
            <a href="project_detail.php?id='.$row['id'].'" class="text-decoration-none text-dark">
                <div class="card mb-4">
                    <img src="'.$row['image'].'" class="card-img-top" alt="'.$row['title'].'">
                    <div class="card-body">
                        <h5 class="card-title">'.$row['title'].'</h5>
                        <p class="card-text">'.$short_description.'</p>
                    </div>
                </div>
            </a>
        </div>';
    }
} else {
    echo '<p>No projects found.</p>';
}

// Close the database connection
$conn->close();
?>
