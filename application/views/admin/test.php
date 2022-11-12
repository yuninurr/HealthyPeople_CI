<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card shadow">
        <div class="card-header py-3">
            <h class="m-0 font-weight-bold text-primary">Data Vaksin</h>
            <a href="<?= base_url('admin/data_kampus/tambah_kampus') ?>" class="btn btn-outline-primary waves-effect btn-sm float-right"> Tambah Kampus </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-md text-center" id="dataTable" width="112%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Type</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($vaksin as $mb) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $mb->kode_vaksin; ?></td>
                                <td><?= $mb->nama; ?></td>
                                <td><?= $mb->jumlah; ?></td>
                                <td>
                                    <?php if ($mb->status == "0") {
                                        echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                    } else {
                                        echo "<span class='badge badge-success'>Tersedia</span>";
                                    } ?>

                                </td>
                                <td>
                                    <a href="" type="button" class="btn btn-sm btn-outline-success"><i class="fas fa-eye"></i></a>
                                    <a href="" type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                    <a href="" type="button" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->