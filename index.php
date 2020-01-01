<?php

if (!isset($_POST["shop_name"])) {
    $shop_name = "a shop so shop like, it has no name...";
}

require_once("shopname.php");
session_start();

?>

<h2>Admin Login</h2>
<?php
    if(isset($_POST['login'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === 'admin' && $password === 'password'){
            $_SESSION['login'] = true;
            header('Location: admin.php');
        } else {
            echo "Username and Password do not match.";
        }

    }
    if (!isset($_SESSION['login'])): ?>

    <form method="post">
        <label for="username">Username:</label><input type="text" name="username">
        <label for="password">Password:</label><input type="password" name="password">
        <input type="submit" name="login" value="Login">
    </form>

    <?php else: ?>

    <p>You're already logged in.</p>
    <a href="admin.php"><button>To admin</button></a>

    <?php endif; ?>

    <?php
    echo "<h1>Welcome to ".$shop_name."</h1>";
    ?>

    <a href="shop.php"><button>To shop</button></a>
