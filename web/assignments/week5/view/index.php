<?php
include '../dbaccess/dbconnect.php';

$filtervalue = filter_input(INPUT_POST, 'filter', FILTER_SANITIZE_STRING);
if ($filtervalue == null) {
    $filtervalue = "";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HR App</title>
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
        <h1>Hi <br> Welcome to our HHRR System</h1>
    </header>
    <main>


        <form class="form-inline md-form mr-auto mb-4" action="../view/index.php" method="POST">
            <input <?php if ($filtervalue != "") {
                        echo " value='$filtervalue' ";
                    } ?> class="form-control mr-sm-2" type="text" placeholder="Enter Name Or Part of a Name" name="filter" aria-label="Search">
            <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Filter Results</button>
        </form>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Entity</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $array = getEntitiesByName($filtervalue);

                foreach ($array as $each) {
                    echo "<tr><td>$each[name]</td>";
                    echo "<td>$each[entity] </i></td>";
                    echo "<td><a class='btn btn-outline-primary' href='entity.php?type=$each[entity]&id=$each[keyid]' role='button'><i class='fas fa-search' aria-hidden='true'></a></td></tr>";
                }

                ?>

            </tbody>
        </table>

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