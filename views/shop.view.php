<?php
    require('partials/bander.php');
    require('partials/spinner.php');
    require('partials/navbar.php');
    require('partials/modalSearch.php');
    require('partials/singlePage.php');
    
$config = require('../config.php');
$db = new Database($config['database']);
    ?>

<div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Gatger shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                            <form action="/" method="POST" class="input-group w-100 mx-auto d-flex mb-4">
                            <input type="search" class="form-control p-3" placeholder="keywords" name="search" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </form>
                            </div>
                            <div class="col-6"></div>
                            
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                        <h4>Categories</h4>
                            <ul class="list-unstyled fruite-categorie">
                                <?php $category = $db->query("select * from category")->get();
                                $i = 0;
                                while (true) {
                                 if (!isset($category[$i])) {
                                break;
                                }
                                ?>

                                <li>
                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="#"><i class="fas fa-apple-alt me-2"></i><?= $category[$i]['name']?></a>
                                        <span>(<?= $i ?>)</span>
                                    </div>
                                </li>
                               
                               <?php 
                               $i++;
                            }?>
                            </ul>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12">
                                    <h4 class="mb-4">Featured products</h4>
                        <?php
                        $note = $db->query("SELECT p.id,p.name,p.price,p.image,p.review,b.name as brandName,c.name as categoryName  FROM brand b, category c, product p WHERE p.brand_Id=b.id AND p.category_Id=c.id;")->get();
                        for($i=0; $i<6; $i++)
                          { 
                        if(!isset($note[$i]))
                        {
                           break;
                          }
                       ?>

                        <div class="d-flex align-items-center justify-content-start">
                            <div class="rounded" style="width: 100px; height: 100px;">
                                <img src="<?php print $note[$i]['image']?>" class="img-fluid rounded" style="height:80px !important; width:80px !important;" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2"><?= $note[$i]['name']?></h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2"><?= $note[$i]['price']-100?> $</h5>
                                    <h5 class="text-danger text-decoration-line-through"><?= $note[$i]['price']?> $</h5>
                                </div>
                            </div>
                        </div>

                        <?php

                          }?>


                                    </div>
                                    <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">

                                <?php $note = $db->query("SELECT p.id,p.name,p.price,p.image,p.review,b.name as brandName,c.name as categoryName  FROM brand b, category c, product p WHERE p.brand_Id=b.id AND p.category_Id=c.id;")->get();
                                    for($i=0; $i<9; $i++)
                                    { 
                                        if(!isset($note[$i]))
                                        {
                                            break;
                                        }
                                ?>
                                   <div class="col-md-6 col-lg-6 col-xl-4">
                                   <div class="rounded position-relative fruite-item">
                                       <div class="fruite-img">
                                           <img style="height:200px;" src="<?php print $note[$i]['image']?>" class="img-fluid w-100 rounded-top" alt="">
                                       </div>
                                       <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                       <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                           <h4><?= $note[$i]['name']?></h4>
                                           <p><?= $note[$i]['review']?></p>
                                           <div class="d-flex justify-content-between flex-lg-wrap">
                                               <p class="text-dark fs-5 fw-bold mb-0">$<?= $note[$i]['price']?></p>
                                               <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                              <?php
                                    }

                                   ?>
                                   
                    
                                </div>
                            </div>
                        </div>
                    </div>
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