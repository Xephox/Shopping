<head>
    <link href="style.css" rel="stylesheet">
</head>

<?php
session_start();
if(isset($_POST['login'])){
    $username = $_POST['username']; $password = $_POST['password'];
    if($username === 'admin' && $password === 'password'){
        $_SESSION['login'] = true;
        header('Location: admin.php');
    } else {
        echo "Username and Password do not match.";
    }

} 

if (!isset($_SESSION['login'])): 
?>

<body>
    <div class="loginbox">
        <h2 class="admin_login">Admin Login</h2>
        <form class="admin" method="post">
            <label for="username">Username:</label><input type="text" name="username" placeholder="Enter Username">
            <label for="password">Password:</label><input type="password" name="password" placeholder="Enter Password">
            <label for="rememberme">Remember me:</label><input class="rememberme" type="checkbox" name="rememberme">
            <input class="loginbutton" type="submit" name="login" value="Login">
        </form>
    </div>
</body>

<?php else: ?>

    <p>You're already logged in.</p>
    <a href="admin.php"><button type="button" class="button">To admin</button></a>

<?php endif; ?>



