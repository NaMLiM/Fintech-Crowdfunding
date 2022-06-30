<head>
  <style>
    .card {
      padding: 10px;
      width: 15rem;
    }

    .row {
      justify-content: center;
    }

    .card-img-top {
      object-fit: cover;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;
    }
   
  </style>
</head>
<body class="boddy">
  

<div class="container" style="text-align: center; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
  <h2 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><b>DONASI</b> </h2>
  <div class="row">
    <?php
    $select = mysqli_query($conn, "select * from yayasan");
    while ($data = mysqli_fetch_array($select)) {
    ?>
      <div class="card" style="margin-left: 2%; margin: right 2%; border: 10px solid bisque;">
      <a href=" index.php?page=yayasan&id=<?php echo $data['id_yayasan'] ?>" class="btn btn-primary">
        <img src="admin/upload/<?php echo explode("-", $data['gambar'])[0]; ?>/gambar/<?php echo explode("-", $data["gambar"])[1] ?>" class="card-img-top"></a>
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['nama_yayasan'] ?></h5>
          <p class="card-text"><?php echo $data['alamat_yayasan'] ?></p>
          <br>
          <a href=" index.php?page=yayasan&id=<?php echo $data['id_yayasan'] ?>" class="btn btn-primary">Lihat</a>
          <br><br><br><br>
        </div>
      </div>
    <?php
    }
    ?>
  </div>

</div>
</body>