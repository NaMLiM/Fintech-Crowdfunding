var table = document.getElementById("tabel");
var rows = table.rows;
for (var i = 1; i < rows.length; i++) {
    rows[i].onclick = (function (e) {
        // $("#id").val(this.cells[0].innerHTML);
        // $("#nama_produk").val(this.cells[1].innerHTML);
        // $("#jenis_produk").val(this.cells[2].innerHTML);
        // $("#kategori").val(this.cells[3].innerHTML);
        // $("#gambar").val(this.cells[4].innerHTML);
        // $("#video").val(this.cells[5].innerHTML);
        // $("#spek").val(this.cells[6].innerHTML);
        // $("#form").attr("action","system/edit-produk.php?page=produk");
        // $("#delete").attr("href","system/delete.php?page=produk&id="+this.cells[0].innerHTML);
        var id_temp = this.cells[0].innerHTML;
        $("#edit-modal").load("page/ajax-edit-yayasan.php", { id: id_temp }, function (response, status, request) {
            this; // dom element
        });
        $("#delete").attr("href", "system/delete-yayasan.php?id=" + id_temp);
        $("#form_edit").attr("action", "system/edit-yayasan.php?id=" + id_temp);
    });
}


var multiple_gambar = 1; //----variabel untuk gambar multi---
function tambah_image() {
    multiple_gambar++;
    $("#jumlah_gambar").val(multiple_gambar);
    $("#gambar-grup").html($("#gambar-grup").html() + "<input type='file' name='gambar" + multiple_gambar + "' id='gambar-multi" + multiple_gambar + "' ><button type='button' id='close-btn" + multiple_gambar + "' class='btn btn-danger btn-sm' data-target='" + multiple_gambar + "' onclick='close_btn(this)'><i class='fas fa-minus'></i></button>");
}

function close_btn(elem) {
    multiple_gambar--;
    $("#jumlah_gambar").val(multiple_gambar);
    $("#gambar-multi" + $(elem).attr("data-target")).remove();
    $(elem).remove();
}

function add_gambar_multi() {
    $("#form-gambar").html("<div class='row' id='gambar-form-multi'><div class='col-md-4'><label for='gambar-multi'>Gambar</label><div id='gambar-grup'><input type='file' name='gambar1' id='gambar-multi' class='form-control-file ml-auto' required></div></div><div class='col-md-8'><button type='button' class='btn btn-primary' id='tambah-image' onclick='tambah_image()'><i class='fas fa-plus'></i></button></div></div><input type='hidden' name='jumlah_gambar' id='jumlah_gambar' value=1>");
    multiple_gambar = 1;
}

function add_kondisi() {
    $("#form-kondisi").html("Kondisi<div id='toolbar-container'></div><div id='editor' class='border-gray form-group'></div><input type='hidden' class='form-control ml-auto' name='kondisi' id='kondisi'>");
    DecoupledEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container');

            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });

    $("#editor").click(function (e) {
        e.preventDefault();
        $("#kondisi").val($("#editor").html());
        $(this).keyup(function () {
            $("#kondisi").val($("#editor").html());
        });
    });
}

function populate() {
    add_gambar_multi();
    add_kondisi();
}


// Edit
function delete_image(ini) {
    if ($("#image-now").val().split("-").length >= 2) {
        $("#" + $(ini).attr("data-target")).remove();
        $(ini).remove();
    }
}
