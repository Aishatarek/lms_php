<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div>
            <p>Have any question?</p>
            <p>(00) 123 456 789</p>
            <p>hello@eduma.com </p>
        </div>
        <div>
            <a href="../../profile.php">
                <?php echo $_SESSION['username'] ?? ''; ?>
            </a>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo ' <a  href="../../logout.php">Logout</a>';
            } else {
                echo '
              <a  href="signin.php">Sign in</a>
              <a href="register.php">Register</a>
             ';
            }
            ?>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light  ">
        <a class="navbar-brand" href="Home.php"><i class="fa-solid fa-graduation-cap"></i>MagCamp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto d-flex justify-content-end w-100">
                <li class="nav-item">
                    <a class="nav-link" href="../../Home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../displayCourses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../displayArticles.php">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../AskQuestion.php">Ask Question</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../aboutUs.php">About Us</a>
                </li>
                <li class="nav-item navIcon">
                    <a class="nav-link" href="../../contactUs.php">Contact Us</a>
                </li>
                <?php
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'admin') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../dashboard.php">Dashboard</a>
                        </li>
                <?php  }
                }
                ?>
                <li class="nav-item navIcon">
                    <a class="nav-link" href="../../displayCart.php">
                        <i class="fa-brands fa-opencart"></i>
                        <span>
                            <?php
                            echo  count($Cart->getData('cart'))
                            ?>
                        </span>
                    </a>
                </li>
                <li class="nav-item navIcon">
                    <a class="nav-link" href="../../displayWishlist.php">
                        <i class="fa-solid fa-heart"></i>
                        <span>
                            <?php
                            echo count($Cart->getData('wishlist'))
                            ?>
                        </span>
                    </a>
                </li>
            </ul>

        </div>
    </nav>