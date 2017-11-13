<?php
$guest = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title><?= $data['title']; ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/<?= CONFIG['site_path']; ?>/app/views/assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../app/views/assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="../app/views/assets/css/main.css">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="../dice/play">
            <img src="/<?= CONFIG['site_path']; ?>/app/views/assets/img/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Dice Game
        </a>
        <?php if (!isset($guest)) { ?>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item <?php echo(isset($home_page) ? 'active' : ''); ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item <?php echo(isset($stats_page) ? 'active' : ''); ?>">
                    <a class="nav-link" href="stats.php">Stats</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <p class="text-success nav-link mb-0 font-weight-bold">Welcome,
                    <span id="username">
                        <?php echo strtoupper($_SESSION['username']); ?></span>
                </p>
                <a class="btn btn-outline-success my-2 my-sm-0" href="logout">Logout</a>
            </form>
        <?php } ?>
    </div>
</nav>

<div class="container">
    <form class="form-signin" method="POST" action="/<?= CONFIG['site_path']; ?>/auth/reg">
        <?php if (isset($data['messages'][0])) { ?>
            <div class="alert alert-danger my-5" role="alert">
                <?= $data['messages'][0]['body']; ?>
            </div>
        <?php } ?>

        <h2 class="form-signin-heading">Please register</h2>

        <label for="name" class="sr-only">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" autofocus="">

        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" autofocus="">

        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="Password">

        <label for="repeatPassword" class="sr-only">Repeat password</label>
        <input type="password" id="repeatPassword" class="form-control" name="repeatPassword"
               placeholder="Repeat a password">

        <input type="submit" name="register" value="Register" class="btn btn-lg btn-success btn-block">
        <!-- <a class="btn btn-lg btn-primary btn-block" href="./loginform">Back to login</a> -->
        <a class="btn btn-lg btn-primary btn-block" href="/<?= CONFIG['site_path']; ?>/auth/loginform">Back to login</a>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>