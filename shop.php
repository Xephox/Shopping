<?php
require_once("shopname.php");
require_once("items.php");
echo "<h1>$shop_name</h1>";
?>

<form action="confirmation.php" method="post">
<?php
foreach ($items as $item) {
    echo "<label for='".$item["item_name"]."'></label><input type=button name='".$item["item_name"]."' value='".$item["item_name"]."'>";
}
?>
<input type="submit" name="submit" value="Submit">
