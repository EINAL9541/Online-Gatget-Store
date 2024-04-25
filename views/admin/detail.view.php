<?php
$title = 'Edit Brand';
require('../views/adminPartials/bander.php');
require('../views/adminPartials/navbar.php');
require('../views/adminPartials/content_wrapper.php');
require('../views/adminPartials/aside.php');

$config = require('../config.php');

$db = new Database($config['database']);
$brand = $db->query('SELECT  id,name FROM brand')->get();
$category = $db->query('SELECT  id,name FROM category')->get();
$note3 = $db->query(
    "SELECT p.name,p.price,p.releaseDate,p.review,p.quantity,p.image,b.id as brandId,c.id as categoryId,b.name as brandName,c.name as categoryName  FROM brand b, category c, product p WHERE p.brand_Id=b.id AND p.category_Id=c.id AND p.id=:id;",
    [
        'id' => $_POST['id']
    ]
)
    ->find();
?>


<h1 class="text-primary">Insert Product</h1>
<form class="vh-100  container-fluid d-flex align-items-center justify-content-center" action="/admin/insert" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="method" value="PATCH">
    <input type="hidden" name="id" value="<?=$_POST['id'] ?>">

    <div style="background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded d-flex">

        <div class="p-5" style="width:300px;">
            <div class="form-group">
                <label for="name" class="text-primary mt-3">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= $note3['name'] ?? '' ?>">

                <?php if (isset($errors['name'])) : ?>
                    <p class="text-danger"><?= $errors['name'] ?></p>
                <?php endif ?>
            </div>

            <div class="form-group">
                <label for="price" class="text-primary mt-3">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Price" value="<?= $note3['price'] ?? '' ?>">

                <?php if (isset($errors['price'])) : ?>
                    <p class="text-danger"><?= $errors['price'] ?></p>
                <?php endif ?>
            </div>

            <div class="form-group">
                <label for="releaseDate" class="text-primary mt-3">Release Date</label>
                <input type="date" class="form-control text-secondary" name="releaseDate" id="releaseDate" placeholder="Release Date" value="<?= $note3['releaseDate'] ?? '' ?>">

                <?php if (isset($errors['releaseDate'])) : ?>
                    <p class="text-danger"><?= $errors['releaseDate'] ?></p>
                <?php endif ?>
            </div>

            <div class="form-group">
                <label for="review" class="text-primary mt-3">Reviews</label>
                <textarea class="d-block form-control" name="review" id="review" cols="30" rows="5" placeholder="Enter Review"><?= $note3['review'] ?? '' ?></textarea>

                <?php if (isset($errors['review'])) : ?>
                    <p class="text-danger"><?= $errors['review'] ?></p>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Update</button>
        </div>

        <div class="p-5" style="width:300px;">
            <div class="form-group">
                <label for="quantity" class="text-primary mt-3">Quantity</label>
                <input type="number" class="form-control text-secondary" name="quantity" id="quantity" placeholder="Quantity" value="<?= $note3['quantity'] ?? '' ?>">

                <?php if (isset($errors['quantity'])) : ?>
                    <p class="text-danger"><?= $errors['quantity'] ?></p>
                <?php endif ?>
            </div>




            <div class="form-group">
                <label for="brand" class="text-primary mt-3">Brand</label>
                <select class="form-select form-select-lg mb-3 form-control" id="brand" name="brand" aria-label=".form-select-lg example">
                    <option value="<?php echo $note3['brandId'] ?>" selected disabled class="text-secondary"><?= $note3['brandName'] ?? '' ?></option>

                    <?php
                    $i = 0;
                    while (true) {
                        if (!isset($brand[$i])) {
                            break;
                        }
                    ?>

                        <option  value="<?php echo $brand[$i]['id'] ?>" class="text-secondary"><?= $brand[$i]['name'] ?></option>
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
                    <option value="<?php echo $note3['brandId'] ?>" selected disabled class="text-secondary"><?= $note3['categoryName'] ?? '' ?></option>
                  
                    <?php
                    $i = 0;
                    while (true) {
                        if (!isset($category[$i])) {
                            break;
                        }
                    ?>

                        <option value="<?php echo $category[$i]['id'] ?>" class="text-secondary"><?= $category[$i]['name'] ?></option>
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

            <img src="<?php print $note3['image'] ?>" class="img-fluid w-100 rounded-top" alt="">

        </div>

    </div>

</form>