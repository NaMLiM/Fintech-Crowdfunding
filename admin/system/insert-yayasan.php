<?php

include("koneksi.php");
session_start();

//Get Data
$nama_yayasan = $_POST["nama_yayasan"];
$alamat_yayasan = $_POST["alamat_yayasan"];
$pengasuh = $_POST["pengasuh"];
$kondisi = $_POST["kondisi"];
$no_wa = $_POST["no_wa"];
$no_rek = $_POST["no_rek"];
$nama_rek = $_POST["nama_rek"];

$id = uniqid();
mkdir("../upload/" . $id);

if (isset($_FILES["gambar"]) || isset($_POST["jumlah_gambar"])) {
    if (isset($_FILES["gambar"])) {
        mkdir("../upload/" . $id . "/gambar");
        $target = "1." . strtolower(pathinfo(basename($_FILES["gambar"]["name"]), PATHINFO_EXTENSION));
        $target_dir = "../upload/" . $id . "/gambar/";
        $target_file = $target_dir . $target;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = $id . "-1" . "." . $imageFileType;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        mkdir("../upload/" . $id . "/gambar");
        $gambar = $id;
        for ($i = 1; $i <= (int)$_POST["jumlah_gambar"]; $i++) {
            $target = $i . "." . strtolower(pathinfo(basename($_FILES["gambar" . $i]["name"]), PATHINFO_EXTENSION));
            $target_dir = "../upload/" . $id . "/gambar/";
            $target_file = $target_dir . $target;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (move_uploaded_file($_FILES["gambar" . $i]["tmp_name"], $target_file)) {
                $gambar = $gambar . "-" . $i . "." . $imageFileType;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
} else {
    $gambar = null;
}

$insert = mysqli_query($conn, "insert into yayasan values (null, '$nama_yayasan', '$gambar', '$alamat_yayasan', '$pengasuh', '$kondisi', '$no_wa', '$no_rek', '$nama_rek')");

if ($insert) {
?>
    <script>
        alert("Data Berhasil Ditambahkan");
        document.location = "../dashboard.php";
    </script>
<?php
} else {
    echo $id;
}

?>