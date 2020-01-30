<?php 

require_once("auth.php");
require_once("databaselink.php");

?>

<head>
    <link href="style.css" rel="stylesheet">
</head>

<h1>Admin Area</h1>

    <a href="logout.php"><button type="button" class="button">Log out</button></a>
    <a href="index.php"><button type="button" class="button">Home</button></a>

<h2>Shop Editor</h2>

<form method="post" action="admin.php">

    <label for="shop_name">Shop name:</label><input type=text name="shop_name">
    <input class="submit" type="submit" name="submit" value="Set name">
</form>

<h1>Item Editor</h1>

<form method="post" action="admin.php">

    <label for="new_item">Type item:</label><input type=text name="new_item">
    <label for="new_price">Type price:</label><input type=number name="new_price" step=".01">
    <input class="submit" type="submit" name="submit" value="Add item">

<?php

if (isset($_POST["shop_name"])) {
    $sql = "INSERT INTO shop_name (name)
    VALUES ('$_POST[shop_name]')";
    $conn->exec($sql);
} 

if (isset($_POST["new_item"]) && isset($_POST["new_price"])) {
    $sql = "INSERT INTO items (name, price)
    VALUES ('$_POST[new_item]', '$_POST[new_price]')";
    $conn->exec($sql);
}

$items = $conn->query("SELECT * FROM items")->fetchAll();
    
foreach ($items as $item) {
    echo "<li>".$item["name"]." £".$item["price"]."</li>"; 
}

?>

</form>

<a href="removeitems.php" onclick="return confirm('Are you sure you want to delete all items?');"><button type="button" class="button">Remove all items</button></a>

<?php
var_dump($_POST[shop_name]);
?>