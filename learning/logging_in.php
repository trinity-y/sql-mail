<!DOCTYPE html>

<?php
    header('Location: login_fail.php'); //redirect back to page
    // take data from form
    if (isset($_POST['userLogin'])) {
        $user = $_POST['userLogin'];
    }
    if (isset($_POST['pwdLogin'])) {
        $pwd = $_POST['pwdLogin'];
    }
    // connect to database
    include 'db_functions.php';
    $connection = Connect();
    echo "Connected Successfully";

    // create & execute query
    $sql = "SELECT USERNAME, PASSWORD FROM test_login WHERE USERNAME='" . $user . "'";
    $userRow = mysqli_query($connection, $sql);
    $userRow = mysqli_fetch_array($userRow);

    // retrieve result
    if (password_verify($pwd, $userRow[1])) {
        echo "<h1>password verified</h1>";
        setcookie("user", $user); // sets a logged in cookie with what user logged in
        header('Location: mail.php');
    }
    else {
        echo "<h1>password not verified</h1>";
    }
    CloseConnection($connection);
?>
