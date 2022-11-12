<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card shadow">
        <div class="card-header py-3">
            <h class="m-0 font-weight-bold text-primary">Data Vaksin</h>

            <button class="btn btn-primary mb-3" type="button" data-bs-toggle="dropdown" aria-expanded="true" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true">
                <i class="fa fa-download">Export</i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url('data_vaksin/expdf') ?>">AS PDF</a></li>
                <li><a class="dropdown-item" href="<?= base_url('data_vaksin/exexcel') ?>">AS Excel</a></li>
            </ul>
            <a href="" class="btn btn-outline-primary waves-effect btn-sm float-right" data-toggle="modal" data-target="#newVaksinModal"> Tambah Vaksin </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-md text-center" id="dataTable" wimb$mbh="100%" cellspacing="0">
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
                                <td><?= $mb->kode_type; ?></td>
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
                                    <a href="" type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#detailModal<?= $mb->id_vaksin ?>"><i class="fas fa-eye"></i></a>
                                    <a href="" type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editModal<?= $mb->id_vaksin ?>"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url() ?>data_vaksin/destroy_datavaksin/<?= $mb->id_vaksin ?>" type="button" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
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

<!-- Modal Tambah -->
<div class="modal fade" id="newVaksinModal" tabindex="-1" aria-labelledby="newVaksinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newVaksinModalLabel">Tambah Vaksin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('data_vaksin/tambah_vaksin_aksi'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Vaksin </label>
                        <select name="kode_type" id="kode_type" class="form-control">
                            <option value="">--Pilih Vaksin--</option>
                            <?php foreach ($type as $pr) : ?>
                                <option value="<?= $pr->kode_type; ?>"><?= $pr->nama_type; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kode_type', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control">
                        <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="">--Pilih Status--</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<?php foreach ($vaksin as $mb) : ?>
    <div class="modal fade" id="detailModal<?= $mb->id_vaksin ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Vaksin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-striped ">
                            <tr>
                                <th>Kode Vaksin</th>
                                <td><?= $mb->kode_type ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?= $mb->nama ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td><?= $mb->jumlah ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if ($mb->status == "0") {
                                        echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                    } else {
                                        echo "<span class='badge badge-success'>Tersedia</span>";
                                    } ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Edit -->
<?php foreach ($vaksin as $mb) : ?>
    <div class="modal fade" id="editModal<?= $mb->id_vaksin ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Edit Vaksin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('data_vaksin/update_vaksin_aksi/'); ?><?= $mb->id_vaksin ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Vaksin</label>
                            <input type="hidden" name="id_vaksin" value="<?php echo $mb->id_vaksin; ?>">
                            <select name="kode_type" id="kode_type" class="form-control">
                                <?php foreach ($type as $tp) : ?>
                                    <option value="<?php echo $tp->kode_type ?>"><?php echo $tp->nama_type;  ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('kode_type', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $mb->nama; ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?php echo $mb->jumlah; ?>">
                            <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option <?php if ($mb->status == "1") {
                                            echo "selected='selected'";
                                        }
                                        echo $mb->status ?> value="1">Tersedia
                                </option>
                                <option <?php if ($mb->status == "0") {
                                            echo "selected='selected'";
                                        }
                                        echo $mb->status ?> value="0">Tidak Tersedia
                                </option>
                            </select>
                            <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>