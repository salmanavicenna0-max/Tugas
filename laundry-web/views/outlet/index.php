<?php 
// Ambil data dari database menggunakan fungsi yang sudah kita buat di Controller
$data_outlet = getAllOutlet($conn); 
?>

<div class="row mb-4">
    <div class="col-md-6">
        <h2 class="display-6">Manajemen <span class="fw-bold text-primary">Outlet</span></h2>
        <p class="text-muted">Daftar seluruh cabang laundry yang terdaftar dalam sistem.</p>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?page=outlet_tambah" class="btn btn-dark btn-lg shadow-sm">
             Tambah Outlet Baru
        </a>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-dark text-uppercase small">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="py-3">Nama Outlet</th>
                        <th class="py-3">Telepon</th>
                        <th class="py-3">Alamat Lengkap</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php 
                    $no = 1;
                    if(mysqli_num_rows($data_outlet) > 0) :
                        while($row = mysqli_fetch_assoc($data_outlet)) : 
                    ?>
                    <tr>
                        <td class="px-4 fw-bold text-muted"><?= $no++; ?></td>
                        <td class="fw-semibold"><?= $row['nama']; ?></td>
                        <td><?= $row['tlp']; ?></td>
                        <td class="text-truncate" style="max-width: 250px;"><?= $row['alamat']; ?></td>
                        <td class="text-center">
                            <a href="index.php?page=outlet_edit&id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-warning mx-1">
                                Edit
                            </a>
                            <a href="index.php?page=outlet&hapus_outlet=<?= $row['id']; ?>" 
                               class="btn btn-sm btn-outline-danger mx-1" 
                               onclick="return confirm('Apakah Anda yakin ingin menghapus outlet ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    else: 
                    ?>
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <em>Belum ada data outlet. Klik tombol "Tambah Outlet Baru" untuk memulai.</em>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>