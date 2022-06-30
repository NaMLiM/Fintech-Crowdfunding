<?php

include("koneksi.php");
session_start();

function deleteDir($folder_path)
{
    if (!is_dir($folder_path)) {
        return false;
    }

    // List of name of files inside 
    // specified folder 
    $files = glob($folder_path . '/*');

    // Deleting all the files in the list 
    foreach ($files as $file) {

        if (is_file($file))

            unlink($file);
    }
    rmdir($folder_path);
}

$id_yayasan = $_GET["id"];
$nama_yayasan = $_POST["nama_yayasan"];
$alamat_yayasan = $_POST["alamat"];
$pengasuh = $_POST["pengasuh"];
$kondisi = $_POST["kondisi"];
$no_wa = $_POST["no_wa"];
$no_rek = $_POST["no_rek"];
$nama_rek = $_POST["nama_rek"];


$select = mysqli_query($conn, "select * from yayasan where id_yayasan=$id_yayasan");
$data = mysqli_fetch_array($select);

$id = explode("-", $data["gambar"])[0];

if (!isset($_FILES['gambar1']) || $_FILES['gambar1']['error'] == UPLOAD_ERR_NO_FILE) {
    $gambar = $data["gambar"];
} else {
    deleteDir("../upload/" . $id . "/gambar");
    if (is_dir("../upload/" . $id)) {
        mkdir("../upload/" . $id . "/gambar");
    } else {
        mkdir("../upload/" . $id);
        mkdir("../upload/" . $id . "/gambar");
    }
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

$update = mysqli_query($conn, "update yayasan set nama_yayasan='$nama_yayasan', alamat_yayasan='$alamat_yayasan', pengasuh_yayasan='$pengasuh', gambar='$gambar', kondisi_yayasan='$kondisi', no_whatsapp='$no_wa', no_rekening='$no_rek', nama_rekening='$nama_rek' where id_yayasan=$id_yayasan");

if ($update) {
?>
    <script>
        alert("Data Berhasil Diupdate");
        document.location = "../dashboard.php";
    </script>
<?php
} else {
    echo $id;
}

?>