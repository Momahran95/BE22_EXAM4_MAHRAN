<?php
require_once('connection.php');
require_once('file_upload.php');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author_first_name = $_POST['author_first_name'];
    $author_last_name = $_POST['author_last_name'];
    $photo = fileUpload($_FILES['photo']);
    $description = $_POST['description'];
    $type = $_POST['type'];
    $publisher_name = $_POST['publisher_name'];
    $publisher_address = $_POST['publisher_address'];
    $publish_date = $_POST['publish_date'];
    $status = $_POST['status'];

    // $photo = $_POST['photo'];

    $sql = "INSERT INTO `libraryrecords`( `title`, `description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `photo`, `status`) VALUES ('{$title}','{$description}','{$type}','{$author_first_name}','{$author_last_name}','{$publisher_name}','{$publisher_address}','{$publish_date}','{$photo[0]}','{$status}')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div class='alert alert-success alert-dismissible fade show mx-auto' role='alert'>
  <strong>Success! Your product has been crafted and added to our collection. You'll be whisked back to the home page shortly. Sit tight, and get ready to explore more!</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  {$photo[1]}
</div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show mx-auto' role='alert'>
  <strong>Oops! Something went wrong, and your product couldn't be created this time. Please try again, or reach out for assistance. You'll be redirected to the home page in a few seconds.</strong> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
    header("refresh: 4; url = index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/create.css">
    <title>Dashboard</title>
</head>

<body>
    <!-- Navbar started -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">Narrative Nexus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="create.php">Add a book</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="post" action="search.php">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search by Title/Author" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar ended -->


    <div class="container">
        <h1>Add a Book....</h1>
        <div class="mx-auto">
            <form method="post" enctype="multipart/form-data">
                <input type="text" placeholder="Title" class="form-control mt-3" name="title">
                <input type="text" placeholder="Author's First Name" class="form-control mt-3" name="author_first_name">
                <input type="text" placeholder="Author's Last Name" class="form-control mt-3" name="author_last_name">
                <input type="text" placeholder="Description" class="form-control mt-3" name="description">
                <select name="type" class="form-control mt-3">
                    <option value="" disabled selected>Book's Type</option>
                    <option value="BOOK">BOOK</option>
                    <option value="CD">CD</option>
                    <option value="DVD">DVD</option>
                </select>
                <input type="text" placeholder="Publisher's Name" class="form-control mt-3" name="publisher_name">
                <input type="text" placeholder="Publisher's Address" class="form-control mt-3" name="publisher_address">
                <input type="date" placeholder="Publish Date" class="form-control mt-3" name="publish_date">
                <select name="status" class="form-control mt-3">
                    <option value="" disabled selected>Book' Status</option>
                    <option value="available">available</option>
                    <option value="reserved">reserved</option>
                </select>
                <input type="file" placeholder="Book's Cover" class="form-control mt-3" name="photo">
                <input type="submit" class="btn btn-secondary mt-3" name="submit" value="Add Book">
            </form>
        </div>
    </div>





    <!-- FOOTER STARTED -->
    <footer class="footer">
        <div class="social">
            <ul class="footerlist">
                <li>
                    <a href="https://www.facebook.com/" class="fa fa-facebook" target="_blank"></a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/" class="fa fa-linkedin" target="_blank"></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/" class="fa fa-youtube" target="_blank"></a>
                </li>
                <li>
                    <a href="https://github.com/" class="fa-brands fa-github" target="_blank"></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" class="fa-brands fa-instagram" target="_blank"></a>
                </li>
            </ul>
        </div>
        <br />
        <div class="copyright">
            <p>&copy;Code Factory 2024</p>
        </div>
    </footer>
    <!-- footer ended -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/407c991e1f.js" crossorigin="anonymous"></script>
</body>

</html>