<?php
$majors = array("CS" => "Computer Science",
    "WD" => "Web Design and Development",
    "CIT" => "Computer Information and Technology",
    "CE" => "Computer Engineering");
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

    <form action="submit.php" method="post">

        Name:<input type="text" name="name"><br>
        Email:<input type="text" name="email"><br>

        <label>Major</label> <br>

		<?php foreach ($majors as $key => $value) {?>

        	<input type="radio" name="major" value="<?php echo $key ?>"> <?php echo $value ?> <br>

		<?php }?>


        Comment:<textarea name="comment"></textarea>

        <input type="submit" value="Submit">


        <input type="checkbox" name="NAmerica" value="North America"> North America <br>
        <input type="checkbox" name="SAmerica" value="South America"> South America <br>
        <input type="checkbox" name="Europe" value="Europe"> Europe <br>
        <input type="checkbox" name="Asia" value="Asia"> Asia <br>
        <input type="checkbox" name="Australia" value="Australia"> Australia <br>
        <input type="checkbox" name="Africa" value="Africa"> Africa <br>
        <input type="checkbox" name="Antartica" value="Antarctica"> Antarctica <br>




    </form>


</body>

</html>