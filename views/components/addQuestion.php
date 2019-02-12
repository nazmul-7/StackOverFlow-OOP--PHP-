<div class="container">
<script src="http://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<div class="myclass">
   <h2>Ask new Question</h2>
   <form action="<?php echo BASE_URL;?>/questionController/storeQuestion" method="post" class="form-signin" enctype="multipart/form-data">
      <table>
         <tr>
            <td>Title</td>
            <td><input type="text" name="title"  class="form-signin form-control"  required /></td>
         </tr>
         <tr>
            <td>Content</td>
            <td>
               <textarea name="content" ></textarea>
               <script >CKEDITOR.replace('content');</script>
            </td>
         </tr>
         <tr>
            <td>Category</td>
            <td><select class="browser-default custom-select" value='' name='category_id' >
                  <option selected>Open this select Category</option>
                  <?php foreach ($category as $key => $value) {
                     
                  ?>
                  <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                  <?php }?>
                </select>
            </td>
         </tr>
         <tr>
            <td></td>
            <td><button class="btn btn-info form-signin form-control" type="submit" name="submit" />Save</button></td>
         </tr>
      </table>
   </form>
</div>
</div>