<?php

if (!isset($_POST["shop_name"])) {
    $shop_name = "a shop so shop like, it has no name...";
}

require_once("shopname.php");
session_start();

?>

<h2>Admin Login</h2>
<?php
/*Checks if login form is set before then assigning the inputed user name and password to their assigned php variables. 
The program then checks that they both meet their required string value beofore setting the session to true and linking them to the admin page.*/
    if(isset($_POST['login'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === 'admin' && $password === 'password'){
            $_SESSION['login'] = true;
            header('Location: admin.php');
        } else {
            echo "Username and Password do not match.";
        }

    }
    /*Checks if login is not set, if so it will display the form to the user to fill out and submit, 
    however if it is set then the program will not display the form and will instead inform the user that they are already logged in and give them a button to the admin area.*/
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
    /*Displays the shop name to the user and gives the user a button that links to a fresh shop.*/
    echo "<h1>Welcome to ".$shop_name."</h1>";
    ?>

    <a href="shop.php?new=true"><button>New shop</button></a>
