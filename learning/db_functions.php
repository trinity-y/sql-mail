<?php
function Connect()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "admin";
    $dbname = "learning";
    $connection = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $connection -> error);
    return $connection;
}

function CloseConnection($connection)
{
    $connection -> close();
}
?>