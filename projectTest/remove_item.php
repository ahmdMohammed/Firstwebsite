<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["key"])) {
    $key = $_POST["key"];
    if (isset($_SESSION["cart"][$key])) {
        unset($_SESSION["cart"][$key]);
        echo json_encode(["success" => true]);
        exit();
    }
}

echo json_encode(["success" => false]);
?>
