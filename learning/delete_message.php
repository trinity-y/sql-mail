<!DOCTYPE html>

<?php
header('Location: mail.php');//redirect back to page

// take data from form
if (isset($_POST['messageContent'])) {
    $message = $_POST['messageContent'];
}
if (isset($_POST['fromUser'])) {
    $fromUser = $_POST['fromUser'];
}

// connect to database
include 'db_functions.php';
$connection = Connect();
echo "Connected Successfully";

// create query
$sql = "DELETE FROM email WHERE (message='" . $message . "') AND (fromUser ='". $fromUser . "');";
echo $sql;
// execute query
mysqli_query($connection, $sql);
CloseConnection($connection);
?>
