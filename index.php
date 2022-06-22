<!doctype html>
<?php
if (!isset($_GET['page'])) {
    $_GET['page'] = 'beranda';
    $page = $_GET['page'];
} else {
    $page = $_GET['page'];
}
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Crowdfunding</title>

    <!-- Scripts -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md " style="background-color: rgba(151, 91, 0, 0.678);">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?page=beranda">
                    <div class="container">
                        <img src="src/img/logo.png" width="60px">
                        Crowdfunding
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <div class="container">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=beranda">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=crowdfunding">Crowdfunding</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=donate">Donate</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <main class="py-4">
        <?php
        include_once($page . '.php');
        ?>
    </main>
    </div>
    <footer class="bg-black fixed-bottom">
        <p style="color: white; text-align: center">Powered by Kelompok 3 Financial Technology - Sistem Informasi Universitas Trunojoyo Madura</p>
    </footer>
</body>

</html>