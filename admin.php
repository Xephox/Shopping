<?php 
require_once("auth.php");
require_once("items.php");

if (isset($_POST["shop_name"])) {
    $shop_name = $_POST["shop_name"];
    file_put_contents('shopname.php', '<?php $shop_name = '.var_export($shop_name, true).';');
} 

if (isset($_POST["new_item"]) && isset($_POST["new_price"])) {
    $items[rand()] = [
        "item_name" => $_POST["new_item"],
        "item_price" => intval($_POST["new_price"]),
    ];
    file_put_contents('items.php', '<?php $items = '.var_export($items, true).';');
}

?>

<h1>Admin Area<h1>

    <a href="logout.php"><button>Log out</button></a>
    <a href="index.php"><button>Home</button></a>

<h2>Shop Editor</h2>

<form method="post" action="admin.php">

    <label for="shop_name">Shop name:</label><input type=text name="shop_name">
    <a href="admin.php"><button>Set name</button></a>
</form>

<h1>Item Editor</h1>

<form method="post" action="admin.php">

    <label for="new_item">Type item:</label><input type=text name="new_item">
    <label for="new_price">Type price:</label><input type=number name="new_price" step=".01">
    <a href="admin.php"><button>Add item</button></a>

    <?php

    foreach ($items as $item) {
        echo "<li>".$item["item_name"]." £".number_format($item["item_price"], 2, '.', '')."</li>";
    }
    ?>

</form>