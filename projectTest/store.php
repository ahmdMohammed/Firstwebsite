<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<header>
        <h1>Recipe Book</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home page</a></li>
                <li><a href="add_recipe.php">Add Recipe</a></li>
                <li><a href="view_recipes.php">View Recipes</a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </nav>
    </header>

<div class="container mt-5">
    <div class="card">
        <img src="cooking_book.jpg" class="card-img-top" alt="Cooking Book">
        <div class="card-body">
            <h5 class="card-title">Cooking Book</h5>
            <p class="card-text">This cooking book contains delicious recipes.</p>
            <h6 class="card-subtitle mb-2 text-muted">$20</h6>
            <form action="add_to_cart.php" method="post">
                <input type="hidden" name="item" value="Cooking Book">
                <input type="hidden" name="price" value="20">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
