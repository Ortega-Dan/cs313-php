<?php

include '../dbaccess/dbconnect.php';


function authenticate($user, $pswd)
{
    $dblink = getMyConnection();

    $query = "select username, password from authentication where username = :user";

    $stmt = $dblink->prepare($query);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result == false) {
        return false;
    }

    if (!password_verify($pswd, $result['password'])) {
        return false;
    }


    return true;
}
