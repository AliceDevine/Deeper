<?php
  if (!empty($_FILES['profilePicture'])) {
    $file = $_FILES['profilePicture'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
      // Handle an error
    }

    // Validate the mime type and file size as appropriate here...

    // For this example we will use the provided filename but you need to ensure;
    //     1) The filename is unique, otherwise it will overwrite an existing file
    //     2) The filename is save to use
    // It is often a good idea to just generate a new unique filename and store the original
    // filename in the database (which we can cover in a future session)

    $targetPath = 'uploads/' . time() . '_' . $file['name'];
    if (!move_uploaded_file(
      $file['tmp_name'],
      $targetPath
    )) {
      throw new RuntimeException('Failed to move the file');
    }
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
