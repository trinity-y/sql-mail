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

<div style="margin: 1em;"> <!-- MAIN DIV -->
    <h1>Mail</h1>
    <a href="log_out.php">Log out</a>
    <!-- FIRST ROW -->
    <h2>Inbox</h2>
    <?php
        $user = $_COOKIE["user"];
        // connect to database
        include 'db_functions.php';
        $connection = Connect();

        // create query
        $sql = "SELECT * FROM `email` WHERE toUser='" . $user . "';";
        $messages = mysqli_query($connection, $sql);
        $messages = mysqli_fetch_all($messages);

    ?>
    <div class="row">
        <table style="margin:1em;" class="table">
            <tr><th>From</th><th>Message</th><th>Delete</th></tr>
            <?php
            // display messages
            foreach ($messages as $message) {
                echo "<tr>";
                echo "<td> $message[2] </td>";
                echo "<td> $message[0] </td>";
                echo "
                <td>
                    <form action='delete_message.php' method='post'>
                        <!-- HIDDEN INPUTS W/ MESSAGE DATA -->
                        <input type='hidden' name='messageContent' value='$message[0]'/>
                        <input type='hidden' name='fromUser' value='$message[2]'/>
                        <!-- DELETE BUTTON -->
                        <input class='btn btn-outline-secondary btn-sm' type='submit' id='delete' value='x'/>
                    </form>
                </td>
                ";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <!-- SENT MESSAGES -->
    <h2>Sent Messages</h2>
    <?php

    // create query
    $sql = "SELECT * FROM `email` WHERE fromUser='" . $user . "';";
    $messages = mysqli_query($connection, $sql);
    $messages = mysqli_fetch_all($messages);

    ?>
    <div class="row">
        <table style="margin:1em;" class="table">
            <tr><th>To  </th><th>Message</th><th>Undo</th></tr>
            <?php
            // display messages
            foreach ($messages as $message) {
                echo "<tr>";
                echo "<td> $message[1] </td>";
                echo "<td> $message[0] </td>";
                echo "
                <td>
                    <form action='delete_message.php' method='post'>
                        <!-- HIDDEN INPUTS W/ MESSAGE DATA -->
                        <input type='hidden' name='messageContent' value='$message[0]'/>
                        <input type='hidden' name='fromUser' value='$message[2]'/>
                        <!-- DELETE BUTTON -->
                        <input class='btn btn-outline-secondary btn-sm' type='submit' id='delete' value='x'/>
                    </form>
                </td>
                ";
                echo "</tr>";
            }
            CloseConnection($connection);
            ?>
        </table>
    </div>

    <H2>Send Message</H2>
    <div class="col-md-12">
        <form action="send_message.php" method="post">
            <!-- name -->
            <label for="user">To:</label>
            <div class="input-group mb-3">
                <input name="toUser" style="display:inline;" type="text" id="toUser" class="form-control" aria-describedby="basic-addon1">
            </div>
            <label for="message">Message:</label>
            <div class="input-group mb-3">
                <textarea name="message" id="message" class="form-control" rows="10"></textarea>
            </div>
            <button type="submit" value="Send" class="btn btn-outline-secondary btn-sm">Send</button>
        </form>
    </div>

</div>



<!-- REQUIRED FOR BOOTSTRAP -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>