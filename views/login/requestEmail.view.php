<div class=" container-fluid d-flex flex-column align-items-center justify-content-center vh-100 " >

    <div style="width:450px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5 position-relative">

        <form action="/forgetPassword" method="POST">

            <div>

                <div class="form-group">

                    <label for="exampleInputEmail1" class="text-primary mt-3">Enter your email address</label>

                    <div class="d-flex flex-row">

                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <button type="submit" class="btn btn-primary text-light ms-4" name="sent">Sent</button>

                    </div>

                    <small id="emailHelp" class="form-text text-light">We'll sent OTP to your email.</small>
                    <?php if (isset($errors['email'])) : ?>
                        <p class="text-danger"><?= $errors['email'] ?></p>

                    <?php endif ?>
                </div>

            </div>
        </form>
        
        <?php require('../controllers/login/otpForm.php'); ?>
    
        <div class="position-absolute" style="right:43px; bottom:65px;">
             <?php if (isset($_COOKIE['randomNumber'])) :  ?> 
                <span id="count" class="text-primary"></span>
                <script>
                    var count = 60;
                    var show = document.getElementById("count");
                    setInterval(function() {
                        if (count) {
                            show.innerHTML = "Enter OTP in : %d S".replace("%d", count);
                            count--;
                        }else{
                            show.innerHTML = "OTP Expired!";
                        }
                    }, 1000)
                </script>
            <?php endif ?> 

        </div>
    </div>


</div>