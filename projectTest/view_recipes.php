<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Recipes</title>
    <link rel="stylesheet" href="styles.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
            width: 80%;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
            cursor: pointer;
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
    <h2>View Recipes</h2>

    <?php

    // Database connection parameters
    include 'db_conn.php';

    // Retrieve recipes from the 'recipes' table
    $sql = "SELECT * FROM recipes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Title</th><th>Description</th><th>Preparation Time</th><th>Cooking Time</th><th>Servings</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr onclick=\"window.location='recipe_details.php?id={$row['recipe_id']}'\">";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td>{$row['preparation_time']}</td>";
            echo "<td>{$row['cooking_time']}</td>";
            echo "<td>{$row['servings']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No recipes found.";
    }

    // Close connection
    $conn->close();

    ?>

    <p><a href="index.php">Go back to Home</a></p>
</div>

</body>
</html>
