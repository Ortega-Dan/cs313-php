<?php

echo "User Name: " . $_POST["name"] . "<br>";
echo "Email: <a href='mailto: $_POST[email]'> $_POST[email]</a><br>";
echo "Major: " . $_POST["major"] . "<br>";
echo "Comment: " . $_POST["comment"] . "<br>";

echo "<br>";

$places = $_POST['places'];

foreach ($places as $place) {

    echo $place . "<br>";
}
