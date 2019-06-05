<?php
function getMyConnection()
{
    $dbUrl = getenv('DATABASE_URL');
    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"], '/');
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    return $db;
}


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
