<div class="container">
   <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-8">
         <!-- Title -->
         <h1 class="mt-4"><?php echo $questionDetails[0]['title']?></h1>
         <!-- Author -->
         <p class="lead">
            by
            <a href="#"><?php echo $questionDetails[0]['firstName'].' '.$questionDetails[0]['lastName']?></a>
         </p>
         <hr>
         <!-- Date/Time -->
         <p>Posted on January 1, 2018 at 12:00 PM</p>
         <hr>
         <!-- Preview Image -->
         <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->
         <?php echo'
            <button type="button" class="btn btn-default btn-rounded"><a class="text-white" href="'.BASE_URL.'/questionController/questionDetails/'.$questionDetails[0]['category_id'].'" >'.$questionDetails[0]['name'].'</a></button>';
            ?>
         <hr>
         <!-- Post Content -->
         <p class="lead"><?php echo $questionDetails[0]['content']?></p>
         <hr>
         <div id="comment-message">Answer Added Successfully!</div>
         <!-- Comments Form -->
         <div class="card my-4">
            <h5 class="card-header">Leave a Answer:</h5>
            <div class="card-body">
               <form method="post" id="form_comment" action ="<?php echo BASE_URL; ?>/questionController/storeAnswer" >
                  <div class="form-group">
                     <input type="hidden" name="question_id" value="<?php echo $questionDetails[0]['id']?>">
                     <textarea name="content" id='content'class="form-control" rows="3"></textarea>
                  </div>
                  <button type="submit" id="submitComment" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
         <div id="output"></div>
         <!-- Single Comment -->
         <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
               <h5 class="mt-0">Commenter Name</h5>
               Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
            <button  class="btn btn-primary">Replay</button>
         </div>
         <!-- Comment with nested comments -->
         <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
               <h5 class="mt-0">Commenter Name</h5>
               Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
               <div class="media mt-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                     <h5 class="mt-0">Commenter Name</h5>
                     Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
               </div>
               <div class="media mt-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                     <h5 class="mt-0">Commenter Name</h5>
                     Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
         <!-- Search Widget -->
         <div class="card my-4">
            <h5 class="card-header" id="show_date"  >Search</h5>
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
            <h5 class="card-header"  >Side Widget</h5>
            <div class="card-body">
               You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
         </div>
      </div>
   </div>
   <!-- /.row -->
</div>
<!-- /.container -->
<!-- Footer -->
<footer class="py-5 bg-dark">
   <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
   </div>
   <!-- /.container -->
</footer>
<script>
$(document).ready(function() {
    listAnswer();
    $("#submitComment").click(function(event) {
        event.preventDefault();
        $("#comment-message").css('display', 'none');
        var formData = $("#form_comment").serialize();
        var content = $('#content').val();
        if (content.length > 0) {
            $.ajax({
                url: "http://localhost/stack/questionController/storeAnswer",
                data: formData,
                type: 'post',
                success: function(response) {
                    var result = eval('(' + response + ')');
                    if (response) {
                        $("#comment-message").css('display', 'inline-block');
                        $("#content").val("");
                        listAnswer();
                    } else {
                        alert("Failed to add answer !");
                        return false;
                    }
                }
            });
        }


    });

    $.ajax({
        url: 'http://localhost/stack/questionController/showDate',
        data: '',
        dataType: 'text',
        success: function(strDate) {
            $('#show_date').text(strDate)
            console.log(strDate)
        }
    })

    function listAnswer() {
        $.post("http://localhost/stack/questionController/getAnswers/3",
            function(data) {
                var data = JSON.parse(data);

                var comments = "";
                var name = "";
                var replies = "";
                var item = "";
                //  var parent = -1;
                var results = new Array();

                var list = $("<ul class='outer-comment'>");
                var item = $("<li>").html(comments);

                for (var i = 0;
                    (i < data.length); i++) {
                    var commentId = data[i]['id'];
                    parent = data[i]['question_id'];
                    user_id = data[i]['user_id'];

                    // if (parent == "0")
                    //  {
                    comments = "<div class='comment-row'>" +
                        "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>anonymous </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" +
                        "<div class='comment-text'>" + data[i]['content'] + "</div>" +
                        "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>" +
                        "</div>";

                    var item = $("<li>").html(comments);
                    list.append(item);
                    //  var reply_list = $('<ul>');
                    //  item.append(reply_list);
                    // listReplies(commentId, data, reply_list);
                    //   }
                }
                $("#output").html(list);
            });
    }

})
</script>