<div class="container">
<?php 
   if(isset($msg)){
      echo`
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>Great!</strong>$msg.
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>`;
   }
?>
<!-- Search form -->
<!-- <input class="form-control catagory-add " type="text" placeholder="Search" aria-label="Search"> -->
<form class="form-inline mr-auto" method="post" action="<?php echo BASE_URL.'/adminIndex/addCatagory'; ?>">
  <input class="form-control mr-sm-2" type="text" name='catagory' placeholder="Catagory Name" aria-label="Search" required>
  <button class="btn btn-unique btn-rounded btn-sm my-0" type="submit">Add</button>
</form>
   <table class="table">
      <thead class="black white-text">
         <tr>
            <th scope="col">No</th>
            <th scope="col">Catagory Name</th>
 
         </tr>
      </thead>
      <tbody>
      <?php
         $index = 0;
         foreach ($catagoryData as $key => $value) {
           $index++;
        ?>
         <tr>
            <th scope="row"><?php echo $index;?></th>
            <td><?php echo $value['name'];?></td>

         </tr>
         <?php  }  ?>
      </tbody>
   </table>

</div>