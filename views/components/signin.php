<?php 
    $error=session::get('error');
    session::unset('error');
    $data=session::get('data');
    session::unset('data');
?>
<!-- Default form login -->
<section class='container'>
    <div class="row justify-content-center">
        <div class='col-12 col-md-4 '>
            <img src="<?php echo BASE_URL; ?>/assets/images/userLogo.png" class="bg">
            <form method="post" class="text-center border border-light p-5 form-container" action ="<?php echo BASE_URL; ?>/usersController/userLogin">
                <p class="h4 mb-2">Sign in</p>

                <!-- Username -->
                <input type="text"  name = 'userName' class="form-control mb-4 <?php echo $error['userName']? 'is-invalid': ''; ?>  " value="<?php  if(isset($data['userName'])) echo $data['userName'] ;  ?>" placeholder="Email or UserName " required autofocus>
                <span class="invalid-feedback" role="alert"><strong><?php echo isset($error['userName'])? $error['userName']: ''; ?></strong></span>

                <!-- Password -->
                <input type="password" name="password"  class="form-control mb-4  <?php echo $error['password']? 'is-invalid': ''; ?>" placeholder="Password" required>
                <span class="invalid-feedback" role="alert"><strong><?php echo isset($error['password'])? $error['password']: ''; ?></strong></span>

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"name='remember' class="custom-control-input">
                            <label class="custom-control-label" >Remember me</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                <!-- Register -->
                <p>
                    Not a member?<a href="<?php echo BASE_URL; ?>/index/signUp">Register</a>
                </p>

                <!-- Social login -->
                <p>or sign in with:</p>

                <a type="button" class="light-blue-text mx-2" onclick="window.location = '<?php echo $loginURL ?>';">
                    <i class="fa fa-facebook"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-twitter"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a type="button" class="light-blue-text mx-2" >
                    <i class="fa fa-github"></i>
                </a>
            </form>
        </div>
    </div>
</section>

