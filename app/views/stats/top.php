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
                <p class="text-success nav-link mb-0 font-weight-bold">Welcome, <span
                            id="username"><?php echo strtoupper($_SESSION['username']); ?></span></p>
                <a class="btn btn-outline-success my-2 my-sm-0" href="/<?= CONFIG['site_path']; ?>/auth/logout">Logout</a>
            </form>
    </div>
</nav>

<div class="container my-3">
    <div class="row">
        <div class="col">
            <h2>Top 10 Winings</h2>
            <canvas class="my-5" id="top10Chart"></canvas>
        </div>
        <div class="col">
            <h2>Your games</h2>
            <canvas class="my-5" id="myCharts"></canvas>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="/<?= CONFIG['site_path']; ?>/app/views/assets/js/stats.js"></script>
</body>
</html>