<?php
if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/userstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Tv icon-->
    <link rel="shortcut icon" href="images/TV-Icon.png" />
</head>

<body>

    <main class="container">
        <div class="container">
            <div class="login-box">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 login-left">
                        <?php
                        if (isset($_GET['login_fail'])) {
                            echo $_SESSION['login_fail'];
                        }
                        ?>
                        <h2>Admin Login</h2>
                        <form action="validation.php" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="user" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-md btn-outline-default" name="signin">Login</button>

                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>