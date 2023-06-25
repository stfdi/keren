<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
        .center {
            text-align: center;
        }
    </style>
</head>
<style>
    .jumbotron {
        padding: 3rem 1rem;
    }

    .navbar .navbar-nav .nav-link:hover {
        background: rgba(202, 152, 152, 1);
        border-radius: 6px;
    }

    nav ul li a:hover {
        background: rgba(130, 38, 126, 0.7);
        border-radius: 6px;
    }

    form {
        max-width: 300px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
    }

    body {
        background-color: rgba(232, 197, 185, 0.919);
        height: 100vh;
        margin: 0;
        padding: 0;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    td,
    th {
        border: 1px solid #000000;
        text-align: left;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>


<body>
    <!-- Interface Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #FFFFFF">
        <div class="container justify-content-center">
            <a class="navbar-brand"><img src="/img/salon.png" width="80" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="/homeAdmin">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="/salon/salonPriceAdmin">Price List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="/salon/salonTambahJasa">Tambah Jasa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="/salon/salonHapusJasa">Hapus Jasa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="/salon/salonValidasiPembayaran">Validasi Pembayaran</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="/salon/logout">Logout</a>
                    </li>
                </ul>
                </ul>
            </div>
        </div>
    </nav>

    <body>
        <?php
        //Connection server
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "salon";

        //creact connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //check connection
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        //Update finish
        if (isset($_GET['selesai'])) {
            $id = $_GET['selesai'];
            $sql = "UPDATE booking SET status='Lunas' WHERE nohp=$id";
            if ($conn->query($sql) === TRUE) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $query = mysqli_query($conn, $sql);
        }

        ?>

        <div class="container-fluid">
            <table>
                <tr>
                    <th class="center">No</th>
                    <th class="center">Nama</th>
                    <th class="center">No Hp</th>
                    <th class="center">Jasa</th>
                    <th class="center">Waktu</th>
                    <th class="center">Pembayaran</th>
                    <th class="center">Photo</th>
                    <th class="center">Status</th>
                    <th class="center">Validasi</th>
                </tr>
                <?php $no = 1;
                foreach ($booking as $bo) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $bo['nama'] ?></td>
                        <td><?= $bo['nohp'] ?></td>
                        <td><?= $bo['jasa'] ?></td>
                        <td><?= $bo['waktu'] ?></td>
                        <td><?= $bo['pembayaran'] ?></td>

                        <td>
                            <?php if ($bo['pembayaran'] == "QRIS") { ?>
                                <img width="100" height="100" src="http://localhost:8080/gambars/<?= $bo['photo'] ?>" alt="Photo">
                            <?php } else { ?>
                                <?php echo "-"; ?>
                            <?php } ?>
                        </td>
                        <td><?= $bo['status'] ?></td>
                        <td>
                            <?php echo "<a href='" . $_SERVER['PHP_SELF'] . "?selesai=" . $bo["nohp"] . "'>Selesai</a> "; ?>
                        </td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </body>
</body>

</html>