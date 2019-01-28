
<?php 
    $error=session::get('error');
    session::unset('error');
?>
<section class='container'>
    <div class="row justify-content-center">
        <div class='col-12 col-md-6  '>
            <img src="<?php echo BASE_URL; ?>/assets/images/userLogo.png" class="bg">
            <!-- Default form register -->
            <form method="post" class="text-center border border-light p-5 form-container" action ="<?php echo BASE_URL; ?>/usersController/userRegistration">
                <p class="h4 mb-4">Sign up</p>
                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" name='firstName' id="firstName" class="form-control  <?php echo $error['firstName']? 'is-invalid': ''; ?>" placeholder="First name"required>
                        <span class="invalid-feedback" role="alert"><strong><?php echo $error['firstName']? $error['firstName']: ''; ?></strong></span>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <input type="text" name="lastName" id="lastName" class="form-control  <?php echo $error['lastName']? 'is-invalid': ''; ?>" placeholder="Last name"required>
                        <span class="invalid-feedback" role="alert"><strong><?php echo $error['lastName']? $error['lastName']: ''; ?></strong></span>
                    </div>
                </div>
                <!-- User Name -->
                <input type="text" name="userName" id="userName" class="form-control mb-4  <?php echo $error['userName']? 'is-invalid': ''; ?>" placeholder="User Name"required>
                <span class="invalid-feedback" role="alert"><strong><?php echo $error['userName']? $error['userName']: ''; ?></strong></span>
                 <!-- E-mail -->
                <input type="email" name="email" id="email" class="form-control mb-4  <?php echo $error['email']? 'is-invalid': ''; ?>" placeholder="E-mail"required>
                <span class="invalid-feedback" role="alert"><strong><?php echo $error['email']? $error['email']: ''; ?></strong></span>
                <!-- Password -->
                <input type="password" name="password" id="password" class="form-control mb-4 <?php echo $error['password']? 'is-invalid': ''; ?>"placeholder="Password" required>
                <span class="invalid-feedback" role="alert"><strong><?php echo $error['password']? $error['password']: ''; ?></strong></span>
                <!-- Confirm Password -->
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control mb-4" placeholder="Confirm Password" required>
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 6 characters and 1 digit
                </small>
                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>
                <!-- Social register -->
                <p>or sign up with:</p>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-facebook"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-twitter"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-github"></i>
                </a>
                <hr>
                <!-- Terms of service -->
                <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>
            </form>
        </div>
    </div>
</section>


          


