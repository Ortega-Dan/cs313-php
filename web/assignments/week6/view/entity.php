<?php
include '../dbaccess/dbconnect.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
if ($type != 'Client' && $type != 'Employee') {
    $type = 'Error';
}

// This variable will tell us the mode of the page
$edit = filter_input(INPUT_POST, 'edit', FILTER_SANITIZE_STRING);

$errormsg = null;
if ($edit == 'submit') {
    $errormsg = updateEntity($type, $id, $_POST);
}

$detarray = getEntityDetails($type, $id);
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
        <?php echo "<br><h1>$type Details</h1><br>";
        if (isset($errormsg)) {
            echo "<span class='errormsg'>$errormsg</span><br><br>";
        }
        ?>
    </header>
    <main>

        <?php echo "<h2>$detarray[name]</h2><br>"; ?>
        <form class="form-inline md-form mr-auto mb-4" action="#" method="POST">
            <?php
            echo "<table class='table table-hover'><tbody>";

            // Showing the data for the entity
            foreach ($detarray as $key => $value) {
                if ($key == "keyid") {
                    continue;
                }
                echo "<tr> <td>$key</td> <td>";

                // If we are in edit mode show the data as input fields for the form
                if ($edit == 'true') {
                    echo "<input type='text' value='$value' name='$key' >";
                } else {
                    echo $value;
                }

                echo "</td> </tr>";
            }

            echo "</tbody></table>";

            // Handling the setter (on input field) for the mode the next time the button is clicked
            echo "<input type='text' value='";
            if ($edit == 'true') {
                echo "submit";
            } elseif ($edit == null || $edit == 'submit') {
                echo "true";
            } else echo "false";
            echo "' name='edit' hidden>";

            ?>
            <button id="updatebutton" class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">
                <?php
                // Showing the right label for the button according to the mode
                if ($edit == 'true')
                    echo "Submit";
                else
                    echo "Update Record";
                ?>
            </button>
        </form>
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