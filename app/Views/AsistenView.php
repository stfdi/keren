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
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<body>
    <div class="container-fluid">
        <table>
            <tr>
                <th>No</th>
                <th class="center">NIM</th>
                <th class="center">Nama</th>
                <th class="center">Kelas Praktikum</th>
                <th class="center">IPK</th>
            </tr>
            <?php $no = 1;
            foreach ($asisten as $as) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $as['NIM'] ?></td>
                    <td><?= $as['NAMA'] ?></td>
                    <td><?= $as['PRAKTIKUM'] ?></td>
                    <td><?= $as['IPK'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>