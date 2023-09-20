<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .jumbotron {
            padding: 7rem 2rem;
            /* Hapus latar belakang semi-transparan */
            border-radius: 10px;
            margin-top: 20px;
        }

        .navbar .navbar-nav .nav-link:hover {
            background: rgba(202, 152, 152, 1);
            border-radius: 6px;
        }

        nav ul li a:hover {
            background: rgba(130, 38, 126, 0.7);
            border-radius: 6px;
        }

        body {
            background-image: url('https://png.pngtree.com/background/20210711/original/pngtree-beauty-salon-cosmetics-promotion-pink-background-picture-image_1091468.jpg');
            background-size: cover;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        /* Tambahkan aturan CSS untuk smartphone di bawah ini */
        @media (max-width: 768px) {
            .navbar .navbar-brand img {
                max-width: 60px;
            }

            .navbar .navbar-toggler {
                color: #000;
            }

            .navbar .navbar-collapse {
                background-color: #FFFFFF;
                border-radius: 10px;
                padding: 10px;
            }

            .navbar .navbar-nav .nav-link {
                color: #000;
                margin: 5px 0;
            }

            .jumbotron h1 {
                font-size: 24px;

            }

            .jumbotron a img {
                margin-top: 20px;
                max-width: 120px;
                vertical-align: middle;
                /* Membuat ikon gambar sejajar */
            }

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
                        <a class="nav-link active text-dark" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="/salon/salonPricelist">Price List</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="/salon/salonLogin">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="/salon/salonRegister">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Frame setelah navbar -->
    <div style="background-image: url(bgirene.jpeg); background-size: cover; background-position: center;">
        <div class="container mt-3">
            <div class="container mt-3">
                <div class="jumbotron text-center">
                    <?= csrf_field() ?>

                    <div>
                        <h1> The Best Beauty Salon In Kendari</h1>
                    </div>
                    <div class="icon-group"> <!-- Kelompokkan ikon-ikon ini dalam satu div -->
                        <br><a href="https://www.google.com/maps/dir/-7.742211,110.4142924/salon+evalen's+kendari/@-5.0857208,107.4354402,5z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2d98ed6ed82963e47631ecea9700!2m2!1d122.5516655!2d-3.9654328?entry=ttu">
                            <img src="/img/booknow.png" width="160" height="48">
                        </a>
                        <br><br>
                        <a href="https://wa.me/081343432335">
                            <img src="/img/logowa.png" width="50" height="50">
                        </a>
                        <a href="https://www.instagram.com/stfadilie/">
                            <img src="/img/logoig5.png" width="65" height="65">
                        </a>
                        <a href="https://www.google.com/maps/dir/-7.742211,110.4142924/salon+evalen's+kendari/@-5.0857208,107.4354402,5z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2d98ed6ed82963e3:0xf5d47631ecea9700!2m2!1d122.5516655!2d-3.9654328?entry=ttu">
                            <img src="/img/logomaps.png" width="35" height="45">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>