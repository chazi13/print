<?php
$query = mysqli_query($koneksi, "SELECT * FROM kontak");
$no = 1;
?>

<div class="box box-info">
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['pesan'] ?></td>
                            <td>
                                <a href="sistem/hapus_kontak.php?id_kontak=<?= $row['id_kontak'] ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Pesan" onclick="return confirm('Yakin Hapus Pesan?')">
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
