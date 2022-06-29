<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/decoupled-document/ckeditor.js"></script>

<div class="mt-4 w-100">
    <input type="search" placeholder="Search" id="search" name="search" class="search ml-auto float-right">
</div>

<div style="overflow-y: scroll; height: 80vh; width: 100%;" class="d-block">
    <table class="table" id="tabel">
        <thead class="sticky-top">
            <th style="background-color: #204a87ff; text-align: center;">ID</th>
            <th style="background-color: #204a87ff; text-align: center;">Nama Yayasan</th>
            <th style="background-color: #204a87ff; text-align: center;">Alamat Yayasan</th>
            <th style="background-color: #204a87ff; text-align: center;">Pengasuh</th>
            <th style="background-color: #204a87ff; text-align: center;">Kondisi</th>
            <th style="background-color: #204a87ff; text-align: center;">No WA</th>
            <th style="background-color: #204a87ff; text-align: center;">No Rek</th>
            <th style="background-color: #204a87ff; text-align: center;">Nama Rek</th>
            <th style="background-color: #204a87ff; text-align: center;">Gambar</th>
        </thead>
        <tbody id="tbody">
            <?php
            $select = mysqli_query($conn, "select * from yayasan");
            while ($data = mysqli_fetch_array($select)) {
                echo "
                        <tr data-toggle='modal' data-target='#modelId'>
                            <td class='text-center'>" . $data["id_yayasan"] . "</td>
                            <td class='text-center'>" . $data["nama_yayasan"] . "</td>
                            <td class='text-center'>" . $data["alamat_yayasan"] . "</td>
                            <td class='text-center'>" . $data["pengasuh_yayasan"] . "</td>
                            <td class='text-center'>" . $data["kondisi_yayasan"] . "</td>
                            <td class='text-center'>" . $data["no_whatsapp"] . "</td>
                            <td class='text-center'>" . $data["no_rekening"] . "</td>
                            <td class='text-center'>" . $data["nama_rekening"] . "</td>
                            <td class='text-center'>" . $data["gambar"] . "</td>
                        </tr>
                    ";
            }
            ?>
        </tbody>

    </table>
</div>


<a href="#" class="create" data-toggle="modal" data-target="#addData"><i class="fa fa-plus-circle" aria-hidden="true" onclick="populate()"></i></a>

<!-- Modal Edit-->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group" action="" method="POST" id="form_edit" enctype="multipart/form-data">
                <div class="modal-body" id="edit-modal">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID" readonly>
                    <label for="nama_produk2">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk2" aria-describedby="helpId" placeholder="Nama Produk">
                    <label for="jenis_produk1">Jenis Produk</label>
                    <input type="text" class="form-control" name="jenis_produk" id="jenis_produk1" aria-describedby="helpId" placeholder="Jenis Produk">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="kategori" aria-describedby="helpId" placeholder="Kategori">
                    <label for="gambar">Gambar</label>
                    <input type="text" class="form-control" name="gambar" id="gambar" aria-describedby="helpId" placeholder="Gambar">
                    <label for="video">Video</label>
                    <input type="text" class="form-control" name="video" id="video" aria-describedby="helpId" placeholder="Video">
                    <label for="spek">Spek</label>
                    <input type="text" class="form-control" name="spek" id="spek" aria-describedby="helpId" placeholder="Spek">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-danger" id="delete">Delete</a>
                    <input type="submit" value="Edit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="system/insert-yayasan.php" method="post" class="form-group" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_yayasan">Nama Yayasan</label>
                        <input type="text" name="nama_yayasan" id="nama_yayasan" class="form-control ml-auto" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_yayasan">Alamat Yayasan</label>
                        <input type="text" name="alamat_yayasan" id="alamat_yayasan" class="form-control ml-auto" required>
                    </div>
                    <div class="form-group">
                        <label for="pengasuh">Pengasuh</label>
                        <input type="text" name="pengasuh" id="pengasuh" class="form-control ml-auto" required>
                    </div>
                    <div id="form-kondisi"></div>
                    <div class="form-group">
                        <label for="no_wa">No WA</label>
                        <input type="text" name="no_wa" id="no_wa" class="form-control ml-auto" required>
                    </div>
                    <div class="form-group">
                        <label for="no_rek">No Rek</label>
                        <input type="text" name="no_rek" id="no_rek" class="form-control ml-auto" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_rek">Nama Rek</label>
                        <input type="text" name="nama_rek" id="nama_rek" class="form-control ml-auto" required>
                    </div>
                    <div id="form-gambar"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<div class="form-inline" id="gambar-form" style="display: none;">
    <label for="gambar">Gambar</label>
    <input type="file" name="gambar" id="gambar" class="form-control-file ml-auto" required>
</div>