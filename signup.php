<?php
    require "header.php";
?>

    <main class="signupContainer">
        <h1>Signup</h1>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="signupError">Fill in all fields!</p>';
                }
                else if ($_GET["error"] == "invalidmailusernameId") {
                    echo '<p class="signupError">Invalid username and e-mail!</p>';
                }
                else if ($_GET["error"] == "invalidmail") {
                    echo '<p class="signupError">Invalid e-mail!</p>';
                }
                else if ($_GET["error"] == "invalidusernameId") {
                    echo '<p class="signupError">Invalid username!</p>';
                }
                else if ($_GET["error"] == "passwordcheck") {
                    echo '<p class="signupError">Your passwords do not match!</p>';
                }
                else if ($_GET["error"] == "usertaken") {
                    echo '<p class="signupError">Username is already taken!</p>';
                }
            }
            else if (isset($_GET["signup"]) == "success") {
                echo '<p class="signupSuccess">Signup successful!</p>';
            }
        ?>
        <form class="signupForm" action="includes/signup.inc.php" method="post">
            <input type="text" name="usernameId" placeholder="Username">
            <input type="text" name="mail" placeholder="E-mail">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="passwordRepeat" placeholder="Repeat Password">
            <button type="submit" name="signupSubmit">Signup</button>
        </form>
    </main>

<?php
    require "footer.php";
?>