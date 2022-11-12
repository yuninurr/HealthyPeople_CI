<?php
header("Content-type:aplication/octet-stream/");
header("Content-Disposition:attacment; filename=data_vaksin.xls");
header("Pragma: no-cache");
header("Expires:0");

?>

<table class="table table-hover">
    <tr class="table">
        <th>id</th>
        <th>nama</th>
        <th>NIM</th>
        <th>jurusan</th>
        <th>action</th>
        <?php foreach ($vaksin as $m) : ?>

    </tr>

    <?php $i = 1; ?>
    <tr>
        <td><?= $m["id_vaksin"]; ?></td>
        <td><?= $m["kode_type"]; ?></td>
        <td><?= $m["nama"]; ?></td>
        <td><?= $m["jumlah"]; ?></td>
        <td><?= $m["status"]; ?></td>
    </tr>
    <?php $i++; ?>

<?php endforeach; ?>

</table>