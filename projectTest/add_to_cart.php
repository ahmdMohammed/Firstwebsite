<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item"]) && isset($_POST["price"])) {
    // Retrieve form data
    $item = $_POST["item"];
    $price = $_POST["price"];

    // Initialize cart if not already set
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    // Add item to cart
    $_SESSION["cart"][] = [
        "item" => $item,
        "price" => $price
    ];
}

// Redirect back to store page
header("Location: checkout.php");
exit();
?>
