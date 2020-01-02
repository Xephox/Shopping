<?php

require_once("shopname.php");
require_once("items.php");
require_once("purchased.php");
echo "<h1>$shop_name</h1>";

session_start();
if (!isset($_SESSION["shop_id"]) || isset($_GET["new"])) {
    $_SESSION["shop_id"] = rand();
    echo "Welcome to your new shop.";
}

if (isset($_POST["submit"])) {
    foreach (array_keys($items) as $item_name) {
    $responses[$_SESSION['shop_id']][] = $_POST["item_purchased"];    
    }
    file_put_contents('purchased.php', '<?php $item_purchased = '.var_export($item_purchased, true).';');
}

?>

<form method="post">
<?php
foreach ($items as $item) {
    echo "<input type='submit' name='item_purchased' value='".$item["item_name"]."'>";
}
?>

</form>
<a href="checkout.php"><button>Checkout</button></a>
<a href="shop.php?new"><button>Cancel shop</button></a>

