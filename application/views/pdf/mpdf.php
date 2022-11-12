<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Vaksin</title>
</head>

<body>
    Tanggal Cetak : <?= date('d F Y'); ?>
    <table width="100%" style="border: 0.1mm solid #000000;" cellpaddin="8">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Type</th>
                <th>Nama Vaksin</th>
                <th>Jumlah Vaksin</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($semuavaksin as $vaksin) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $vaksin['kode_type']; ?></td>
                    <td><?= $vaksin['nama']; ?></td>
                    <td><?= $vaksin['jumlah']; ?></td>
                </tr>
            <?php $i++;
            endforeach; ?>
        </tbody>
    </table>
</body>

</html>