<?php
$query = mysqli_query($koneksi, "SELECT * FROM testimoni JOIN user ON testimoni.id_user = user.id_user");
$no = 1;
?>

<div class="box box-info">
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <th>No</th>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Pesan</th>
                    <!-- <th>Tampilkan</th> -->
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($row['tgl'])) ?></td>
                            <td><?= $row['pesan'] ?></td>
                            <td>
                                <?php if ($row['status'] == 0): ?>
                                    <a href="sistem/ubah_status_testi.php?id=<?= $row['id_testi'] ?>&status=1" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Tampilkan Testimoni" onclick="return confirm('Tampilkan Testimoni?')">
                                        <i class="fa fa-check"></i>
                                    </a>
                                <?php elseif ($row['status'] == 1): ?>
                                    <a href="sistem/ubah_status_testi.php?id=<?= $row['id_testi'] ?>&status=0" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Sembunyikan Testimoni" onclick="return confirm('Sembunyikan Testimoni?')">
                                        <i class="fa fa-close"></i>
                                    </a>
                                <?php endif; ?>
                                <a href="sistem/hapus_testi.php?id=<?= $row['id_testi'] ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Testimoni" onclick="return confirm('Hapus Testimoni?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
