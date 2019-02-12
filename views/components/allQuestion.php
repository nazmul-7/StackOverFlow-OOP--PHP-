<div class="container">
   <div class="row">
      <!-- Card -->
      <div class="col-lg-8">
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
                    foreach ($question as $key => $value) {
                        # code...
                    
                    ?>
         <div class="card ">
            <!-- Card content -->
            <div class="card-body">
               <!-- Title -->
               <h4 class="card-title"><?php echo $value['title']; ?></h4>
               <p class="lead">
                  by
                  <a href="#"><?php echo $value['firstName'].' '.$value['lastName']?></a>
               </p>
               <hr>
               <!-- Date/Time -->
               <p>Posted on <?php echo $value['date']; ?></p>
               <hr>
               <!-- Text -->
               <p class="card-text"><?php echo $value['content']; ?></p>
               <!-- Button -->
               <?php echo'
                  <button type="button" class="btn btn-default btn-rounded"><a class="text-white" href="'.BASE_URL.'/questionController/questionDetails/'.$value['id'].'" >'.$value['name'].'</a></button>';
                  echo '
                  <button type="button" class="btn btn-unique btn-rounded"><a class="text-white" href="'.BASE_URL.'/questionController/questionDetails/'.$value['id'].'">detail</a></button>'
                  ?>
            </div>
         </div>
         <?php }?>
      </div>
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
         <?php
            if(session::get("login") == true && session::get("status")==true){
            			
                  echo'
                   <div class="card my-4" >
                       <button type="button" class="btn purple-gradient btn-lg"><a class="text-white" href="'.BASE_URL.'/questionController/showAddQuestion" >Ask Question</a></button>
                   </div>';
            }
            ?>
         <!-- Search Widget -->
         <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                  </span>
               </div>
            </div>
         </div>
         <!-- Categories Widget -->
         <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6">
                     <ul class="list-unstyled mb-0">
                        <li>
                           <a href="#">Web Design</a>
                        </li>
                        <li>
                           <a href="#">HTML</a>
                        </li>
                        <li>
                           <a href="#">Freebies</a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-6">
                     <ul class="list-unstyled mb-0">
                        <li>
                           <a href="#">JavaScript</a>
                        </li>
                        <li>
                           <a href="#">CSS</a>
                        </li>
                        <li>
                           <a href="#">Tutorials</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- Side Widget -->
         <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
               You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
         </div>
      </div>
   </div>
</div>