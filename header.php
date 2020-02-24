<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Exampel - Shows up in the search results.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <nav class="navbarContainer">
            <a class="navbarLogo" href="index.php">
                <img src="images/logo.png" alt="logo">
            </a>
            <ul class="navbarMenu">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
            </ul>
            <div class="navbarLoggin">
                <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logoutSubmit">Logout</button>
                    </form>';
                    }
                    else {
                        echo '<form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailUsernameId" placeholder="E-mail/Username">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" name="loginSubmit">Login</button>
                    </form>
                    <a href="signup.php">Signup</a>';
                    }
                ?>
            </div>
        </nav>
    </header>