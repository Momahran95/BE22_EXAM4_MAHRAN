<?php
function fileUpload($photo)
{
    if ($photo['error'] == 4) {
        $photoName = "book.jpg";
        $message = "<div class='alert alert-warning alert-dismissible fade show mx-auto' role='alert'>
  <strong>Whoops! It seems no photo was chosen. No worries—you can always upload a captivating image later to complete your masterpiece!</strong> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    } else {
        $checkIfImage = getimagesize($photo['tmp_name']);
        $message = $checkIfImage ? "Ok" : "Not an Image";
    }
    if ($message == "Ok") {
        $ext = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
        $photoName = uniqid("") . "." . $ext;
        $destination = "photos/{$photoName}";
        move_uploaded_file($photo['tmp_name'], $destination);
    }
    return [$photoName, $message];
};
