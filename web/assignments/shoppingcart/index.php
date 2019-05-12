<?php

session_start();

include '../assignmentsmodules/fromdttouncomplhead.php';


$cartset = isset($_SESSION['cartitems']);
$add = filter_input(INPUT_GET, 'add');
if (!empty($add)) {

    if ($cartset) {

        if (!in_array($add, $_SESSION['cartitems'])) {
            array_push($_SESSION['cartitems'], $add);
        } else {
          $key = array_search($add, $_SESSION['cartitems']);
          unset($_SESSION['cartitems'][$key]);
          
        }

    } else {
        $_SESSION['cartitems'] = array($add);
        $cartset = true;
    }
}



?>
</head>
<body>
<h1>
	Shopping Cart
</h1>

Choose from the following objects
<br>
Click on them to add or remove from the cart.
<br>
<p style="color: red;">Highlighted Items are in the cart.</p>
<br>
<div class="list-group">
  <a href="index.php?add=car" class="list-group-item <?php if ($cartset && in_array('car', $_SESSION['cartitems'])) echo 'active';?>">Car</a>
  <a href="index.php?add=house" class="list-group-item <?php if ($cartset && in_array('house', $_SESSION['cartitems'])) echo 'active';?>">House</a>
  <a href="index.php?add=computer" class="list-group-item  <?php if ($cartset && in_array('computer', $_SESSION['cartitems'])) echo 'active';?>">Computer</a>
  <a href="index.php?add=smartphone" class="list-group-item  <?php if ($cartset && in_array('smartphone', $_SESSION['cartitems'])) echo 'active';?>">Smartphone</a>
  <a href="index.php?add=airplane" class="list-group-item  <?php if ($cartset && in_array('airplane', $_SESSION['cartitems'])) echo 'active';?>">Airplane</a>
  <a href="index.php?add=cookbook" class="list-group-item  <?php if ($cartset && in_array('cookbook', $_SESSION['cartitems'])) echo 'active';?>">Cookbook</a>
</div>

<br>
<br>
<a href="checkout.php" class="btn btn-success" role="button">Checkout!</a>

<?php

include '../assignmentsmodules/fromuncomplbodytoend.php';
