<?php

require_once("databaselink.php");
$shop_name = $conn->query("SELECT name FROM shop_name ORDER BY id DESC LIMIT 1")->fetch();

if (!isset($shop_name)) {
    $shop_name = "a shop so shop like, it has no name...";
}

?>
<head>
    <link href="style.css" rel="stylesheet">
</head>

<?php
    echo "<h1>Welcome to ".$shop_name[0]."</h1>";
?>

<a href="adminlogin.php"><button type="button" class="button">Admin Login</button></a>
<a href="shop.php?new=true"><button type="button" class="button">New shop</button></a>
