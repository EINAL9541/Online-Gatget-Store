<?php
require('partials/bander.php');
//require('partials/spinner.php');
require('partials/navbar.php');
require('partials/modalSearch.php');
require('partials/singlePage.php');
$config = require('../config.php');
$db = new Database($config['database']);
?>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Update</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $cartData = $db->query("select c.product_Id,c.id,c.quantity,p.image as image,p.name as name,p.price as price from cart c, product p where c.product_Id=p.id AND c.user_Id=:id", ['id' => $_SESSION['user']['user_id']])->get();


                    $i = 0;
                    while (true) {
                        if (!isset($cartData[$i])) {
                            break;
                        }
                    ?>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="<?php print $cartData[$i]['image'] ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4"><?= $cartData[$i]['name'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"><?= $cartData[$i]['price'] ?> $</p>
                            </td>
                            <?php
                            $quan = $db->query("select quantity from product where id=:id", ['id' => $cartData[$i]['product_Id']])->get();
                            ?>

                            <form action="/insertCart" method="POST">
                            <input type="hidden" name="method" value="update">
                            <input type="hidden" name="id" value="<?= $cartData[$i]['id'] ?>">
                                <td>
                                    <input type="number" name="quantity" class="form-control border-0 mt-4" value="<?= $cartData[$i]['quantity'] ?>" min="0" max="<?= $quan[0]['quantity'] ?>">
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4">
                                        <i class="fa fa-check text-success"></i>
                                    </button>
                                </td>
                            </form>
                            <form action="/insertCart" method="POST">
                                <td>
                                    <input type="hidden" name="method" value="delete">
                                    <input type="hidden" name="id" value="<?= $cartData[$i]['id'] ?>">
                                    <button class="btn btn-md rounded-circle bg-light border mt-4">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </form>



                        </tr>
                    <?php
                        $i++;
                    }

                    ?>
                </tbody>
            </table>
        </div>

        <?php
        //  $total = $db->query("select SUM(total) as totalPrice From cart where user_Id=:id",['id' => $_SESSION['user']['user_id']])->get();
        // $orderFee = $total[0]['totalPrice'] + 50;
        ?>


        <div class="d-flex justify-content-center">
            <a href="/chackout" class=" btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</a>

        </div>



    </div>
</div>

<?php
require('partials/footer.php');
require('partials/copyright.php');
require('partials/backToTop.php');
require('partials/javaScriptLibraries.php');
require('partials/templateJavaScript.php');
?>