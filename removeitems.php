<?php

require_once("databaselink.php");

$conn->query("TRUNCATE TABLE items");

header('Location: admin.php');