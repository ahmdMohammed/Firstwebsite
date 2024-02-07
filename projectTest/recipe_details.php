<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 60%;
            max-width: 800px;
            margin: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        h2 {
            background-color: #4caf50;
            color: white;
            padding: 20px;
            margin: 0;
        }

        p {
            padding: 20px;
        }

        a {
            text-decoration: none;
            color: #4caf50;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <?php

    // Database connection parameters
    include 'db_conn.php';

    // Get recipe details based on the passed recipe ID
    if (isset($_GET['id'])) {
        $recipeId = $_GET['id'];

        $sql = "SELECT * FROM recipes WHERE recipe_id = $recipeId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h2>{$row['title']}</h2>";
            echo "<p><strong>Description:</strong> {$row['description']}</p>";
            echo "<p><strong>Preparation Time:</strong> {$row['preparation_time']} minutes</p>";
            echo "<p><strong>Cooking Time:</strong> {$row['cooking_time']} minutes</p>";
            echo "<p><strong>Servings:</strong> {$row['servings']}</p>";
        } else {
            echo "Recipe not found.";
        }
    } else {
        echo "Invalid recipe ID.";
    }

    // Close connection
    $conn->close();

    ?>

    <p><a href="view_recipes.php">Go back to View Recipes</a></p>
</div>

</body>
</html>
