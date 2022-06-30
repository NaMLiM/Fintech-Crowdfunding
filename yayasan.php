<?php
$id_yayasan = $_GET['id'];
$select = mysqli_query($conn, "select * from yayasan where id_yayasan = '$id_yayasan'");
while ($data = mysqli_fetch_array($select)) {
    $nama_yayasan = $data["nama_yayasan"];
    $alamat_yayasan = $data["alamat_yayasan"];
    $pengasuh = $data["pengasuh_yayasan"];
    $kondisi = $data["kondisi_yayasan"];
    $no_wa = $data["no_whatsapp"];
    $no_rek = $data["no_rekening"];
    $nama_rek = $data["nama_rekening"];
    $gambar = $data["gambar"];
}
?>
<link rel="stylesheet" href="admin/css/template-2.css">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-5">
            <div class="product-img border border-secondary">
                <div id="gambar" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $gambars = explode("-", $gambar);
                        for ($i = 1; $i < count($gambars); $i++) {
                        ?>
                            <div class="carousel-item <?php if ($i == 1) {
                                                            echo 'active';
                                                        } ?>">
                                <img src="<?php echo "admin/upload/" . $gambars[0] . "/gambar/" . $gambars[$i] ?>" class="d-block w-100">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#gambar" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#gambar" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-dark">
            <div class="mb-5" style="font-size: 30px;">
                <h1 class="mb-4"><?php echo $nama_yayasan ?></h1>
                <?php echo $kondisi; ?><br><br>
                <h2>Alamat Yayasan</h2>
                <h3><?php echo $alamat_yayasan; ?></h3>
            </div>
            <div class="text-dark mt-5">
                <h3>Bantu Sekarang:</h3>
                <a href=""><?php echo $no_rek . " a.n. " . $nama_rek ?></a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>