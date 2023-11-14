<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roman Gerasimenko Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="container mt-5">
    <h1>Тестовое №1</h1>

    <form id="myForm" action="action.php">
      <div class="mt-3">
        <input type="text" id="title" class="form-control" placeholder="Заголовок">
      </div>
      
      <div class="mt-3">
        <textarea id="content" class="form-control" placeholder="Содержание"></textarea>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-primary">Отправить</button>
      </div>
      
    </form>

    <div id="articles" class="row">
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

    mysqli_close($connection);?>
    </div>

    <script>

    document.getElementById("myForm").addEventListener("submit", function(event) {
      event.preventDefault();
      var title = document.getElementById("title").value;
      var content = document.getElementById("content").value;
      
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "action.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // обновляем список статей
          updatearticles();
        }
      };
      xhr.send("title=" + title + "&content=" + content);
    });

    function updatearticles() {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "articles.php", true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // обновляем список статей без перезагрузки страницы
          document.getElementById("articles").innerHTML = xhr.responseText;
        }
      };
      xhr.send();
    }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

