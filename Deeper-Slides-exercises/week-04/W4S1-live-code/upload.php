<?php

if (!empty($_POST)) {
    echo '$_POST';
    var_dump($_POST);
}

if (!empty($_FILES)) {
    echo '$_FILES';
    var_dump($_FILES);

    if (!empty($_FILES['profilePicture'])) {
        $file = $_FILES['profilePicture'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            // Handle the error
        }

        // Validate the mime type & size
        // Unique - overwrite existing?
        // filename is safe
        // generate new filename (original name in Db)

        $targetPath = 'uploads/' . time() . '_' . $file['name'];
        if (!move_uploaded_file(
            $file['tmp_name'],
            $targetPath
        )) {
            throw new RuntimeException('Failed to move the file');
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>File Upload</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="file-input">Profile Picture</label>
        <input type="file" name="profilePicture" id="file-input" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-success">Update Profile</button>
</form>
</body>
</html
