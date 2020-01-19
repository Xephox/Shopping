<?php

require_once("databaselink.php");

$conn->query("TRUNCATE TABLE purchased_items");

header('Location: index.php');