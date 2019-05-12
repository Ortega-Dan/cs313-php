<?php 

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$major = htmlspecialchars($_POST['major']);
$comments = htmlspecialchars($_POST['comments']);

echo "Your name is $name <br>";
echo "Your email is <a href='mailto:$email'>$email</a><br>";
echo "Your major is $major<br>";
echo "Your comments are $comments<br>";

$places = $_POST['places'];

echo "The continents you've visited are: <br>";
foreach ($places as $place) {
	echo htmlspecialchars($place)."<br>";	
}