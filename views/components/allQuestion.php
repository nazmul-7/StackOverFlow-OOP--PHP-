<div class="container">
<!-- Card -->
<?php
if(session::get("msg")){
    $msg = session::get("msg");
    session::unset("msg");
       echo'
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Great!</strong> '.$msg.'.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
?>
<?php 
        foreach ($question as $key => $value) {
            # code...
        
        ?>
<div class="card col-md-8 ">


  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h4 class="card-title"><?php echo $value['title']; ?></h4>
    <!-- Text -->
    <p class="card-text"><?php echo $value['content']; ?></p>
    <!-- Button -->
    <button type="button" class="btn btn-default btn-rounded"><?php echo $catagory[$value['category_id']-1]['name']; ?></button>
    <button type="button" class="btn btn-unique btn-rounded">detail</button>

  </div>

</div>
<?php }?>
</div>
<?php
	if(session::get("login") == true && session::get("status")==true){
				
       echo'
        <div class="Col-4" >
            <button type="button" class="btn purple-gradient btn-lg"><a class="text-white" href="'.BASE_URL.'/questionController/showAddQuestion" >Ask Question</a></button>
        </div>';
}
?>
