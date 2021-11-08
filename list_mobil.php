<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    List Mobil
                </h4>
            </div>

            <div class="card-body">
                <form action="list_mobil.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2" placeholder="search"/>
                </form>

                <ul class="list-group">
                    <?php
                    include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from mobil
                        where id_mobil like '%$search%'
                        or nomor_mobil like '%$search%'
                        or merk like '%$search%' or jenis
                        like '%$search%' or warna like 
                        '%$search%' or tahun_pembuatan
                        like '%$search%'";
                    }else{
                        $sql = "select * from mobil";
                    }

                    $hasil = mysqli_query($connect, $sql);
                    while ($mobil = mysqli_fetch_array($hasil)){
                    
                    ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- Menampilkan Gambar -->
                                <img src="cover/<?=$mobil["cover"]?>"
                                width="350" />
                            </div>
                            <div class="col-lg-6">
                                <!-- Deskripsi -->
                                <h5><?=$mobil["id_mobil"]?></h5>
                                <h6>Nomor Mobil: <?=$mobil["nomor_mobil"]?></h6>
                                <h6>Merk: <?=$mobil["merk"]?></h6>
                                <h6>Jenis: <?=$mobil["jenis"]?></h6>
                                <h6>Warna: <?=$mobil["warna"]?></h6>
                                <h6>Tahun Pembuatan: <?=$mobil["tahun_pembuatan"]?></h6>
                                <h6>Biaya Sewa/Hari: <?=$mobil["biaya_sewa_per_hari"]?></h6>
                            </div>
                            <div class="col-lg-2">
                                <a href="form_mobil.php?id_mobil=<?=$mobil["id_mobil"]?>">
                                    <button class="btn btn-info btn-block">
                                        Edit
                                    </button>
                                </a>
                                <button class="btn btn-danger btn-block">
                                        Hapus
                                    </button>

                            </div>
                        </div>

                    </li>  
                    <?php 
                    }
                    
                    ?>
                </ul>

            </div>

        </div>

    </div>
</body>
</html>