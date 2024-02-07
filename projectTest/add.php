<?php

include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for adding a recipe
    $title = $_POST["title"];
    $description = $_POST["description"];
    $preparationTime = $_POST["preparation_time"];
    $cookingTime = $_POST["cooking_time"];
    $servings = $_POST["servings"];


    // Insert into the 'recipes' table
    $sql = "INSERT INTO recipes (title, description, preparation_time, cooking_time, servings) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiii", $title, $description, $preparationTime, $cookingTime, $servings);
    $stmt->execute();

    // Check for success
    if ($stmt->affected_rows > 0) {
        echo "Recipe added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();

header('Location: view_recipes.php');
exit;
?>