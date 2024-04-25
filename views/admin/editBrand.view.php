<?php
require('../views/adminPartials/bander.php');
require('../views/adminPartials/navbar.php');
require('../views/adminPartials/content_wrapper.php');
require('../views/adminPartials/aside.php');
$config = require('../config.php');

$db = new Database($config['database']);
$editBrand = $db->query('select * from brand where id=:id',['id'=>$_POST['id']])->find();
?>


<form class="  container-fluid d-flex flex-column align-items-center justify-content-center" action="/admin/updateBrand" method="POST">
<h1 class="text-primary">Edit Product Brand</h1>
    <div style="width:500px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5">


        <div class="form-group">
            <label for="brand" class="text-primary mt-3">Edit Brand Name</label>
            <input type="text" class="form-control" name="name" id="brand" placeholder="name" value="<?= $editBrand['name'] ?? '' ?>">

            <?php if (isset($errors['name'])) : ?>
                <p class="text-danger"><?= $errors['name'] ?></p>
            <?php endif ?>
        </div>

        <div class="form-group">
            <label for="country" class="text-primary mt-3">Country</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?= $editBrand['country'] ?? '' ?>">

            <?php if (isset($errors['country'])) : ?>
                <p class="text-danger"><?= $errors['country'] ?></p>
            <?php endif ?>
        </div>

        
         <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Update</button>
    </div>

</form>