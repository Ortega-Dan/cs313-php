<?php

session_start();

// Kicking out non-logged users
if (!isset($_SESSION['user'])) {
    session_destroy();
    header('Location: signin.php');
    exit();
}

include '../dbaccess/entitiesdb.php';
include '../controlhelpers/entityhelp.php';

$id = 0;
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);

$type = ($type != 'Client' && $type != 'Employee') ? 'Error' : $type;

$errormsg = null;
$infomsg = null;
if (isset($_POST['name'])) {
    $errormsg = validateEntity($_POST);
    if (!isset($errormsg)) {
        // INSERT DATA TO DATABASE AND REDIRECT TO THE GIVEN ENTITY DETAILS
    }
} else {
    $infomsg = "Information:<br>The 'name' field can't be empty<br>
    Only integers are allowed for 'IDs'<br>
    If required, data for Dates must be in the YYYY-MM-DD format<br>
    Data for 'email_address' must have an email format<br>";
}

$detarray = getDetailsForNewEntity($type);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HR App - Details</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Bootstrap main styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link rel="shortcut icon" href="../images/favicon.ico">

</head>

<body>
    <header>
        <form action="." method="POST">
            <input name="logout" value="true" hidden>
            <button id="logout" class="btn btn-outline-dark btn-rounded btn-sm my-0 waves-effect waves-light">
                LOG OUT <?php echo $_SESSION['user'] ?> .<i class="fas fa-sign-out-alt"></i>
            </button>
        </form>
        <?php echo "<br><h1>$type Details</h1><br>";
        $showmessage = (isset($errormsg) ? $errormsg : $infomsg);
        $kindofmessage = (isset($errormsg) ? 'errormsg' : 'infomsg');
        echo "<span class='$kindofmessage'>$showmessage</span><br>";

        ?>
    </header>
    <main>

        <?php echo "<h2>New $type</h2><br>"; ?>
        <form class="form-inline md-form mr-auto mb-4" action="#" method="POST">
            <?php
            echo "<table class='table table-hover'><tbody>";

            // Showing the data for the entity
            foreach ($detarray as $key => $value) {
                if ($key == "keyid") {
                    continue;
                }
                echo "<tr> <td>$key</td> <td>";

                echo "<input type='text' value='' name='$key' >";

                echo "</td> </tr>";
            }

            echo "</tbody></table>";

            ?>
            <input type='text' value='true' name='edit' hidden>
            <button id="updatebutton" class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">
                Submit
            </button>
        </form>
        <a href="." class="btn btn-outline-primary btn-rounded btn-sm my-0 waves-effect waves-light">Go back to List</a>
    </main>

    <footer>

    </footer>

    <script src="../scripts/main.js"></script>


    <!-- Bootstrap Scripts -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>
</body>

</html>