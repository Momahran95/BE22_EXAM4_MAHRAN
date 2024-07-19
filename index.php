<?php
require_once('connection.php');

$sql = "SELECT * FROM `libraryrecords`";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$layout = "";
$layout_section = "";
$projected_sections = [];
if (mysqli_num_rows($result) == 0) {
    $layout .= "<div class='alert alert-danger alert-dismissible fade show mx-auto' role='alert'>
  <strong>Uh-oh! It looks like our search elves couldn't find any results for your query.</strong> Double-check your spelling or try different keywords, and we'll keep searching the enchanted archives for you!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
} else {
    foreach ($rows as $key => $value) {
        $layout .= "<div>
        <div id='list-th'>
      <div class='book read'>
        <div class='cover'>
          <img src='photos/{$value['photo']}' height='280'>
        </div>
        <div class='description'>
          <p class='title'><a style='text-decoration:none;' href='details.php?id={$value['ISBN']}'>{$value['title']}</a><br>
            <span class='author'>Author: {$value['author_first_name']} {$value['author_last_name']}</span></p>
        </div>
      </div>
      </div>
                    </div>";

        if (!in_array($value['publisher_name'], $projected_sections)) {
            $layout_section .= "<div>
            <a class='text-light beautiful-button d-flex justify-content-around my-3' style='text-decoration:none;' href='publisher.php?publisher={$value['publisher_name']}'><span>{$value['publisher_name']}</span></a>
        </div>";
            $projected_sections[] = $value['publisher_name'];
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Home Page</title>
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
        <br>
        <div id="heads">
            <h2 class="fs-5 mx-5">You can explore additional books by the same publisher or apply various filters to refine your search for a more tailored selection:</h2>
        </div>
        <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-xs-1">
            <?= $layout_section ?>

        </div>

        <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-xs-1">

            <?= $layout ?>
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