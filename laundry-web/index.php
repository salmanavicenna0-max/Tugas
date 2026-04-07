<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'controllers/AuthController.php';
require_once 'config/database.php';

// 1. Cek apakah user sudah login
$is_login = isset($_SESSION['status']) && $_SESSION['status'] == 'login';

// 2. Logika Proses Login
if (isset($_POST['btn_login'])) {
    if (login($conn, $_POST['username'], $_POST['password'])) {
        header("Location: index.php?page=dashboard");
    } else {
        header("Location: index.php?pesan=gagal");
    }
    exit;
}

// 3. Jika BELUM login, paksa tampilkan halaman login
if (!$is_login) {
    include 'views/auth/login.php';
    exit;
}

// 4. Tentukan Halaman
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$role = $_SESSION['role']; // Ambil role dari session

// --- SWITCH 1: KHUSUS PEMANGGILAN CONTROLLER (MESIN) + SECURITY ---
switch ($page) {
    case 'outlet':
    case 'outlet_tambah':
    case 'outlet_edit':
        // Hanya Admin yang bisa kelola Outlet
        if ($role !== 'admin') {
            header("Location: index.php?page=dashboard&pesan=terlarang");
            exit;
        }
        include_once 'controllers/OutletController.php';
        break;

    case 'member':
    case 'member_tambah':
    case 'member_edit':
        // Owner tidak boleh tambah/edit member
        if (($page == 'member_tambah' || $page == 'member_edit') && $role === 'owner') {
            header("Location: index.php?page=member&pesan=terlarang");
            exit;
        }
        include_once 'controllers/MemberController.php';
        break;

    case 'user':
    case 'user_tambah':
        // Hanya Admin yang bisa kelola User
        if ($role !== 'admin') {
            header("Location: index.php?page=dashboard&pesan=terlarang");
            exit;
        }
        include_once 'controllers/UserController.php';
        break;
}

// 5. Bagian Head & Aset
include 'views/layout/header.php';
?>

<div class="d-flex">
    <?php include 'views/layout/sidebar.php'; ?>

    <div class="main-content flex-grow-1">
        <nav class="top-navbar d-flex justify-content-between align-items-center px-4">
            <h5 class="mb-0 fw-bold text-uppercase" style="letter-spacing: 1px;">
                <i class="bi bi-grid-1x2-fill me-3 text-primary"></i> 
                LaundryKu <span class="text-primary">System</span>
            </h5>
            <div class="dropdown">
                <a href="#" class="text-decoration-none text-dark dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    <div class="text-end me-2 d-none d-sm-block">
                        <small class="text-muted d-block" style="font-size: 10px;">Login Sebagai</small>
                        <span class="fw-bold text-primary" style="font-size: 13px;"><?php echo strtoupper($role); ?></span>
                    </div>
                    <img src="https://www.w3schools.com/w3images/bandmember.jpg" class="rounded-circle border" width="35" height="35">
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 me-3">
                    <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> Keluar</a></li>
                </ul>
            </div>
        </nav>

        <div class="p-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 15px; min-height: 85vh;">
                <?php
                // --- SWITCH 2: TAMPILAN (VIEW) ---
                switch ($page) {
                    case 'dashboard': include 'views/dashboard.php'; break;
                    case 'outlet': include 'views/outlet/index.php'; break;
                    case 'outlet_tambah': include 'views/outlet/tambah.php'; break;
                    case 'outlet_edit': include 'views/outlet/edit.php'; break;
                    case 'member': include 'views/member/index.php'; break;
                    case 'member_tambah': include 'views/member/tambah.php'; break;
                    case 'member_edit': include 'views/member/edit.php'; break;
                    case 'user': include 'views/user/index.php'; break;
                    case 'user_tambah': include 'views/user/tambah.php'; break;
                    default: include 'views/dashboard.php'; break;
                }
                ?>
            </div>
        </div>
    </div>
</div> 
<?php include 'views/layout/footer.php'; ?>