<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <!-- Card Header -->
            <div class="card-header bg-info">
                <h4 class="text-white">List Daftar Pelanggan</h4>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <!-- Search -->
                <form action="list-pelanggan.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2"
                    placeholder="Search" required>
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from pelanggan
                        where id_pelanggan like '%$search%'
                        or nama_pelanggan like '%$search%'
                        or alamat_pelanggan like '%$search%'
                        or kontak like '%$search%'";
                    } else {
                        $sql = "select * from pelanggan";
                    }

                    $query = mysqli_query($connect, $sql);
                    while ($anggota = mysqli_fetch_array($query)){?>
                       <li class="list-group-item">
                        <div class="row">
                            <!-- Bagian List Pelanggan -->
                            <div class="col-lg-8 col-md-10">
                                <h5>Nama Pelanggan: <?php echo $anggota["nama_pelanggan"]; ?></h5>
                                <h6>Alamat Pelanggan: <?php echo $anggota["alamat_pelanggan"]; ?></h6>
                                <h6>Kontak: <?php echo $anggota["kontak"]; ?></h6>
                                <h6>ID Pelanggan: <?php echo $anggota["id_pelanggan"]; ?></h6>
                            </div>
                            
                            <div class="col-lg-4 col-md-2">
                                <button class="btn btn-block btn-primary">
                                    Edit
                                </button>
                                <button class="btn btn-block btn-danger">
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