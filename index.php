<?php

include 'Connection/connection.php';

if (isset($_POST['status'])) {
    if ($_GET['status'] == 'belum') {
        $listTugas = mysqli_query($conn, "SELECT * FROM tugas WHERE status = 'Belum selesai kek' ORDER BY  deadline ASC");
    }else if($_GET["status"] == 'Sedamg Dikerjakan'){
        $listTugas = mysqli_query($conn, "SELECT * FROM tugas WHERE status = 'Sedang dikerjakan' ORDER BY deadline ASC");
    } elseif($_GET["status"] == 'selesai'){
        $listTugas = mysqli_query($conn, "SELECT * FROM tugas WHERE status = 'Selesai' ORDER BY deadline ASC");
    } else if ($_GET["status"] == 'cancelled') {
        $listTugas = mysqli_query($conn, "SELECT * FROM tugas WHERE status = 'Cancelled' ORDER BY deadline ASC");
    }
}else {
    $listTugas = mysqli_query($connection, "SELECT * FROM tugas ORDER BY deadline ASC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telxplore 2024</title>
    <!-- cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="w-full h-[80px] flex place-content-between items-center shadow-md bg-white p-4">
        <h1 class="text-2x1 font-bold">Hi, Tel-Explore</h1>
        <h1 class="text-2x1 font-bold">Home page</h1>
        <h1 class="text-2x1 font-bold"><?= date('l, j f y') ?></h1>
    </nav>
    <div class="flex justify-center space-x-7 m-4">
        <a class="bg-white w-fit p-2 text-center rounded-md shadow-md" href="http:/trial_livecode/index.php">All</a>
        <a class="bg-white w-fit p-2 text-center rounded-md shadow-md" href="http:/trial_livecode/index.php?status=belum">Belum</a>
        <a class="bg-white w-fit p-2 text-center rounded-md shadow-md" href="http:/trial_livecode/index.php?status=sedangdikerjakan">Sedang Dikerjakan</a>
        <a class="bg-white w-fit p-2 text-center rounded-md shadow-md" href="http:/trial_livecode/index.php?status=selesai">Selesai</a>
        <a class="bg-white w-fit p-2 text-center rounded-md shadow-md" href="http:/trial_livecode/index.php?status=cancelled"cancelled</a>
    </div>

    <div class="flex flex-warap justify-center">
        <?php foreach ($listTugas as $tugas) : ?>
            <div class="bg-white border-green-500 w-[250px] h-[300px] m-4 flex flex-col space-y-[100px] p-4 items-center shadow-md">
                <h1 class="text-xl font-semibold "><?= $tugas['nama'] ?></h1>
                <div class="items-center flex flex-col">
                    <p class=""></p>
                </div>
            </div> 
    </div>
</body>
</html>