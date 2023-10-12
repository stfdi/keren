<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
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
            margin: 80px auto;
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

        /* Tambahkan gaya CSS khusus untuk tampilan mobile di sini */
        @media screen and (max-width: 768px) {
            .container {
                max-width: 100%;
                padding: 0px;
            }

            /* Contoh pengaturan lain untuk tampilan mobile */
            .navbar-brand img {
                max-width: 50px;
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

    <!-- Register -->

    <div class="container" style="text-align: center;">
        <form method="post" action="/salon/salonCheckRegister">
            <?= csrf_field() ?>
            <img src="/img/logo.png" style="max-width: 150px; margin-top: 20px;">
            <div>
                <input class="form-control text-center" placeholder="Nama" type="text" id="nama" name="nama" required>
            </div><br>
            <div>
                <input class="form-control text-center" placeholder="Email" type="text" id="email" name="email" required>
            </div><br>
            <div>
                <input class="form-control text-center" placeholder="No. Handphone" type="text" id="nohp" name="nohp" required>
            </div><br>
            <div>
                <input class="form-control text-center" placeholder="Password" type="password" id="password" name="password" required>
            </div><br>
            <div>
                <input type="submit" value="Register" style="border: none; background-color: #BD7272; color: #fff;">
            </div>
        </form>
    </div>
</body>

</html>