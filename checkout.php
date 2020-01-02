<head>
    <title>Question Form</title>
</head>
<body>
    <h1>Thank You</h1>
    <p>Here are the items you have purchased:</p>
    <ol>
    <?php 
    foreach ($item_purchased[$_SESSION['shop_id']] as $question_id => $awnser) {
        echo "<li><em>".$questions[$question_id].":</em> ".$awnser."</li>";
    }
    ?>
    </ol>
</body>