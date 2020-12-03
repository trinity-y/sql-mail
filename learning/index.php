<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SQL Test Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>

<body>
    <!-- CONNECTING TO DB -->
    <?php
        include 'db_functions.php';
        $connection = Connect();
    ?>
    <div style="margin: 1em;"> <!-- MAIN DIV -->
        <h1>SQL Test Page</h1>
        <!-- FIRST ROW (view table) -->
        <h2>View Table test_login</h2>
        <div class="row">

            <table class="table" style="margin:2em;">
                <tr><th>Username</th><th>Password</th></tr>

            <?php
                // GET TABLE
                $table = mysqli_query($connection, 'SELECT * FROM test_login'); // get table as mysqli object
                $table = mysqli_fetch_all($table); // convert to array

                foreach ($table as $row) {
                    echo "<tr>";
                    foreach ($row as $entry) {
                        echo "<td> $entry </td>";
                    }
                    echo "</tr>";
                }
                CloseConnection($connection);
            ?>
            </table>
        </div>
        <!-- SECOND ROW (edit table) -->
        <h2>Edit Table test_login</h2>
        <div class="row">

            <!-- LEFT COLUMN (add to table) -->
            <div class="col-md-4">
                <h3>Register</h3>
                <h5>Add an entry to the table.</h5>
                <form action="registering.php" method="post">
                    <!-- name -->
                    <label for="user">Username:</label>
                    <div class="input-group mb-3">
                        <input name="user" style="display:inline;" type="text" id="user" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <label for="pwd">Password:</label>
                    <div class="input-group mb-3">
                        <input name="pwd" style="display:inline;" type="password" id="pwd" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" value="Submit" class="btn btn-outline-secondary btn-sm">Submit</button>
                </form>
            </div>
            <!-- MIDDLE COLUMN (clear) -->
            <div class="col-md-4">
                <h3>Delete Account</h3>
                <h5>Remove an entry from the table.</h5>
                <form action="deleting.php" method="post">
                    <!-- name -->
                    <label for="userDelete">Username:</label>
                    <div class="input-group mb-3">
                        <input name="userDelete" style="display:inline;" type="text" id="userDelete" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" value="Delete" class="btn btn-outline-secondary btn-sm">Delete</button>
                </form>
            </div>
            <!-- RIGHT COLUMN (analyze?? login) -->
            <div class="col-md-4">
                <h3>Log in</h3>
                <h5>Checks if Username and Password are found in the table.</h5>
                <form action="logging_in.php" method="post">
                    <!-- name -->
                    <label for="userLogin">Username:</label>
                    <div class="input-group mb-3">
                        <input name="userLogin" style="display:inline;" type="text" id="userLogin" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <label for="pwdLogin">Password:</label>
                    <div class="input-group mb-3">
                        <input name="pwdLogin" style="display:inline;" type="password" id="pwdLogin" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" value="Login" class="btn btn-outline-secondary btn-sm">Login</button>
                </form>
            </div>
        </div>

    </div>



<!-- REQUIRED FOR BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>