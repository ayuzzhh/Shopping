
<?php
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit();
}

if (!isset($_GET['id']) || !isset($products[$_GET['id']])) {
    header("Location: index.php");
    exit();
}

$id = (int) $_GET['id'];
$product = $products[$id];

$message = "";

if (isset($_POST['buy'])) {

    $user_id = $_SESSION['user_id'];
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];

    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $quantity = (int) $_POST['quantity'];

    if ($address == "" || $phone == "" || $quantity <= 0) {

        $message = "Please enter all details correctly.";

    } else {

        $product_name = $product['name'];
        $price = $product['price'] * $quantity;

        $sql = "INSERT INTO orders
                (user_id, name, email, address, product_name, price)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "issssi",
            $user_id,
            $name,
            $email,
            $address,
            $product_name,
            $price
        );

        if (mysqli_stmt_execute($stmt)) {

            header("Location: index.php?order=success");
            exit();

        } else {
            $message = "Order could not be placed.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Place Your Order</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Place Your Order</h1>

    <div class="form-container">

        <h2><?php echo htmlspecialchars($product['name']); ?></h2>

        <p class="price">Price: Rs. <?php echo $product['price']; ?></p>

        <?php if ($message != "") { ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php } ?>

        <form method="POST">

            <label>Name</label>
            <input type="text"
                   value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>"
                   readonly>

            <label>Email</label>
            <input type="email"
                   value="<?php echo htmlspecialchars($_SESSION['user_email']); ?>"
                   readonly>

            <label>Phone Number</label>
            <input type="tel" name="phone" required>

            <label>Delivery Address</label>
            <textarea name="address" rows="4" required></textarea>

            <label>Quantity</label>
            <input type="number" name="quantity" min="1" value="1" required>

            <button type="submit" name="buy">Place Order</button>

        </form>

    </div>

</body>
</html>
