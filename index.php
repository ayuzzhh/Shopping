
<?php
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Shopping Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>My Shopping Store</h1>

    <div class="navigation">
        <a href="index.php">Home</a>
    </div>

    <main class="container">

        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
        <p>Select a product to place your order.</p>

        <div class="products">

            <?php foreach ($products as $id => $product) { ?>

                <div class="product">

                    <div class="emoji"><?php echo $product['emoji']; ?></div>

                    <h3><?php echo $product['name']; ?></h3>

                    <p class="price">Rs. <?php echo $product['price']; ?></p>

                    <a class="button-link"
                       href="buy.php?id=<?php echo $id; ?>">
                       Order Now
                    </a>

                </div>

            <?php } ?>

        </div>

    </main>

</body>
</html>
