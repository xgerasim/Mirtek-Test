<?php
$connection = mysqli_connect('localhost', 'root', '', 'post');

$posts = mysqli_query($connection, "SELECT * FROM `post`");
$posts = mysqli_fetch_all($posts);


foreach ($posts as $post) {?>
	<div class="col-md-4">
        <div class="card mt-3 p-3">
        <div class="date"><?php echo $post[3];?></div>
        <h2><?php echo $post[1];?></h2>
        <content><?php echo $post[2];?></content>
      </div>
      </div>
<?php }; 

mysqli_close($connection);