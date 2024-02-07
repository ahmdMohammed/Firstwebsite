<?php
session_start();

$total = 0;
$vat = 0;
$totalWithVAT = 0;

if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key => $item) {
        $total += $item["price"];
    }

    $vat = $total * 0.15;
    $totalWithVAT = $total + $vat;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Checkout</h2>
    <?php if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])): ?>
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($_SESSION["cart"] as $key => $item): ?>
                    <div class="row">
                        <div class="col-md-4">
                            <?php echo $item["item"]; ?>
                        </div>
                        <div class="col-md-4">
                            $<?php echo $item["price"]; ?>
                        </div>
                        <div class="col-md-2">
                            <input type="number" min="1" value="1" class="form-control quantity" data-key="<?php echo $key; ?>">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger remove-item" data-key="<?php echo $key; ?>">Remove</button>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="row">
                    <div class="col-md-12">
                        VAT (15%) each: $<?php echo number_format($vat, 2); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Total (including VAT): <span id="total">$<?php echo number_format($totalWithVAT, 2); ?></span></strong>
                    </div>
                    <a href="index.php" class="btn btn-primary btn-block">Back to Home Page</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p>Your cart is empty</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    $('.quantity').on('input', function() {
        var key = $(this).data('key');
        var price = <?php echo json_encode($_SESSION["cart"][0]["price"]); ?>;
        var quantity = parseInt($(this).val());
        var total = price * quantity;
        total = total + (total * 0.15)
        $('#total').text('$' + total.toFixed(2));
    });
    

    $('.remove-item').click(function() {
        var key = $(this).data('key');
        $.post('remove_item.php', {key: key}, function(response) {
            if (response.success) {
                window.location.reload();
            } 
            window.location.reload();
        });
    });
});
</script>

</body>
</html>
