<?php
require_once("connection.php");
$sql = "SELECT * FROM `libraryrecords` WHERE `ISBN` = {$_GET['id']}";

$result = mysqli_query($conn, $sql);

$value = mysqli_fetch_assoc($result);
if ($value['status'] == "available") {
    $layout_details = "
<section class='CardContenido'>
    <section class='Info'>
        <section class='Title'>
            <header>
<strong>{$value['title']}</strong>
            </header>
            <article>
                @{$value['author_last_name']}
            </article>
        </section>
          <hr class='hrs' />
        <section class='Descripcion'>
            <p>
<strong>{$value['description']}</strong>
            </p>
            <p>Publisher Name:
<strong>{$value['publisher_name']}</strong>
            </p>
            <p>Status:
<strong style='color: lightgreen;'>{$value['status']}</strong>
            </p>
        </section>
    </section>
    <section class='Web'>
        <div class='Links'>
            <span>ISBN : <b>{$value['ISBN']}</b></span>
        </div>
        <img 
             class='WebInfo'           src='photos/{$value['photo']}' >
               
             </img>
    </section>
</section>
";
} else {
    $layout_details = "
    <section class='CardContenido'>
        <section class='Info'>
            <section class='Title'>
                <header>
    <strong>{$value['title']}</strong>
                </header>
                <article>
                    @{$value['author_last_name']}
                </article>
            </section>
              <hr class='hrs' />
            <section class='Descripcion'>
                <p>
    <strong>{$value['description']}</strong>
                </p>
                <p>Publisher Name:
    <strong>{$value['publisher_name']}</strong>
                </p>
                <p>Status:
    <strong style='color: red;'>{$value['status']}</strong>
                </p>
            </section>
        </section>
        <section class='Web'>
            <div class='Links'>
                <span>ISBN : <b>{$value['ISBN']}</b></span>
            </div>
            <img 
                 class='WebInfo'           src='photos/{$value['photo']}' >
                   
                 </img>
        </section>
    </section>
    ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/details.css">
    <title>Details Page</title>
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
        <br>
        <?= $layout_details ?>
        <br>
        <button class="btn btn-secondary mx-3"><a class='text-light' style='text-decoration:none;' href="index.php">Back to the main page</a></button>


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