<?php
$title = 'Insert Brand';
require('../views/adminPartials/bander.php');
require('../views/adminPartials/navbar.php');
require('../views/adminPartials/content_wrapper.php');
require('../views/adminPartials/aside.php');
?>


<form class="  container-fluid d-flex flex-column align-items-center justify-content-center" action="/admin/insertBrand" method="POST">
<h1 class="text-primary">Product Brand</h1>
    <div style="width:500px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5">


        <div class="form-group">
            <label for="brand" class="text-primary mt-3">Add Brand Name</label>
            <input type="text" class="form-control" name="brand" id="brand" placeholder="name">

            <?php if (isset($errors['name'])) : ?>
                <p class="text-danger"><?= $errors['name'] ?></p>
            <?php endif ?>
        </div>

        <div class="form-group">
            <label for="country" class="text-primary mt-3">Country</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Country">

            <?php if (isset($errors['country'])) : ?>
                <p class="text-danger"><?= $errors['country'] ?></p>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Add</button>


    </div>

</form>