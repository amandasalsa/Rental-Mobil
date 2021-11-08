<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mobil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">
                    Form Mobil
                </h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET["id_mobil"])) {
                    # form untuk edit
                    include "connection.php";
                    $id_mobil = $_GET["id_mobil"];
                    $sql = "select * from mobil
                    where id_mobil='$id_mobil'";
                    # eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $mobil = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process_mobil.php" method="post"
                    enctype="multipart/form-data">
                        ID Mobil
                        <input type="text" name="id_mobil"
                        class="form-control mb-2" required
                        value="<?=$mobil["id_mobil"] ?>" readonly>

                        Nomor Mobil
                        <input type="text" name="nomor_mobil"
                        class="form-control mb-2" required
                        value="<?=$mobil["nomor_mobil"] ?>">

                        Merk
                        <input type="text" name="merk"
                        class="form-control mb-2" required
                        value="<?=$mobil["merk"] ?>">

                        Jenis
                        <input type="text" name="jenis"
                        class="form-control mb-2" required
                        value="<?=$mobil["jenis"] ?>">

                        Warna
                        <input type="text" name="warna"
                        class="form-control mb-2" required
                        value="<?=$mobil["warna"] ?>">

                        Tahun Pembuatan
                        <select name="tahun_pembuatan" class="form-control mb-2" required>
                            <option value="<?=$mobil["tahun_pembuatan"] ?>">
                                <?=$mobil["tahun_pembuatan"] ?>
                            </option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>

                        Image <br>
                        <img src="image/<?=$mobil["image"] ?>" width="150">
                        <input type="file" name="image"
                        class="form-control mb-2">

                        <button type="submit" class="btn btn-primary btn-block" name="edit_mobil"
                        onclick="return confirm('Apakah anda yakin?')">
                            Save
                        </button>
                    </form>
                <?php
                } else {
                    # Form untuk insert ?>
                    <form action="process_mobil.php" method="post"
                    enctype="multipart/form-data">
                        ID Mobil
                        <input type="text" name="id_mobil"
                        class="form-control mb-2" required
                        value="<?=$mobil["id_mobil"] ?>" readonly>

                        Nomor Mobil
                        <input type="text" name="nomor_mobil"
                        class="form-control mb-2" required
                        value="<?=$mobil["nomor_mobil"] ?>">

                        Merk
                        <input type="text" name="merk"
                        class="form-control mb-2" required
                        value="<?=$mobil["merk"] ?>">

                        Jenis
                        <input type="text" name="jenis"
                        class="form-control mb-2" required
                        value="<?=$mobil["jenis"] ?>">

                        Warna
                        <input type="text" name="warna"
                        class="form-control mb-2" required
                        value="<?=$mobil["warna"] ?>">

                        Tahun Pembuatan
                        <select name="tahun_pembuatan" class="form-control mb-2" required>
                            <option value="<?=$mobil["tahun_pembuatan"] ?>">
                                <?=$mobil["tahun_pembuatan"] ?>
                            </option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>

                        Image <br>
                        <img src="image/<?=$mobil["image"] ?>" width="150">
                        <input type="file" name="image"
                        class="form-control mb-2">

                        <button type="submit" class="btn btn-primary btn-block" name="edit_mobil"
                        onclick="return confirm('Apakah anda yakin?')">
                            Save
                        </button>
                    </form>
                <?php
                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>