<?php

include("../system/koneksi.php");

$id = $_POST["id"];

$select = mysqli_query($conn, "select * from yayasan where id_yayasan=$id");

while ($data = mysqli_fetch_array($select)) {
    $nama_yayasan = $data["nama_yayasan"];
    $alamat = $data["alamat_yayasan"];
    $pengasuh = $data["pengasuh_yayasan"];
    $kondisi = $data["kondisi_yayasan"];
    $no_wa = $data["no_whatsapp"];
    $no_rek = $data["no_rekening"];
    $nama_rek = $data["nama_rekening"];
    $gambar = $data["gambar"];
}

?>
<label>ID</label>
<input type="text" name="id_yayasan" class="form-control ml-auto" value="<?php echo $id ?>" readonly required>
<label>Nama Yayasan</label>
<input type="text" name="nama_yayasan" placeholder="Nama Yayasan" class="form-control ml-auto" value="<?php echo $nama_yayasan ?>" required>
<label>Alamat Yayasan</label>
<input type="text" name="alamat" class="form-control ml-auto" value="<?php echo $alamat ?>" required>
<label>Nama Pengasuh</label>
<input type="text" name="pengasuh" class="form-control ml-auto" value="<?php echo $pengasuh ?>" required>
<label>Kondisi</label>
<div id='toolbar-container-edit'>
</div>
<div id='editor-kondisi-ajax-edit' class='border-gray'>
    <?php echo $kondisi ?>
</div>
<textarea name="kondisi" id="kondisi-ajax-edit" style="display: none;"><?php echo $kondisi ?></textarea>
<script>
    DecoupledEditor
        .create(document.querySelector('#editor-kondisi-ajax-edit'))
        .then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container-edit');

            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });

    $("#editor-kondisi-ajax-edit").click(function(e) {
        e.preventDefault();
        $("#kondisi-ajax-edit").val($("#editor-kondisi-ajax-edit").html());
        $(this).keyup(function() {
            $("#kondisi-ajax-edit").val($("#editor-kondisi-ajax-edit").html());
        });
    });
</script>
<label>No Whatsapp</label>
<input type="text" name="no_wa" class="form-control ml-auto" value="<?php echo $no_wa ?>" required>
<label>No Rekening</label>
<input type="text" name="no_rek" class="form-control ml-auto" value="<?php echo $no_rek ?>" required>
<label>Nama Rekening</label>
<input type="text" name="nama_rek" class="form-control ml-auto" value="<?php echo $nama_rek ?>" required>
<div class='row' id='gambar-form-multi'>
    <div class='col-md-4'>
        <label for='gambar-multi'>Gambar</label>
        <div id='gambar-grup'>
            <input type='file' name='gambar1' id='gambar-multi' class='form-control-file ml-auto'>
        </div>
    </div>
    <div class='col-md-8'>
        <button type='button' class='btn btn-primary' id='tambah-image' onclick='tambah_image()'><i class='fas fa-plus'></i></button>
    </div>
</div>
<input type='hidden' name='jumlah_gambar' id='jumlah_gambar' value=1>