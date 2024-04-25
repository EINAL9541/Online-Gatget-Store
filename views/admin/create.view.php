<?php
require('../views/adminPartials/bander.php');
require('../views/adminPartials/navbar.php');
require('../views/adminPartials/content_wrapper.php');
require('../views/adminPartials/aside.php');

$config = require('../config.php');

$db = new Database($config['database']);
$note = $db->query('SELECT  id,name FROM brand')->get();
$note2 = $db->query('SELECT  id,name FROM category')->get();

?>


<form class="vh-100  container-fluid d-flex align-items-center justify-content-center" action="/admin/insert" method="POST" enctype="multipart/form-data">

    <div style="background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded d-flex">

        <div class="p-5" style="width:300px;">
            <div class="form-group">
                <label for="name" class="text-primary mt-3">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">

                <?php if (isset($errors['name'])) : ?>
                    <p class="text-danger"><?= $errors['name'] ?></p>
                <?php endif ?>
            </div>

            <div class="form-group">
                <label for="price" class="text-primary mt-3">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Price">

                <?php if (isset($errors['price'])) : ?>
                    <p class="text-danger"><?= $errors['price'] ?></p>
                <?php endif ?>
            </div>

            <div class="form-group">
                <label for="releaseDate" class="text-primary mt-3">Release Date</label>
                <input type="date" class="form-control text-secondary" name="releaseDate" id="releaseDate" placeholder="Release Date">

                <?php if (isset($errors['releaseDate'])) : ?>
                    <p class="text-danger"><?= $errors['releaseDate'] ?></p>
                <?php endif ?>
            </div>

            <div class="form-group">
                <label for="review" class="text-primary mt-3">Reviews</label>
                <textarea class="d-block form-control" name="review" id="review" cols="30" rows="5" placeholder="Enter Review"></textarea>

                <?php if (isset($errors['review'])) : ?>
                    <p class="text-danger"><?= $errors['review'] ?></p>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Add</button>
        </div>

        <div class="p-5" style="width:300px;">
            <div class="form-group">
                <label for="quantity" class="text-primary mt-3">Quantity</label>
                <input type="number" class="form-control text-secondary" name="quantity" id="quantity" placeholder="Quantity">

                <?php if (isset($errors['quantity'])) : ?>
                    <p class="text-danger"><?= $errors['quantity'] ?></p>
                <?php endif ?>
            </div>




            <div class="form-group">
                <label for="brand" class="text-primary mt-3">Brand</label>
                <select class="form-select form-select-lg mb-3 form-control" id="brand" name="brand" aria-label=".form-select-lg example">
                    <option selected disabled class="text-secondary">Open this select menu</option>

                    <?php
                    $i = 0;
                    while (true) {
                        if (!isset($note[$i])) {
                            break;
                        }
                    ?>

                        <option value="<?php echo $note[$i]['id'] ?>" class="text-secondary"><?= $note[$i]['name'] ?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>

                <?php if (isset($errors['brand'])) : ?>
                    <p class="text-danger"><?= $errors['brand'] ?></p>
                <?php endif ?>
            </div>

            <div class="form-group">
                <label for="category" class="text-primary mt-3">Category</label>
                <select class="form-select form-select-lg mb-3 form-control" id="brand" name="category" aria-label=".form-select-lg example">
                    <option selected disabled class="text-secondary">Open this select menu</option>

                    <?php
                    $i = 0;
                    while (true) {
                        if (!isset($note2[$i])) {
                            break;
                        }
                    ?>

                        <option value="<?php echo $note[$i]['id'] ?>" class="text-secondary"><?= $note2[$i]['name'] ?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>

                <?php if (isset($errors['category'])) : ?>
                    <p class="text-danger"><?= $errors['category'] ?></p>
                <?php endif ?>
            </div>

            <div class="form-group">
                <label for="image" class="text-primary mt-3">Image</label>
                <input type="file" class="form-control pt-1 text-secondary" name="image" id="image" placeholder="image path">

                <?php if (isset($errors['image'])) : ?>
                    <p class="text-danger"><?= $errors['image'] ?></p>
                <?php endif ?>
            </div>

        </div>

    </div>

</form>