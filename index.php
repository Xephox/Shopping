<?php

if (!isset($_POST["shop_name"])) {
    $shop_name = "a shop so shop like, it has no name...";
}

require_once("shopname.php");

?>
<head>
    <link href="style.css" rel="stylesheet">
</head>

<a href="adminlogin.php"><button>Admin Login</button></a>

<?php
    echo "<h1>Welcome to ".$shop_name."</h1>";
?>

    <a href="shop.php?new=true"><button>New shop</button></a>
