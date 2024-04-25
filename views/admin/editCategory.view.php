
<?php
$title = 'Edit Category';
require('../views/adminPartials/bander.php');
require('../views/adminPartials/navbar.php');
require('../views/adminPartials/content_wrapper.php');
require('../views/adminPartials/aside.php');
$config = require('../config.php');

$db = new Database($config['database']);
$editCategory= $db->query('select * from category where id=:id',['id'=>$_POST['id']])->find();
?>


<form class="  container-fluid d-flex flex-column align-items-center justify-content-center pt-5" action="/admin/updateCategory" method="POST">
<h1 class="text-primary">Product Category</h1>
    <div style="width:500px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5">


        <div class="form-group">
            <label for="category" class="text-primary mt-3">Edit Category Name</label>
            <input type="text" class="form-control" name="category" id="category" placeholder="Name" value="<?= $editCategory['name'] ?? '' ?>">

            <?php if (isset($errors['category'])) : ?>
                <p class="text-danger"><?= $errors['category'] ?></p>
            <?php endif ?>
        </div>
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Add</button>


    </div>

</form>