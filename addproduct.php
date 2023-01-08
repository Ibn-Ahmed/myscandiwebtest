<?php 
include './classes/init.php';
// print_r($_POST);

if(isset($_POST['submit'])) {
    $errors = (new Validate('prods'))->get_err_msg($_POST);
if(empty($errors)) {

    header('location:index.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="./styles/add.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Product Add</title>
</head>
<body>
<div class="container">
    <div class=" justify-content-between align-items-center">
    <h1>Product Add</h1>
    <div>
        <a href="index.php" class=" btn btn-secondary">Cancel</a >
    </div>
    </div>
    <hr>
<form action="" id="product_form" method="POST">
    <div id="result"></div>
    <div class="form-group col-5">
        <label for="sku">Sku</label>
        <input id="sku" name="sku" type="text" value="<?=isset($_POST['sku']) ? $_POST['sku'] : "";?>" class="form-control">
        <p id="result" class="text-danger"> <?= $errors['sku']??" "?></p>
    </div>
    <div class="form-group col-5">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="<?=isset($_POST['name']) ? $_POST['name'] : "";?>" id="name" class="form-control">
        <p id="result" class="text-danger"> <?= $errors['name']??""?></p>
    </div>
    <div class="form-group col-5">
        <label for="price">Price</label>
        <input id="price" name="price" type="text" value="<?=isset($_POST['price']) ? $_POST['price'] : "";?>" id="price" class="form-control">
        <p id="result" class="text-danger"> <?= $errors['price']??""?></p>
    </div>
    <div class="form-group col-5 my-3">
    <select class="form-select" value="<?=isset($_POST['type']) ? $_POST['type'] : "";?>" id="productType" name="type">
        <option value = '0'>Type Switcher</option>
        <option id="DVD" value="1">DVD</option>
        <option id="Furniture" value="2">Furniture</option>
        <option id="Book" value="3">Book</option>
    </select>
    <p class="text-danger"> <?= $errors['attribute']??""?></p>
    <p class="text-danger"><?= $errors['type']??""?></p>
</div>
    <div class="form-group col-5 value_container"></div>
    <button class="btn btn-primary" type="submit" name="submit" id="submit">Save</button>
</form>
</div>
<script src="./script/add.js"></script>
</body>
</html>