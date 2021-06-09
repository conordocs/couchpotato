<?php

include("connections/db.php");

//build a SQL quuery to run on MySQL
$read = "SELECT * FROM tv_shows WHERE netflix=1 AND winner=1";
// runnig query
$result = $conn->query($read);
//check there are NO errors in SQL sytnax
if (!$result) {
    echo $conn->error;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Couch Potato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
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
        <div class="container">
            <br>
            <div class="row">
                <div class="column">
                    <h2>Golden Globe Winners</h2>
                </div>
            </div>
            <br>
            <center>
                <div class="row">
                    <div class="col">
                        <a href='awards.php'><button class='btn btn-md btn-outline-default active'>Netflix</button></a>
                        <a href='hulu_awards.php'><button class='btn btn-md btn-outline-default'>hulu</button></a>
                        <a href='prime_awards.php'><button class='btn btn-md btn-outline-default'>Prime</button></a>
                        <a href='disney_awards.php'><button class='btn btn-md btn-outline-default'>Disney+</button></a>
                    </div>
                </div>
            </center>
            <br>

            <table>
                <thead>
                    <tr>
                        <th width=1500>Name</th>
                        <th width=600 class='text-center'>Year</th>
                        <th width=300 class='text-center'>Winner</th>
                    </tr>
                </thead>
                <?php
                //create associate array from above SQL query
                //loop through the array storing a column value
                //print the value into a <li> element

                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['title'];
                    $yr = $row["year"];
                    $win = $row["winner"];

                    if ($win == '1') {
                        $win = "<img height='30px' src='https://www.flaticon.com/svg/static/icons/svg/206/206982.svg'>";
                    }

                    echo "<tbody>
						<tr>
							<td width=1500><a class='award-link' href='show.php?show_id=$id'>$name</a></td>
							<td width=600 class='text-center'>$yr</td>
							<td width=300 class='text-center'>$win</td>
						</tr>
					</tbody>";
                }

                ?>
            </table>
            <br>
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

</body>

</html>