<?php
require('partials/bander.php');
//require('partials/spinner.php');
require('partials/navbar.php');
require('partials/modalSearch.php');
require('partials/singlePage.php');

$config = require('../config.php');
$db = new Database($config['database']);

$note1 = $db->query("SELECT p.id,p.name,p.releaseDate,p.price,p.quantity,p.image,p.review,b.country as country,b.name as brandName,c.name as categoryName,c.id as categoryId  FROM brand b, category c, product p WHERE p.brand_Id=b.id AND p.category_Id=c.id AND p.id=:id;", ['id' => $_POST['id']])->get();
?>
            <!--  $rel = $db->query("SELECT p.id,p.name,p.price,p.image,b.name as brandName,c.name as categoryName  FROM brand b, category c, product p WHERE p.brand_Id=b.id AND p.category_Id=c.id AND c.id=:id;",['id'=>$note1[0]['category']])->get();  -->


<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">

                            <img src="<?php print $note1[0]['image'] ?>" width="420px" height="420px" class="img-fluid rounded" alt="Image">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3"><?= $note1[0]['name'] ?></h4>
                        <p class="mb-3">Category: <?= $note1[0]['categoryName'] ?></p>
                        <h5 class="fw-bold mb-3"><?= $note1[0]['price'] ?> $</h5>

                        <p><?= $note1[0]['review'] ?></p>

                       
                        <form action="/insertCart" method="POST">

                        <div class="input-group quantity mb-5" style="width: 100px;">
                           
                            <input type="number" name="quantity" class="form-control form-control-sm text-center border-0" value="1" min="0" max="<?= $note1[0]['quantity']?>">
                           
                        </div>
                        
                        <input type="hidden" name="id" value="<?= $note1[0]['id'] ?>">
                        <button  class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">Description</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab" id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission" aria-controls="nav-mission" aria-selected="false">Reviews</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p><?= $note1[0]['review'] ?></p>
                                <p><?= $note1[0]['review'] ?></p>
                                <div class="px-2">
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Brand</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"><?= $note1[0]['brandName'] ?></p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Country</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"><?= $note1[0]['country'] ?></p>
                                                </div>
                                            </div>
                                            <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Release Date</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"><?= $note1[0]['releaseDate'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" placeholder="Your Email *">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="" id="" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Please rate:</p>
                                        <div class="d-flex align-items-center" style="font-size: 12px;">
                                            <i class="fa fa-star text-muted"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">
                        <form action="/" method="POST" class="input-group w-100 mx-auto d-flex mb-4">
                            <input type="search" class="form-control p-3" placeholder="keywords" name="search" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </form>
                        <div class="mb-4">
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
                            <img src="img\mobile-phone-ads-design-template-492a3c4fd7a559dfd8d910f91428c501_screen.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                            </div>
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