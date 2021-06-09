<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user'])) {
    $userIsset = 'true';
} else {
    $userIsset = 'false';
}
?>

<nav class="my-navbar navbar navbar-expand-md navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Couch Potato</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link 
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "index.php") {
                        echo "active";
                    } else {
                        echo "";
                    }
                    ?>
                    " href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (basename($_SERVER['PHP_SELF']) == "awards.php" || basename($_SERVER['PHP_SELF']) == "hulu_awards.php" || basename($_SERVER['PHP_SELF']) == "prime_awards.php" || basename($_SERVER['PHP_SELF']) == "disney_awards.php") {
                        echo "active";
                    } else {
                        echo "";
                    }
                    ?>
                    " href="awards.php">Awards</a>
                </li>

                <?php
                if ($userIsset == 'false') {
                    echo "<li class='nav-item'><a class='nav-link' href='user/login.php'>Login</a></li>";
                } else {
                    echo "<li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown'>My Account</a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='watchlist.php'>WatchList</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='logout.php'>Log Out</a>
                    </div>
                    </li>";
                }

                ?>
                <form class="d-flex" action="search.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-md btn-outline-default1" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </ul>
        </div>
    </div>

</nav>