<?php

require_once("shopname.php");
require_once("databaselink.php");
echo "<h1>$shop_name</h1>";

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

<form method="post">
<?php

$items = $conn->query("SELECT * FROM items")->fetchAll();

foreach ($items as $item) {
    echo "<input type='submit' name='submit' value='".$item["name"]."'>";
}
?>

</form>
<a href="checkout.php"><button>Checkout</button></a>
<a href="resetshop.php"><button>Cancel shop</button></a>


