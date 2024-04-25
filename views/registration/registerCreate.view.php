<?php require('../views/partials/bander.php'); ?>


<form class=" container-fluid d-flex align-items-center justify-content-center vh-100" action="/register" method="POST">
    <div style="width:400px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5">
        <div class="mb-3">
            <label for="name" class="form-label text-primary">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $_POST['name'] ?? '' ?>" placeholder="Name">
            <?php if (isset($errors['name'])) : ?>
                <p class="text-danger"><?= $errors['name'] ?></p>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label text-primary">Email address</label>
            <input value="<?= $_POST['email'] ?? '' ?>" type="text" class="form-control" id="email" name="email" placeholder="name@example.com">
            <?php if (isset($errors['email'])) : ?>
                <p class="text-danger"><?= $errors['email'] ?></p>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-primary">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <?php if (isset($errors['password'])) : ?>
                <p class="text-danger"><?= $errors['password'] ?></p>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label text-primary">Confirm Password</label>
            <input type="password" class="form-control" id="password" name="confirmPassword" placeholder="Confirm Password">
            <?php if (isset($errors['confirmPassword'])) : ?>
                <p class="text-danger"><?= $errors['confirmPassword'] ?></p>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-primary text-light mx-auto mt-4">Register</button>
        <p class="text-primary mt-1">Already have an account <a href="/" class="text-warning">Login?</a></p>
    </div>
</form>

<?php require('../views/partials/footer.php'); ?>