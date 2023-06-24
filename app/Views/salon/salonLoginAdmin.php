<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </script>
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
    </style>
</head>

<body>
    <!-- Interface Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #FFFFFF">
        <div class="container justify-content-center">
            <a class="navbar-brand" href="/home"><img src="/img/salon.png" width="80" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Login -->

    <body>
        <div style="text-align: center; position: absolute; right: 40%; top: 50%; transform: translate(0, -50%);">
            <form method="post" action="/salon/salonCheckLoginAdmin">
                <?= csrf_field() ?>
                <img src="/img/logo.png" style="max-width: 150px; margin-top: 20px;">
                <div>
                    <input class="form-control text-center" placeholder="Email" type="text" id="email" name="email" required>
                </div><br>
                <div>
                    <input class="form-control text-center" placeholder="Password" type="password" id="password" name="password" required>
                </div><br>
                <div>
                    <input type="submit" value="Login" style="border: none; background-color: #BD7272; color: #fff;">
                </div>
            </form>
        </div>

    </body>
</body>

</html>