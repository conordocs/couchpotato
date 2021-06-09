<?php
// session start
if (!isset($_SESSION)) {
    session_start();
}
include("connections/db.php");

$showid = htmlentities($_GET['show_id']);
$showquery = "SELECT * FROM tv_shows WHERE id = $showid";
$showresult = $conn->query($showquery);
while ($row = $showresult->fetch_assoc()) {
    $showid = $row['id'];
    $showtitle = $row['title'];
    $showyear = $row['year'];
    $showage = $row['age'];
    $showIMDb = $row['IMDb'];
    $showrottentomatoes = $row['rotten_tomatoes'];
    $shownetflix = $row['netflix'];
    $showhulu = $row['hulu'];
    $showprimevideo = $row['prime_video'];
    $showdisney = $row['disney'];
    $showwinner = $row['winner'];
}

// rating
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$POSTI = filter_var_array($_POST, FILTER_SANITIZE_NUMBER_INT);

if (isset($POST['starRate'])) {
    $starRate = mysqli_real_escape_string($conn, $POSTI['starRate']);
    $rateMsg = mysqli_real_escape_string($conn, $POST['rateMsg']);
    $date = mysqli_real_escape_string($conn, $POST['date']);
    $userName = mysqli_real_escape_string($conn, $POST['name']);
    $userEmail = mysqli_real_escape_string($conn, $POST['email']);


    $sql = $conn->prepare("SELECT * FROM tv_rating WHERE email=?");
    $sql->bind_param("s", $userEmail);
    $sql->execute();
    $res = $sql->get_result();
    $rst = $res->fetch_assoc();
    $val = $rst["userEmail"];

    $stmt = $conn->prepare("INSERT INTO tv_rating (username, email, review, message, date, show_id) VALUES (?,?,?,?,?,?) ");
    $stmt->bind_param("ssssss", $userName, $userEmail, $starRate, $rateMsg, $date, $showid);
    $stmt->execute();
    echo "Thanks for your review!";
}
// review post finished

$myTime = getdate(date("U"));
$date = "$myTime[weekday], $myTime[month] $myTime[mday], $myTime[year]";

$ratingQ = "SELECT id FROM tv_rating WHERE show_id = $showid";
$ratingR = $conn->query($ratingQ);
$rating_num_rows = $ratingR->num_rows;

$ratingSQL = $conn->query("SELECT SUM(review) AS total FROM tv_rating WHERE show_id = $showid");
$ratingData = $ratingSQL->fetch_array();
$totalRating = $ratingData["total"];

$averageRating = '';

