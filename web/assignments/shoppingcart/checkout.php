<?php

session_start();

include '../assignmentsmodules/fromdttouncomplhead.php';
?>
</head>
<body>
<h1>
	Checkout
</h1>

Please add your shipping information:

<br>
<br>

<form action="confirmation.php" method="post">
    <div class="form-group">
      <label for="address1">Address 1</label>
      <input type="text" class="form-control" id="address1" placeholder="Enter your address" name="add1">
    </div>
    <div class="form-group">
      <label for="address2">Address 2</label>
      <input type="text" class="form-control" id="address2" placeholder="Enter your address" name="add2">
    </div>
    <div class="form-group">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city" placeholder="Enter your city" name="city">
    </div>
    <div class="form-group">
      <label for="state">State</label>
      <input type="text" class="form-control" id="state" placeholder="Enter your state" name="state">
    </div>
    <div class="form-group">
      <label for="zip">Zip Code</label>
      <input type="number" class="form-control" id="zip" placeholder="Enter your zip code" name="zip">
    </div>
    <button type="submit" class="btn btn-success">Submit Order</button>
</form>

<br>

  <button type="button" class="btn btn-warning">Return to cart</button>

<?php

include '../assignmentsmodules/fromuncomplbodytoend.php';
