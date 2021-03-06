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
    <link rel="stylesheet" type="text/css" href="/<?= CONFIG['site_path']; ?>/app/views/assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="/<?= CONFIG['site_path']; ?>/app/views/assets/css/main.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="/<?= CONFIG['site_path']; ?>/dice/play">
            <img src="favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Dice Game
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item <?php echo(isset($home_page) ? 'active' : ''); ?>">
                <a class="nav-link" href="/<?= CONFIG['site_path']; ?>/dice/play">Home</a>
            </li>
            <li class="nav-item <?php echo(isset($stats_page) ? 'active' : ''); ?>">
                <a class="nav-link" href="/<?= CONFIG['site_path']; ?>/stats/top">Stats</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <p class="text-success nav-link mb-0 font-weight-bold">Welcome, <span id="username">
                <?php echo strtoupper($_SESSION['username']); ?></span>
            </p>
            <a class="btn btn-outline-success my-2 my-sm-0" href="/<?= CONFIG['site_path']; ?>/auth/logout">Logout</a>
        </form>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div id="dice1" class="dice"></div>
        </div>
        <div class="col d-flex justify-content-center">
            <div id="dice2" class="dice"></div>
        </div>
        <div class="col d-flex justify-content-center">
            <div id="dice3" class="dice"></div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col my-5 d-flex justify-content-center">
            <h2 class="p-3 bg-white">Winings: <span id="winings"></span></h2>
        </div>
        <div class="col my-5 d-flex justify-content-center">
            <h2 class="p-3 bg-white">Roll: <span id="rollNumber"></span></h2>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <input type="button" class="btn btn-info btn-lg mx-3" id="new_game" name="new_game" value="New game">
            <input type="button" class="btn btn-primary btn-lg mx-3" id="roll_dice" name="roll_dice" value="Roll">
        </div>
    </div>
    <div class="row">
        <div class="col my-5 d-flex justify-content-center">
            <h1 id="gameresult"></h1>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="/<?= CONFIG['site_path']; ?>/app/views/assets/js/script.js"></script>
</body>
</html>