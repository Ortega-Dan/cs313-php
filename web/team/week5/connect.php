<h1>Scripture Resources</h1>

<?php

$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"], '/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$stmt = $db->query('select book,chapter,verse,"content" from testandteam.scriptures');

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt->closeCursor();

foreach ($result as $row) {
    echo "<b>$row[book] $row[chapter]:$row[verse]</b> - \"$row[content]\"<br>";
}

