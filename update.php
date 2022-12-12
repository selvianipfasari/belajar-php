<?php

if (isset($_GET['id'])) {
    // ambil id dari url atau method get
    $id = $_GET['id'];

    //1. buat koneksi dengan mysql
    $con = mysqli_connect("localhost", "root", "", "todolist");

    //2. cek konesksi dengan mysql
    if (mysqli_connect_errno()) {
        echo "koneksi gagal" . mysqli_connect_error();
    } else {
        echo "";
    }

    //3. membaca data dari table mysql
    $sql = "SELECT * FROM list WHERE id='$id'";

    //4. tampilkan data dengan menjalankan sql query
    if ($result = mysqli_query($con, $sql)) {
        echo "<br>";
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nama = $user_data['nama'];
            $waktu = $user_data['waktu'];
        }
    } else {
        echo "eror: " . $sql . "<br>" . mysqli_error($con);
    }

    //5. tutup koneksi mysql
    mysqli_close($con);
}
//tangkap dulu datanya

if (isset($_POST['submit'])) {

    $nama  = $_POST['nama'];
    $waktu  = $_POST['waktu'];


    //1. buat koneksi dengan mysqli
    $con = mysqli_connect("localhost", "root", "", "todolist");

    //2. cek koneksi dengan mysqli
    if (mysqli_connect_errno()) {
        echo "koneksi gagal" . mysqli_connect_error();
    } else {
        echo "";
    }
    //buat sql query insert ke database
    //buat query insert dan jalankan
    $sql = "UPDATE list SET nama='$nama',waktu='$waktu' WHERE id='$id' ";

    //jalankan query 
    if (mysqli_query($con, $sql)) {
        echo "data berhasi diubah";
    } else {
        echo "ada error" . mysqli_error($con);
    }

    //5. tutup koneksi mysql
    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>form</title>
</head>

<body>
    <div>
        <h3>Edit Kegiatan</h3>
        <form class="form" action="" method="post">
            Kegiatan: <input type="text" name="nama" value="<?php echo $nama; ?>"><br>
            waktu: <input type="text" name="waktu" value="<?php echo $waktu; ?>"><br>
            <input type="number" name="id" value="<?php echo $list['id'] ?>" hidden>
            <a class="btn btn-outline-primary" href="index.php" role="button">Kembali</a>
            <button type="submit" name="submit" class="btn btn-outline-danger">Simpan</button>
        </form>
    </div>
</body>

</html>