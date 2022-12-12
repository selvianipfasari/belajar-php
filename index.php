<?php
//1. buat koneksi dengan mysql
$con = mysqli_connect("localhost", "root","", "todolist");

//2. cek konesksi dengan mysql
if (mysqli_connect_errno()) {
    echo "koneksi gagal" . mysqli_connect_error();
} else {
    echo "Selamat Datang !";
}

//3. membaca data dari table mysql
$query = "SELECT * FROM list";

//4. tampilkan data dengan menjalankan sql query
$result = mysqli_query($con, $query);
$list = [];
if ($result) {
    //ini buat cek, tampilkan data satu per satu    
    while ($row = mysqli_fetch_assoc($result)) { //kita tampung datanya di row
        //echo "<br>".$row["nama"];
        $list[] = $row;
    }
    mysqli_free_result($result);
}

//5. tutup koneksi mysql
mysqli_close($con);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Data list</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                        <div class="card-body py-4 px-4 px-md-5">

                            <p class="h1 text-center mt-3 mb-4 pb-3 text-dark">
                                <a class="fas fa-check-square me-1 h1 text-center mt-3 mb-4 pb-3 text-dark" href="https://www.instagram.com/auliasisdwiputri/">To-Do list</a>
                            </p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="<?php echo "insert.php" ?>">
                                    <type="button" class="btn btn-outline-primary">New Plan</tambah>
                                </a>
                            </div>
                            <br>
                            <table class="table">
                                <tr>
                                    <th>LIST</th>
                                    <th>TIME</th>
                                    <th></th>
                                </tr>
                                <?php foreach ($list as $value) : ?>
                                    <tr>
                                        <td><?php echo $value["nama"]; ?></td>
                                        <td><?php echo $value["waktu"]; ?></td>
                                        <td>
                                            <a href="<?php echo "update.php?id=" . $value["id"]; ?>"><i class="btn btn-outline-warning bi bi-pencil-square"></i></a>
                                            <a href="<?php echo "delete.php?id=" . $value["id"]; ?>"><i class="btn btn-outline-danger bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            
                            </sectuion>
                        
</body>

</html>