<?php
include("system/koneksi.php");
session_start();

if (!$_SESSION["nama_admin"]) {
    header("location:login.php");
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard - <?php echo $_SESSION["nama_admin"]; ?></title>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-2 sidebar">
                <div class="user text-center">
                    <i class="fa fa-user-circle text-primary" aria-hidden="true"></i>
                    <div class="user-info text-center text-primary">
                        <p><?php echo $_SESSION["nama_admin"]; ?></p>
                        <a href="system/logout.php" class="btn btn-danger w-100">Logout</a>
                    </div>
                </div>
                <div class="page">
                    <div class="list-group w-100">
                        <a href="dashboard.php?page=produk" class="list-group-item rounded-0 active"><i class="fad fa-hand-holding-usd"></i> Yayasan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-10 content">
                <?php
                include_once("page/yayasan.php");
                ?>
            </div>
        </div>
    </div>



    <!-- Javascript Lib -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3e7c653e94.js" crossorigin="anonymous"></script>
    <script>
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
    <script src="js/yayasan.js"></script>
</body>

</html>