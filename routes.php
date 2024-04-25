<?php
return [
    [
        'uri' => '/',
        'method' => "GET",
        'controller' => 'controllers/home.php',
        'middleware' => null
    ],

    [
        'uri' => '/login',
        'method' => 'GET',
        'controller' => 'controllers/login/create.php',
        'middleware' => "guest"
    ],

    [
        'uri' => '/cart',
        'method' => "GET",
        'controller' => 'controllers/cart.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/chackout',
        'method' => "GET",
        'controller' => 'controllers/chackout.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/chackout',
        'method' => 'POST',
        'controller' => 'controllers/order/store.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/contact',
        'method' => "GET",
        'controller' => 'controllers/contact.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/shop-detail',
        'method' => "GET",
        'controller' => 'controllers/shop-detail.php',
        'middleware' => "auth"
    ],


    [
        'uri' => '/shop-detail',
        'method' => "POST",
        'controller' => 'controllers/shop-detail.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/shop',
        'method' => "GET",
        'controller' => 'controllers/shop.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/testimonial',
        'method' => "GET",
        'controller' => 'controllers/testimonial.php',
        'middleware' => "auth"
    ],


    [
        'uri' => '/contact',
        'method' => "GET",
        'controller' => 'controllers/contact.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/dashbord',
        'method' => "GET",
        'controller' => 'controllers/dashbord.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/productTable',
        'method' => "GET",
        'controller' => 'controllers/productTable.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/insert',
        'method' => 'GET',
        'controller' => 'controllers/productData/create.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/insert',
        'method' => 'POST',
        'controller' => 'controllers/productData/store.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/insert',
        'method' => 'delete',
        'controller' => 'controllers/productData/delete.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/insertDetail',
        'method' => 'POST',
        'controller' => 'controllers/productData/detail.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/insert',
        'method' => 'PATCH',
        'controller' => 'controllers/productData/update.php',
        'middleware' => "auth"
    ],



    [
        'uri' => '/admin/productBrand',
        'method' => 'GET',
        'controller' => 'controllers/productBrand/createBrand.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/insertBrand',
        'method' => 'GET',
        'controller' => 'controllers/productBrand/insertBrand.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/insertBrand',
        'method' => 'POST',
        'controller' => 'controllers/productBrand/storeBrand.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/editBrand',
        'method' => 'POST',
        'controller' => 'controllers/productBrand/editBrand.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/editBrand',
        'method' => 'delete',
        'controller' => 'controllers/productBrand/deleteBrand.php',
        'middleware' => "auth"
    ],


    [
        'uri' => '/admin/updateBrand',
        'method' => 'POST',
        'controller' => 'controllers/productBrand/updateBrand.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/productCategory',
        'method' => 'GET',
        'controller' => 'controllers/productCategory/createCategory.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/insertCategory',
        'method' => 'GET',
        'controller' => 'controllers/productCategory/insertCategory.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/insertCategory',
        'method' => 'POST',
        'controller' => 'controllers/productCategory/storeCategory.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/editCategory',
        'method' => 'POST',
        'controller' => 'controllers/productCategory/editCategory.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/editCategory',
        'method' => 'delete',
        'controller' => 'controllers/productCategory/deleteCategory.php',
        'middleware' => "auth"
    ],


    [
        'uri' => '/admin/updateCategory',
        'method' => 'POST',
        'controller' => 'controllers/productCategory/updateCategory.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/insert',
        'method' => 'POST',
        'controller' => 'controllers/productData/store.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/insertCart',
        'method' => 'POST',
        'controller' => 'controllers/cart/insertCart.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/insertCart',
        'method' => 'delete',
        'controller' => 'controllers/cart/delete.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/insertCart',
        'method' => 'update',
        'controller' => 'controllers/cart/update.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/admin/orderTable',
        'method' => 'GET',
        'controller' => 'controllers/adminOrder/orderTable.php',
        'middleware' => "auth"
    ],

    [
        'uri' => 'admin/orderTable',
        'method' => 'POST',
        'controller' => 'controllers/adminOrder/delivered.php',
        'middleware' => "auth"
    ],

    
    [
        'uri' => '/orderHistory',
        'method' => 'GET',
        'controller' => 'controllers/orderHistory.php',
        'middleware' => "auth"
    ],



    [
        'uri' => '/login',
        'method' => 'POST',
        'controller' => 'controllers/login/store.php',
        'middleware' => "guest"
    ],

    [
        'uri' => '/logout',
        'method' => 'POST',
        'controller' => 'controllers/login/logout.php',
        'middleware' => "auth"
    ],

    [
        'uri' => '/register',
        'method' => "GET",
        'controller' => 'controllers/registration/registerCreate.php',
        'middleware' => "guest"
    ],

    [
        'uri' => '/register',
        'method' => "POST",
        'controller' => 'controllers/registration/registerStore.php',
        'middleware' => "guest"
    ],

    [
        'uri' => '/forgetPassword',
        'method' => "GET",
        'controller' => 'controllers/login/requestEmail.php',
        'middleware' => "guest"
    ],

    [
        'uri' => '/forgetPassword',
        'method' => "POST",
        'controller' => 'controllers/login/sentOTP.php',
        'middleware' => "guest"
    ],

    [
        'uri' => '/rn',
        'method' => "GET",
        'controller' => 'controllers/login/randomNumber.php',
        'middleware' => "guest"

    ],

    [
        'uri' => '/rn',
        'method' => "POST",
        'controller' => 'controllers/login/check.php',
        'middleware' => "guest"
    ],



];
