<form class=" container-fluid d-flex align-items-center justify-content-center vh-100 bg-white" action="/login" method="POST">
    <div style="width:400px; background-color: rgba(255,255,255,0.4);" class="border border-primary border-3 rounded p-5 ">
        <div class="form-group">
            <label for="exampleInputEmail1" class="text-primary mt-3">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-dark">We'll never share your email with anyone else.</small>
            <?php if (isset($errors['email'])) : ?>
                <p class="text-danger"><?= $errors['email'] ?></p>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="text-primary mt-3">Password</label>
            <input type="password" class="form-control mb-2" name="password" id="exampleInputPassword1" placeholder="Password">
            <a href="/forgetPassword"  class="text-warning" >Forget Your Password?</a>
            <?php if (isset($errors['password'])) : ?>
                <p class="text-danger"><?= $errors['password'] ?></p>
            <?php endif ?>
            <?php if (isset($errors['wrong'])) : ?>
                <p class="text-danger"><?= $errors['wrong'] ?></p>
            <?php endif ?>
        </div>
        <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Login</button>
        <p class="text-primary mt-1">Don't have an account <a href="/register" class="text-warning" >Register?</a></p>
    </div>

</form>