<?php
session_start();

include '../dbaccess/sessiondb.php';

$signinerror = null;


$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);

$pswd = filter_input(INPUT_POST, 'pswd', FILTER_SANITIZE_STRING);

if (isset($user) && isset($pswd)) {
    if (!authenticate($user, $pswd)) {
        $signinerror = "Wrong username or password";
    } else {
        $_SESSION['user'] = $user;
        header('Location: .');
        exit();
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HR App Log In</title>
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
        <br>
        <h1>Welcome to our HHRR System</h1><br>
    </header>
    <main>
        <h2>Sign In</h2><br>
        <?php
        if (isset($signinerror)) {
            echo "<span class='errormsg'>$signinerror</span><br>";
        }
        ?>

        <form class="text-center border border-light p-5" action="#" method="POST">

            <label for="userlogin">User name:</label>
            <input id="userlogin" type="text" class="form-control" name="user" placeholder="User">
            <br>
            <label for="pswlogin">Password:</label>
            <input id="pswlogin" type="password" class="form-control" name="pswd" placeholder="Password">

            <button class="btn btn-info btn-block my-4" type="submit">SIGN IN</button>

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