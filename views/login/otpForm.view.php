<form action="/rn" method="POST">

<div>

    <div class="form-group">

        <label for="exampleInputEmail1" class="text-primary mt-3">Enter OTP</label>

        <input type="number" class="form-control" style="font-size: 20px;" name="otp" id="otp" placeholder="Enter OTP">

        <?php if (isset($errors['OTP'])) : ?>
            <p class="text-danger"><?= $errors['OTP'] ?></p>
        <?php endif ?>
        <button type="submit" class="btn btn-primary text-light my-3 px-3 btn-lg">Enter</button>
    </div>

</div>

</form>