<!doctype html>
<?php
include_once("admin/system/koneksi.php");
if (!isset($_GET['page'])) {
    $_GET['page'] = 'beranda';
    $page = $_GET['page'];
} else {
    $page = $_GET['page'];
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crowdfunding</title>
    <!-- Scripts -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        a{
	
	text-decoration: none;
	font-size: 1.5rem;
	margin: 20px;
	padding: 15px, 30px;
	
	position: relative;
	transition: all .4s;
}

a:hover{
	box-shadow: 0 20px 30px rgba(0, 0, 0, 0.24);
    color :white;
}
body{
    background-image: url('src/img/bg.jpg');
    background-repeat: no-repeat;
    background-size: 100%;
}
a::before{
	content: '';
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 0%;
	background:  linear-gradient(to top, #0159ab, #3c1053);
	z-index: -1;
	transition: all .4s;
}
.navbar-nav a, .navbar-nav a:hover, .container-fluid a:hover,.container-fluid a{
    color: white;
}
:hover::before{
	height: 50%;
}
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md " style="background-color: rgba(151, 91, 0, 0.678);">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?page=beranda">
                    <div class="container">
                        <img src="src/img/logo.png" width="50px" style="transform: rotateY(180deg);">
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