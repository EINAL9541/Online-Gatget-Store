<?php
require('partials/bander.php');
//require('partials/spinner.php');
require('partials/navbar.php');
require('partials/modalSearch.php');
require('partials/singlePage.php');
$config = require('../config.php');
$db = new Database($config['database']);
?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pt-2">Order Delivered Table</h3>

                    </div>



                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>address</th>
                                    <th>Order Date</th>
                                    <th>Mobile</th>
                                    <th>Note</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $order = $db->query('select uo.id,uo.name,uo.address,uo.orderDate,uo.mobile,uo.note,uo.status from userorder uo, orderitem ui where ui.userorder_Id=uo.id AND ui.user_Id=1')->get();
                                $i = 0;

                                while (true) {
                                    if (!isset($order[$i])) {
                                        break;
                                    }
                                ?>

                                    <tr>
                                        <td class="align-middle text-center"><?= $order[$i]['id'] ?></td>
                                        <td class="align-middle text-center"><?= $order[$i]['name'] ?></td>
                                        <td class="align-middle text-center"><?= $order[$i]['address'] ?></td>
                                        <td class="align-middle text-center"><?= $order[$i]['orderDate'] ?></td>
                                        <td class="align-middle text-center"><?= $order[$i]['mobile'] ?></td>
                                        <td class="align-middle text-center"><?= $order[$i]['note'] ?></td>
                                        <?php

                                        $item = $db->query("select p.name as name,ot.quantity,sum(ot.total) as total from orderitem ot,product p where ot.userorder_Id=:userorder_Id AND ot.product_Id=p.id", ['userorder_Id' => $order[$i]['id']])->get();

                                        ?>
                                        <td class="align-middle text-center"><?php
                                                                                $j = 0;
                                                                                while (true) {

                                                                                    echo $item[$j]['name'] . " ";

                                                                                    $j++;
                                                                                    if (!isset($item[$j])) {
                                                                                        break;
                                                                                    }
                                                                                    echo "/";
                                                                                }
                                                                                ?>
                                        </td>

                                        <td class="align-middle text-center"><?php
                                                                                $j = 0;
                                                                                while (true) {

                                                                                    echo $item[$j]['quantity'] . " ";

                                                                                    $j++;
                                                                                    if (!isset($item[$j])) {
                                                                                        break;
                                                                                    }
                                                                                    echo "/";
                                                                                }
                                                                                ?>
                                        </td>

                                        <td class="align-middle text-center"><?php


                                                                                echo $item[0]['total'] . " ";


                                                                                ?></td>

                                        <td class="align-middle text-center">
                                            <?php
                                            if ($order[$i]['status'] == 1) {
                                            ?>
                                                <span class="bg-primary text-white badge">Delivered</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span  class="bg-danger text-white badge">Ongoing</span>

                                            <?php

                                            }

                                            ?>

                                        </td>




                                    </tr>

                                <?php

                                    $i++;
                                }

                                ?>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>