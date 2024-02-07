<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>

        .featured-section,
        .recent-section {
            margin-bottom: 20px;
        }

        .featured-section h2,
        .recent-section h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
            border-bottom: 2px solid #4caf50;
            padding-bottom: 5px;
        }

        .recipe-list {
            list-style: none;
            padding: 0;
        }

        .recipe-list li {
            background-color: #f9f9f9;
            border-radius: 8px;
            margin-bottom: 10px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .recipe-list li:hover {
            background-color: #e0f7fa;
        }

        .recipe-list li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>

    <title>Recipe Book</title>
</head>
<body>

    <header>
        <h1>Recipe Book</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home page</a></li>
                <li><a href="add_recipe.html">Add Recipe</a></li>
                <li><a href="view_recipes.php">View Recipes</a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="featured-section">
            <h2>Featured Recipes</h2>
        
            <ul>
                <?php
                include 'db_conn.php';
                $sql = "SELECT * FROM recipes WHERE is_featured = 1 LIMIT 5"; // Assuming 'is_featured' is a column indicating featured recipes
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>{$row['title']}</li>";
                    }
                } else {
                    echo "<li>No featured recipes available.</li>";
                }
                ?>
            </ul>
            </div>
            <div class='recent-section'>
            <h2>Recent Recipes</h2>
        
            <ul>
                <?php
                // Retrieve recent recipes from the 'recipes' table
                $sql = "SELECT * FROM recipes ORDER BY created_at DESC LIMIT 5"; // 'created_at' is a column indicating the creation date
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>{$row['title']}</li>";
                    }
                } else {
                    echo "<li>No recent recipes available.</li>";
                }
        
                // Close the database connection
                $conn->close();
                ?>
            </ul></div>
        
            <p><a href="view_recipes.php">Explore More Recipes</a></p>
        </div>
    </main>

</body>
</html>
