<!DOCTYPE html>

<?php
    header('Location: mail.php'); //redirect back to page
    // take data from form
    if (isset($_POST['toUser'])) {
        $user = $_POST['toUser'];
    }
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
    }
    // connect to database
    include 'db_functions.php';
    $connection = Connect();
    echo "Connected Successfully";

    // create & execute query
    echo $_COOKIE["user"];
    $sql = "INSERT INTO email (message, toUser, fromUser) VALUES ('" . $message . "', '" . $user . "', '" . $_COOKIE["user"] . " ');";
    echo $sql;
    mysqli_query($connection, $sql);

CloseConnection($connection);
?>
