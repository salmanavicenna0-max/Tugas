<?php
// 1. Koneksi dan Controller (Panggil di paling atas)
require_once 'config/database.php';

// Agar mesinnya jalan, kita panggil controller sesuai halaman
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

switch ($page) {
    case 'outlet':
    case 'outlet_tambah':
    case 'outlet_edit':
        include 'controllers/OutletController.php';
        break;
    case 'member':
    case 'member_tambah':
        include 'controllers/MemberController.php';
        break;
    case 'user':
        include 'controllers/UserController.php';
        break;
        
}

// 2. Bagian Head & Header
include 'views/layout/header.php';
?>

<div class="container mt-4">
    <?php
    // 3. Logika Routing
    switch ($page) {
        case 'outlet':
            include 'views/outlet/index.php';
            break;
        case 'outlet_tambah':
            include 'views/outlet/tambah.php';
            break;
        case 'outlet_edit':
            include 'views/outlet/edit.php';
            break;
        case 'member':
            include 'views/member/index.php';
            break;
        case 'user':
            include 'views/user/index.php';
            break;
        case 'transaksi':
            include 'views/transaksi/index.php';
            break;

        // Tampilan Dashboard (Halaman Utama)
        default:
            ?>
            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">LaundryKu Premium</h1>
                    <p class="lead">Platform manajemen laundry terbaik untuk bisnis Anda. Kelola outlet, pengguna, dan transaksi dengan satu sistem terintegrasi.</p>
                    <p><strong>Kebersihan adalah prioritas kami.</strong> Siap membantu bisnis Anda naik ke level berikutnya.</p>
                </div>
                <div class="col-lg-6">
                    <div id="myCarousel" class="carousel slide shadow shadow-lg" data-bs-ride="carousel" style="border-radius: 15px; overflow: hidden;">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://as1.ftcdn.net/jpg/04/63/41/18/1000_F_463411850_Grl9sQmrcwA53riQdVuQ5npHaBCkGqSn.jpg" class="d-block w-100" alt="Laundry 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.housedigest.com/img/gallery/10-laundry-practices-from-around-the-world-to-try-and-which-are-best-to-skip/try-north-america-self-service-laundromats-1733399025.jpg" class="d-block w-100" alt="Laundry 2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <div class="container text-center mt-5">
                <h3 class="mb-4 fw-bold">MANAJEMEN OPERASIONAL</h3>
                <div class="row g-4">
                    <div class="col-sm-4">
                        <p><strong>OUTLET</strong></p>
                        <a href="index.php?page=outlet">
                            <img src="https://www.w3schools.com/w3images/bandmember.jpg" class="rounded-circle person shadow" alt="Outlet" width="200">
                        </a>
                        <p class="mt-3">Atur lokasi cabang laundry Anda.</p>
                    </div>
                    <div class="col-sm-4">
                        <p><strong>MEMBER</strong></p>
                        <a href="index.php?page=member">
                            <img src="https://www.w3schools.com/w3images/bandmember.jpg" class="rounded-circle person shadow" alt="Member" width="200">
                        </a>
                        <p class="mt-3">Kelola data pelanggan setia.</p>
                    </div>
                    <div class="col-sm-4">
                        <p><strong>USER</strong></p>
                        <a href="index.php?page=user">
                            <img src="https://www.w3schools.com/w3images/bandmember.jpg" class="rounded-circle person shadow" alt="User" width="200">
                        </a>
                        <p class="mt-3">Pengaturan akun petugas kasir.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-10 pt-5 justify-content-center">
                <div class="col-lg-10 shadow-sm p-5 rounded-4 bg-light">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h2 class="fw-bold">The best offer <br><span class="text-primary">for your business</span></h2>
                            <p class="text-muted">Gunakan akses akun Anda untuk mulai memproses transaksi pelanggan hari ini.</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm p-4">
                               
                    <form>
                              <!-- 2 column grid layout with text inputs for the first and last names -->
                              <div class="row mb-4">
                                <div class="col">
                                  <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form6Example1" class="form-control" />
                                    <label class="form-label" for="form6Example1">First name</label>
                                  </div>
                                </div>
                                <div class="col">
                                  <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form6Example2" class="form-control" />
                                    <label class="form-label" for="form6Example2">Last name</label>
                                  </div>
                                </div>
                              </div>

                              <!-- Text input -->
                              <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form6Example3" class="form-control" />
                                <label class="form-label" for="form6Example3">Company name</label>
                              </div>

                              <!-- Text input -->
                              <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form6Example4" class="form-control" />
                                <label class="form-label" for="form6Example4">Address</label>
                              </div>

                              <!-- Email input -->
                              <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="form6Example5" class="form-control" />
                                <label class="form-label" for="form6Example5">Email</label>
                              </div>

                              <!-- Number input -->
                              <div data-mdb-input-init class="form-outline mb-4">
                                <input type="number" id="form6Example6" class="form-control" />
                                <label class="form-label" for="form6Example6">Phone</label>
                              </div>

                              <!-- Message input -->
                              <div data-mdb-input-init class="form-outline mb-4">
                                <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                                <label class="form-label" for="form6Example7">Additional information</label>
                              </div>

                              <!-- Checkbox -->
                              <div class="form-check d-flex justify-content-center mb-4">
                                <input
                                  class="form-check-input me-2"
                                  type="checkbox"
                                  value=""
                                  id="form6Example8"
                                  checked
                                />
                                <label class="form-check-label" for="form6Example8"> Create an account? </label>
                              </div>

                              <!-- Submit button -->
                              <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Place order</button>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            break;
    }
    ?>
</div>

<?php include 'views/layout/footer.php'; ?>