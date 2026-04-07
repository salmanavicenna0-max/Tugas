<?php 
// Ambil data outlet dari database
$data_outlet = getAllOutlet($conn); 
?>

<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h2 class="display-6 text-uppercase fw-bold mb-0">Data <span class="text-success">Outlet</span></h2>
        <p class="text-muted mb-0">Daftar cabang dan lokasi operasional LaundryKu.</p>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?page=outlet_tambah" class="btn btn-dark shadow-sm px-4 rounded-pill">
             Daftarkan Outlet Baru
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table id="tabelOutlet" class="table table-hover align-middle mb-0">
                <thead class="table-dark small text-uppercase">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="py-3">Nama Cabang</th>
                        <th class="py-3">Telepon</th>
                        <th class="py-3">Alamat Lengkap</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if(mysqli_num_rows($data_outlet) > 0) :
                        while($row = mysqli_fetch_assoc($data_outlet)) : 
                    ?>
                    <tr>
                        <td class="px-4 text-muted fw-bold"><?= $no++; ?></td>
                        <td class="fw-semibold text-success"><?= $row['nama']; ?></td>
                        <td><?= $row['tlp']; ?></td>
                        <td class="text-muted small"><?= $row['alamat']; ?></td>
                        <td class="text-center">
                            <div class="btn-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                <a href="index.php?page=outlet_edit&id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-warning border-0 px-3">
                                    Edit
                                </a>
                                <a href="index.php?page=outlet&hapus_outlet=<?= $row['id']; ?>" 
                                   class="btn btn-sm btn-outline-danger border-0 px-3" 
                                   onclick="return confirm('Hapus cabang ini?')">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    endif; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#tabelOutlet').DataTable({
        "language": {
            "search": "Cari Outlet:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "zeroRecords": "Outlet tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ outlet",
            "infoEmpty": "Data kosong",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Lanjut",
                "previous": "Balik"
            }
        },
        "pageLength": 10,
        "columnDefs": [
            { "orderable": false, "targets": 4 }
        ]
    });
});
</script>

<style>
    /* Styling agar input pencarian lebih modern */
    .dataTables_filter { margin-bottom: 25px; }
    .dataTables_filter input {
        border-radius: 30px;
        padding: 7px 20px;
        border: 1px solid #e3e6f0;
        min-width: 250px;
    }
    .dataTables_filter input:focus {
        border-color: #198754; 
        box-shadow: 0 0 8px rgba(25, 135, 84, 0.2);
        outline: none;
    }
    .pagination .page-item.active .page-link {
        background-color: #198754;
        border-color: #198754;
    }
</style>