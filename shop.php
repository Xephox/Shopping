<?php
require_once("databaselink.php");

$shop_name = $conn->query("SELECT name FROM shop_name ORDER BY id DESC LIMIT 1")->fetch();

echo "<h1>$shop_name[0]</h1>";

session_start();
if (!isset($_SESSION["shop_id"]) || isset($_GET["new"])) {
    $_SESSION["shop_id"] = rand();
    echo "Welcome to your new shop.";
}

if (isset($_POST["submit"])) {
    $sql = "INSERT INTO purchased_items (name)
    VALUES ('$_POST[submit]')";
    $conn->exec($sql);
}

?>

<head>
    <link href="style.css" rel="stylesheet">
</head>

<form method="post">
<?php

$items = $conn->query("SELECT * FROM items")->fetchAll();

foreach ($items as $item) {
    echo "<input type='submit' name='submit' value='".$item["name"]."'>";
}
?>

</form>
<a href="checkout.php"><button type="button" class="button">Checkout</button></a>
<a href="resetshop.php"><button type="button" class="button">Cancel shop</button></a>


