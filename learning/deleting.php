<!DOCTYPE html>

<?php
    header('Location: index.php');//redirect back to page

    // take data from form
    if (isset($_POST['userDelete'])) {
        $user = $_POST['userDelete'];
    }
    // connect to database
    include 'db_functions.php';
    $connection = Connect();
    echo "Connected Successfully";

    // create query
    $sql = "DELETE FROM test_login WHERE USERNAME='" . $user . "';";

    // execute query
    mysqli_query($connection, $sql);

    // create query deleting messages
    $sql = "DELETE FROM email WHERE toUser='" . $user . "';";

    // execute query
    mysqli_query($connection, $sql);

    CloseConnection($connection);
?>
