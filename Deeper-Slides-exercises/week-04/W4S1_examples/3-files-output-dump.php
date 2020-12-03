<!--
  Add the following PHP block to the top of the
  file from the previous Code Along exercise
-->
<?php
  if (!empty($_POST)) {
    echo '$_POST';
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
  }

  if (!empty($_FILES)) {
    echo '$_FILES';
    echo '<pre>';
    var_dump($_FILES);
    echo '</pre>';
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"
      integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX"
      crossorigin="anonymous"
    >
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="container">

    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="usernane">Username</label>
        <input type="text" name="username" id="username" class="form-control">
      </div>

      <div class="form-group">
        <label for="my-file-input">Profile Picture</label>
        <input type="file" name="profilePicture" id="my-file-input" class="form-control-file">
      </div>

      <button type="submit" class="btn btn-success">Update Profile</button>
    </form>

  </body>
</html>
