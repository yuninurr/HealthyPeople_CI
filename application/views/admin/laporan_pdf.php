<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-family:'Poppins'">Laporan Data Mahasiswa</h1>
    <div class="row mt-3">
        <div class="col-md-6">
            <table class="table table-hover">
                <tr class="table">
                    <th style="font-size: 23px">id</th>
                    <th style="font-size: 23px">nama</th>
                    <th style="font-size: 23px">NIM</th>
                    <th style="font-size: 23px">jurusan</th>
                    <th style="font-size: 23px">IPK</th>
                    <?php foreach ($mahasiswa as $m) : ?>

                </tr>

                <?php $i = 1; ?>
                <tr>
                    <td style="font-size: 20px;font-family:'Poppins'"><?= $m["id"]; ?></td>
                    <td style="font-size: 20px;font-family:'Poppins'"><?= $m["nama"]; ?></td>
                    <td style="font-size: 20px;font-family:'Poppins'"><?= $m["NIM"]; ?></td>
                    <td style="font-size: 20px;font-family:'Poppins'"><?= $m["jurusan"]; ?></td>
                    <td style="font-size: 20px;font-family:'Poppins'"><?= $m["IPK"]; ?></td>
                </tr>
                <?php $i++; ?>

            <?php endforeach; ?>

            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->