if ($rating_num_rows != 0) {
    if (is_nan(round(($totalRating / $rating_num_rows), 1))) {
        $averageRating = 0;
    } else {
        $averageRating = round(($totalRating / $rating_num_rows), 1);
    }
} else {
    $averageRating = 0;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Couch Potato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/rating.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Tv icon-->
    <link rel="shortcut icon" href="images/TV-Icon.png" />
</head>



<body>
    <header>
        <?php
        include 'nav&foot/navbar.php';
        ?>
    </header>

    <main class="container container1">
        <br>
        <div class="container">
            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
                <div class="row">
                    <div class="col-6">
                        <?php
                        echo "<h1 class='display-5'>$showtitle</h1>";
                        echo "<br>";
                        echo "<p> <b>Year:</b> $showyear</p>";
                        echo "<p> <b>Suitable for:</b> $showage</p>";
                        echo "<p> <b>IMDb rating:</b> $showIMDb</p>";
                        echo "<p> <b>Rotten Tomatoes rating:</b> $showrottentomatoes</p>";
                        if ($showdisney == 1) {
                            echo "<p><b>Available on Disney+:</b> Yes</p>";
                        } else {
                            echo "<p><b>Available on Disney+:</b> No</p>";
                        }
                        if ($showhulu == 1) {
                            echo "<p><b>Available on Hulu:</b> Yes</p>";
                        } else {
                            echo "<p><b>Available on Hulu:</b> No</p>";
                        }
                        if ($shownetflix == 1) {
                            echo "<p><b>Available on Netflix:</b> Yes</p>";
                        } else {
                            echo "<p><b>Available on Netflix:</b> No</p>";
                        }
                        if ($showprimevideo == 1) {
                            echo "<p><b>Available on Prime:</b> Yes</p>";
                        } else {
                            echo "<p><b>Available on Prime:</b> No</p>";
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo "<div class='col-6'>
                            <h1 class='display-5'><a href='add_watchlist.php?show_id=$showid' class='btn btn-md btn-outline-default'>Add to Watchlist</a></h1>
                        </div>";
                    } else {
                        echo "";
                    }
                    ?>

                </div>
            </div>
        </div>

        <!-- Rating System -->

        <div class="container">
            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
                <?php
                echo "<h1 class='display-5'>Reviews</h1>";
                ?>
            </div>
            <div class="rating-review">
                <div class="tri table-flex">
                    <div class="row">
                        <tr>
                            <div class="col-md-6 mb-3" align="center">
                                <td>
                                    <!-- printing average rating which automatically updates when review is posted -->
                                    <div class="rnb rvl">
                                        <h3><?= $averageRating; ?>/5</h3>
                                    </div>
                                    <div class="pdt-rate">
                                        <div class="pro-rating">
                                            <div class="clearfix rating mart8">
                                                <!-- filling in the stars with the average rating -->
                                                <div class="rating-stars">
                                                    <div class="grey-stars"></div>
                                                    <div class="filled-stars" style="width: <?php echo $averageRating * 20 ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rnrn">
                                        <!-- echoing the number of reviews for this tool -->
                                        <p class="rars">
                                            <?php if ($rating_num_rows == 0) {
                                                echo "No";
                                            } else {
                                                echo $rating_num_rows;
                                            } ?> Reviews
                                        </p>
                                    </div>
                                </td>
                            </div>
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo "<div class='col-md-6 mb-3' align='center'>
                                    <td>
                                        <div class='rrb'>
                                            <br>
                                            <p>Please Review This Product</p>
                                            <button class='rbtn opmd'>Add Review</button>
                                        </div>
                                    </td>
                                </div>";
                            } else {
                                echo "<div class='col-md-6 mb-3' align='center'>
                                    <td>
                                        <div class='rrb'>
                                            <br>
                                            <p>Please Login to Review</p>
                                            <a href='user/login.php'><button class='rbtn opmd'>Login</button></a>
                                        </div>
                                    </td>
                                </div>";
                            }
                            ?>
                        </tr>
                    </div>
                    <div class="review-modal" style="display: none;">
                        <div class="review-bg"></div>
                        <div class="rmp">
                            <div class="rpc">
                                <span><i class="fas fa-times"></i></span>
                            </div>
                            <!-- star rating -->
                            <div class="rps" align="center">
                                <i class="fa fa-star" data-index="0" style="display:none"></i>
                                <i class="fa fa-star" data-index="1"></i>
                                <i class="fa fa-star" data-index="2"></i>
                                <i class="fa fa-star" data-index="3"></i>
                                <i class="fa fa-star" data-index="4"></i>
                                <i class="fa fa-star" data-index="5"></i>
                            </div>
                            <input type="hidden" value="" class="starRateV">
                            <input type="hidden" value="<?php echo $date; ?>" class="rateDate">
                            <!-- name -->
                            <div class="rptf" align="center">
                                <input type="text" class="raterName" placeholder="Enter your name: *">
                            </div>
                            <!-- email -->
                            <div class="rptf" align="center">
                                <input type="email" class="raterEmail" placeholder="Enter your email: *">
                            </div>
                            <!-- review -->
                            <div class="rptf" align="center">
                                <textarea class="rateMsg" id="rate-field" placeholder="What did you like or dislike about this TV Show? *"></textarea>
                            </div>
                            <div class="rate-error" align="center"></div>
                            <!-- post review -->
                            <div class="rpsb" align="center">
                                <button class="rpbtn">Post Review</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- printing reviews -->
                <div class="bri">
                    <div class="uscm">
                        <?php
                        // selecting all reviews for specific show
                        $sqlQ = "SELECT * FROM tv_rating WHERE show_id = $showid";
                        $sqlR = $conn->query($sqlQ);
                        if (mysqli_num_rows($sqlR) > 0) {
                            // using while loop to print all
                            while ($row1 = $sqlR->fetch_assoc()) {
                                $id = $row1['id'];
                                $userName = $row1['username'];
                                $userMessage = $row1['message'];
                                $userReview = $row1['review'];
                                $dateReview = $row1['date'];
                        ?>
                                <div class="uscm-secs">
                                    <div class="us-img" id="us-img">
                                        <!-- printing initial of first name just like you see on google reviews -->
                                        <p><?= substr($userName, 0, 1); ?></p>
                                    </div>
                                    <div class="uscms">
                                        <div class="us-rate">
                                            <div class="pdt-rate">
                                                <div class="pro-rating">
                                                    <div class="clearfix rating mart8">
                                                        <div class="rating-stars">
                                                            <div class="grey-stars"></div>
                                                            <!-- displaying users star rating -->
                                                            <div class="filled-stars" style="width:<?= $userReview * 20; ?>%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- displaying users review -->
                                        <div class="us-cmt">
                                            <p><?= $userMessage; ?></p>
                                        </div>
                                        <!-- displaying user name, and date reviewed -->
                                        <div class="us-nm">
                                            <p><i>By <span class="cdnm"><?= $userName; ?></span> on <span class="cmdt"><?= $dateReview; ?></span></i></p>
                                        </div>
                                    </div>

                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>





    </main>

    <?php
    include 'nav&foot/footer.php';
    ?>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="jquery/main.js"></script>

</body>

</html>