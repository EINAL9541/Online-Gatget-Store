<?php 

    function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();
    }

    function abort($code = 404)
    {
        http_response_code(404);

        require("views/$code.php");
        die();

    }

    function display($value,$note)
    {
       


    for($i=0; $i<$value; $i++)
    { 
        if(!isset($note[$i]))
        {
            break;
        }
    ?>
    <div class="col-md-6 col-lg-4 col-xl-3">
    <div class="rounded position-relative fruite-item">
        <div class="fruite-img">
            <img style="height:200px;" src="<?php print $note[$i]['image']?>" class="img-fluid w-100 rounded-top" alt="">
        </div>
        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?= $note[$i]['brandName']?></div>
        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
            <h4><?= $note[$i]['name']?></h4>
            <p><?= $note[$i]['review']?></p>
            <div class="d-flex justify-content-between flex-lg-wrap">
                <p class="text-dark fs-5 fw-bold mb-0">$<?= $note[$i]['price']?></p>
                <form action="/shop-detail" method="POST">
                <input type="hidden" name="id" value="<?= $note[$i]['id'] ?>">
                <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i>View Details</button>
                </form>

            </div>
        </div>
    </div>
</div>
    
    <?php
   
}

    }
