<?php
if (isset($_POST['loginSubmit'])) {
    
    require 'dbh.inc.php';

    $mailUsername = $_POST['mailUsernameId'];
    $password = $_POST['password'];

    if (empty($mailUsername) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE usernameUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailUsername, $mailUsername);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($password, $row['passwordUsers']);
                if ($passwordCheck == false) {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
                else if($passwordCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUsernameId'] = $row['usernameUsers'];

                    header("Location: ../index.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location: ../index.php");
    exit();
}