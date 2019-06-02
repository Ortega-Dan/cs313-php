<?php
include '../dbaccess/dbconnect.php';

$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$type = filter_input(INPUT_GET,'type', FILTER_SANITIZE_STRING);
if($type != 'Client' && $type!='Employee'){
    $type = 'Error';
}

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
        <?php echo "<h1>$type Details</h1>" ?>
    </header>
    <main>
<h2></h2>
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