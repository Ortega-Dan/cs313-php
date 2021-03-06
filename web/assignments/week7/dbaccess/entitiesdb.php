<?php

include '../dbaccess/dbconnect.php';

function getEntitiesByName($filtervalue)
{
    $dblink = getMyConnection();

    $stmt = $dblink->query("select * from (select name, 'Employee' entity, keyid from employee where keyid != 0
    union all
    select name, 'Client', keyid from client where keyid != 0)vv where vv.name ilike '%$filtervalue%' order by name");


    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getEntityDetails($type, $id)
{
    $dblink = getMyConnection();

    $querystring = 'select *, (select physical_address from address where ' . $type . '_id = ' . $id . ')
    , (select email_address from email where ' . $type . '_id = ' . $id . ')
    , (select phone_number from phone where ' . $type . '_id = ' . $id . ')
    from ' . $type . ' where keyid = ' . $id . '';

    $stmt = $dblink->query($querystring);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function updateEntity($type, $id, $updatedData)
{
    // Getting ready for DB transactions
    $dblink = getMyConnection();

    // Main update of the entity
    $greaterQuery = "update $type set ";

    foreach ($updatedData as $key => $value) {
        // SANITIZING ALL INPUT
        $value = filter_var($value, FILTER_SANITIZE_STRING);

        $query = "";
        switch ($key) {
            case 'physical_address':
                $query = "update address set 
                physical_address = '$value'
                where " . $type . "_id = $id";

                $dblink->query($query);
                break;

            case 'email_address':
                $query = "update email set
                email_address = '$value'
                where " . $type . "_id = $id";

                $dblink->query($query);
                break;

            case 'phone_number':
                $query = "update phone set
                    phone_number = '$value'
                    where " . $type . "_id = $id";

                $dblink->query($query);
                break;

            case 'edit':
                break;
            default: // Adding details for greater query
                $greaterQuery .= "$key = '$value' ,";
                break;
        }
    }

    // Removing the last added coma
    $greaterQuery = substr($greaterQuery, 0, strlen($greaterQuery) - 1);

    // Adding the setter for the greater query
    $greaterQuery .= " where keyid = $id";

    $dblink->query($greaterQuery);
}


function getDetailsForNewEntity($type){
    $dblink = getMyConnection();

    $querystring = 'select *, null physical_address, null email_address, null phone_number
    from '.$type.' where keyid = 0';

    $stmt = $dblink->query($querystring);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}