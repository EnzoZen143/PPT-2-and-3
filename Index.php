<?php
// Products list using key => array (with name and price)
$products = [
    "donut1" => ["name" => "Chocolate Donut", "price" => 20],
    "donut2" => ["name" => "Strawberry Donut", "price" => 20],
    "donut3" => ["name" => "Glazed Donut", "price" => 15],
    "donut4" => ["name" => "Cookies and Cream Donut", "price" => 30],
    "donut5" => ["name" => "Cream Filled Donut", "price" => 25],
    "donut6" => ["name" => "Strawberry Filled Donut", "price" => 25],
    "donut7" => ["name" => "Caramel Filled Donut", "price" => 25],
    "donut8" => ["name" => "Almond Donut", "price" => 30],
    "donut9" => ["name" => "Coffee Donut", "price" => 30],
    "donut10" => ["name" => "Blueberry Donut", "price" => 20],
    "donut11" => ["name" => "Matcha Donut", "price" => 35],
    "donut12" => ["name" => "Onion Donut", "price" => 80],
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ordering System</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type=number] {
            width: 60px;
        }
    </style>
</head>
<body>

<h1>Order Donuts</h1>

<form method="post">
    <table>
        <tr>
            <th>Donut Name</th>
            <th>Price (₱)</th>
            <th>Quantity</th>
        </tr>

        <?php
        // Display products
        foreach ($products as $id => $info) {
            $name = $info["name"];
            $price = $info["price"];
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>₱$price</td>";
            echo "<td><input type='number' name='order[$id]' min='0' value='0'></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <input type="submit" name="buy" value="Purchase">
</form>

<?php
if (isset($_POST['buy'])) {
    $orders = $_POST['order'];
    $total = 0;

    echo "<h2>Your Order:</h2>";
    echo "<table>";
    echo "<tr><th>Donut Name</th><th>Quantity</th><th>Subtotal</th></tr>";

    foreach ($orders as $id => $qty) {
        if ($qty > 0) {
            $name = $products[$id]["name"];
            $price = $products[$id]["price"];
            $subtotal = $price * $qty;
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$qty</td>";
            echo "<td>₱$subtotal</td>";
            echo "</tr>";
            $total += $subtotal;
        }
    }

    echo "<tr><td colspan='2' style='text-align:right;'><strong>Total:</strong></td><td><strong>₱$total</strong></td></tr>";
    echo "</table>";
}
?>

</body>
</html>