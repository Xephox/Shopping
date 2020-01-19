<?php 

require_once("auth.php");
require_once("databaselink.php");


if (isset($_POST["shop_name"])) {
    $shop_name = $_POST["shop_name"];
    file_put_contents('shopname.php', '<?php $shop_name = '.var_export($shop_name, true).';');
} 

if (isset($_POST["new_item"]) && isset($_POST["new_price"])) {
    $sql = "INSERT INTO items (name, price)
    VALUES ('$_POST[new_item]', '$_POST[new_price]')";
    $conn->exec($sql);
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

$items = $conn->query("SELECT * FROM items")->fetchAll();
    
foreach ($items as $item) {
    echo "<li>".$item["name"]." £".$item["price"]."</li>"; 
}

?>

</form>

<a href="removeitems.php" onclick="return confirm('Are you sure you want to delete all items?');"><button>Remove all items</button></a>