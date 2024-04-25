<?php $config = require('../config.php');

$db = new Database($config['database']); ?>

<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Yaw Min Gyi Street,Yangon</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">gatger@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.html" class="navbar-brand">
                <h1 class="text-primary display-6">Gatger</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/" class="nav-item nav-link">Home</a>
                    <a href="/shop" class="nav-item nav-link">Shop</a>
                    <a href="/chackout" class="nav-item nav-link">Checkout</a>
                    <a href="/testimonial" class="nav-item nav-link">Testimonial</a>
                     <a href="/contact" class="nav-item nav-link">Contact</a>
                     <?php if($_SESSION['user']['isAdmin']==1)
                     {
                        ?>
                        <a href="/admin/dashbord" class="nav-item nav-link">Admin</a>
                        <?php
                     }else{
                        ?>
                             <a href="/orderHistory" class="nav-item nav-link">Order History</a>
                        <?php
                        
                     }?>
                     </div>
                    <div class="d-flex m-3 me-0">
                        <a href="/cart" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                             <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php
                            $count = $db->query("select count(id) from cart where user_Id=:id",['id'=>$_SESSION['user']['user_id']])->find();
                             
                                echo $count['count(id)'];
                             
                             ?></span> 
                        </a>
                        <a href="/login" class="my-auto me-4">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                        <form action="/logout" method="POST">
                            <button type="submit" class="btn btn-primary my-auto text-white">Logout</button>
                        </form>
                    </div>
                </div>

        </nav>
    </div>
</div>