<?php
require_once("databaselink.php");
?>
<head>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>Thank You</h1>
    <p>Here are the items you have purchased:</p>
    <ul>
    <?php 

    $items = $conn->query("SELECT name, count(*) as quantity FROM `purchased_items` GROUP BY name")->fetchAll();
    if (count($items) == 0) {
        echo "You havn't purchased any items.";
    } else {
        foreach ($items as $item) {
        echo "<li>".$item["quantity"]." ".$item["name"]."</li>"; 
    }
    }
    ?>
    </ul>
    <p>Your total to pay is:

    <?php
    $total = $conn->query("SELECT sum(price) as total FROM `purchased_items` INNER JOIN `items` ON items.name = purchased_items.name")->fetch();
    if ($total["total"] == NULL) {
        echo "£0";
    } else{
        echo "£".$total["total"];
    }
    ?>
</body>

<a href="resetshop.php"><button type="button" class="button">End shop</button></a>