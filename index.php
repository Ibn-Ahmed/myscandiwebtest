<?php
include './classes/init.php';
$products = new products('prods');
if(isset($_POST['btn_delete'])) {
    $products->delete_by_check($_POST);
}
$rows = $products->get_all();

?>
 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/list.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between">
            <h1 class="p-3">Product List</h1>
            <div>
                 <a class="btn btn-outline-primary btn-sm mx-2" href="addproduct.php"> ADD</a>
                </div>
            </header>
            <hr>
    <form action="" id="" method="POST">
        <main>
<?php if(is_array($rows)) :?>
<?php foreach($rows as $row) :?>       
    <div class="holder" id="mydata">
        <input class="delete-checkbox" type="checkbox" name="product[]" value="<?=$row['sku']?>">
        <ul>
            <li class="fw-bold"><?=$row['sku']?></li>
            <li><?=$row['name']?></li>
            <li><?=$row['price']."$"?></li>
            <li><?=$row['attribute']?></li>
        </ul>
    </div>
<?php endforeach;?>
<?php endif;?>
        </main>
            <input type="submit"class="btn btn-outline-danger" id="delete" value="MASS DELETE"  name="btn_delete">             
        </form>
         
    </div>
    <script src="./script/list.js"></script>
    </body>
</html>