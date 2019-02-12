
<?php
    $username='Guest';
    if(session::get("login") == true){
        $username = session::get('firstName');
    }
?>

<div class="container">
   <div class="jumbotron">
      <h1 class="display-4">Hello, <?php echo $username; ?>!</h1>
      <p class="lead">Active your profile by varified your email address.We have sent a Varification link to your email.</p>
      <hr class="my-4">
   </div>
</div>
