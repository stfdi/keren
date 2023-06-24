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

        div {
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
    <!-- Start View -->

    <body>
        <div style="text-align: center; position: absolute; right: 40%; top: 50%; transform: translate(0, -50%);">
            <?= csrf_field() ?>
            <p style="text-align: center;">Masuk sebagai:</p>
            <div>
                <a class="login" href="salon/salonLoginAdmin" style="display: inline-block; text-decoration: none; border: none; background-color: #BD7272; color: #fff; padding: 10px 20px; margin-right: 10px;">Admin</a>
                <br><br><a class="login" href="/home" style="display: inline-block; text-decoration: none; border: none;  background-color: #BD7272; color: #fff; padding: 10px 20px;">Member / Guest</a>
            </div>
        </div>

    </body>
</body>

</html>