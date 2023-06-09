<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
</head>

<body>
    <h1>DELETE ASISTEN PRAKTIKUM</h1>
    <form action="/asisten/delete" method="post">
        <?= csrf_field() ?>
        NIM:<input type="text" name="NIM" /><br />
        NAMA:<input type="text" name="NAMA" /><br />
        PRAKTIKUM:<input type="text" name="PRAKTIKUM" /><br />
        IPK:<input type="text" name="IPK" /><br />
        <input type="submit" name="" value="Update" />
        <a href="/asisten/logout">Logout</a>
    </form>
</body>

</html>