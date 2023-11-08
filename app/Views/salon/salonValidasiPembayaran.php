<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
        .center {
            text-align: center;
        }
    </style>
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
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            overflow-x: auto;
            /* Menambahkan scroll horizontal */
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            /* min-width: max-content; */
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
</head>

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
                        <a class="nav-link text-dark" aria-current="page" href="/home">Logout</a>
                    </li>
                </ul>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    //Connection server
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "salon";

    //create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //check connection
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    ?>

    <div class="container">
        <table>
            <tr>
                <th class="center">No</th>
                <th class="center">Email</th>
                <th class="center">Jasa</th>
                <th class="center">Waktu</th>
                <th class="center">Pembayaran</th>
                <th class="center">Photo</th>
                <th class="center">Status</th>
                <th class="center">Validasi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($booking as $bo) :
            ?>
                <tr>
                    <td><?= $bo['id_booking'] ?></td>
                    <td><?= $bo['email'] ?></td>
                    <td><?= $bo['nama_jasa'] ?></td>
                    <td><?= $bo['waktu'] ?></td>
                    <td><?= $bo['pembayaran'] ?></td>
                    <td>
                        <?php if ($bo['pembayaran'] == "QRIS") { ?>
                            <img width="100" height="100" src="http://localhost:8080/gambars/<?= $bo['photo'] ?>" alt="Photo">
                        <?php
                            // Jika pembayaran adalah QRIS, tambahkan gambar QRIS.png
                            echo '<img src="qris.png" style="width:300px;height:200px;">';
                        } else { ?>
                            <?php echo "-"; ?>
                        <?php } ?>
                    </td>
                    <td><?= $bo['status'] ?></td>
                    <td>
                        <?php if ($bo['status'] != "Lunas") { ?>
                            <a href='http://localhost:8080/salon/validation/<?= $bo['id_booking'] ?>' ?> Selesai</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>

</body>

</html>