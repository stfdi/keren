<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>

<body>
    <form action="/asisten/check" method="post">
        <?= csrf_field() ?>
        USER:<input type="text" name="username" /><br>
        PASSWORD: <input type="text" name="password" /><br>
        <input type="submit" name="submit" value="login" />
    </form>
</body>

</html>