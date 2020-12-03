<!DOCTYPE html>

<?php
header('Location: index.php');//redirect back to page
// take data from form
if (isset($_POST['user'])) {
    $user = $_POST['user'];
}
if (isset($_POST['pwd'])) {
    $pwd = $_POST['pwd'];
}

// connect to database
include 'db_functions.php';
$connection = Connect();
echo "Connected Successfully";

// hashing passwords
$hash = password_hash($pwd, PASSWORD_DEFAULT);
// create query to register
$sql = "INSERT INTO test_login (USERNAME, PASSWORD) VALUES ('" . $user . "', '" . $hash . "');";
echo $sql;
mysqli_query($connection, $sql);

CloseConnection($connection);
?>
