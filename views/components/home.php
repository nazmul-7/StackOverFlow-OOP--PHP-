
<?php
    $username='Guest';
    if(session::get("login") == true){
        if(session::get("status")==true){
            $username = session::get('firstName');
        }
    }
?>

<div class="container">
   <div class="jumbotron">
      <h1 class="display-4">Welcome, <?php echo $username; ?>!</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
   </div>
</div>
