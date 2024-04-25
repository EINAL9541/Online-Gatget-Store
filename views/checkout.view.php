<?php
require('partials/bander.php');
require('partials/spinner.php');
require('partials/navbar.php');
require('partials/modalSearch.php');
require('partials/singlePage.php');
$config = require('../config.php');
$db = new Database($config['database']);
?>

<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        <form action="/chackout" method="POST">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Name<sup>*</sup></label>
                                <input type="text" name="name" class="form-control">
                            </div>
                    <div class="form-item">
                        <label class="form-label my-3">Address <sup>*</sup></label>
                        <input type="text" name="address" class="form-control" placeholder="House Number Street Name">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Mobile<sup>*</sup></label>
                        <input type="tel" name="mobile" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Notes<sup>*</sup></label>
                        <textarea  name="note" class="form-control " spellcheck="false" cols="30" rows="11" placeholder="Oreder Notes (Optional)"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $cartData = $db->query("select c.id,c.quantity,c.total,p.image as image,p.name as name,p.price as price from cart c, product p where c.product_Id=p.id AND c.user_Id=:id", ['id' => $_SESSION['user']['user_id']])->get();
                                
                                $i = 0;
                                while (true) {
                                    if (!isset($cartData[$i])) {
                                        break;
                                    }
                                   
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="<?= $cartData[$i]['image'] ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                            </div>
                                        </th>
                                        <td class="py-5"><?= $cartData[$i]['name'] ?></td>
                                        <td class="py-5">$<?= $cartData[$i]['price'] ?></td>
                                        <td class="py-5"><?= $cartData[$i]['quantity'] ?></td>
                                        <td class="py-5">$<?= $cartData[$i]['total']?></td>
                                    </tr>

                                <?php
                                    $i++;
                                }

                                ?>

                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="text-dark py-4">Shipping Fees : </p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3">
                                            <p class="mb-0 text-dark">$50</p>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $total = $db->query("select SUM(total) as totalPrice From cart where user_Id=:id",['id' => $_SESSION['user']['user_id']])->get();
                                 $orderFee = $total[0]['totalPrice'] + 50;
                                 ?>
                                <tr>

                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">$<?= $orderFee?></p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                 
                  
                </div>
                <div class="text-center align-items-center justify-content-center pt-4">
                    <button type="submit" class="w-25 btn border-secondary py-3 px-4 text-uppercase text-primary">Place Order</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require('partials/footer.php');
require('partials/copyright.php');
require('partials/backToTop.php');
require('partials/javaScriptLibraries.php');
require('partials/templateJavaScript.php');
?>