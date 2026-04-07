<?php $role = $_SESSION['role']; ?>
<div class="sidebar d-flex flex-column flex-shrink-0">
    <ul class="nav nav-pills flex-column mb-auto mt-3">
        <li class="nav-item">
            <a href="index.php?page=dashboard" class="nav-link <?= ($page == 'dashboard') ? 'active' : '' ?>">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <hr class="mx-3 my-2 border-secondary opacity-25">
        <small class="px-4 text-uppercase text-muted" style="font-size: 0.7rem;">Data Master</small>

        <li>
            <a href="index.php?page=outlet" class="nav-link <?= (strpos($page, 'outlet') !== false) ? 'active' : '' ?>">
                <i class="bi bi-shop me-2"></i> Data Outlet
            </a>
        </li>

        <li>
            <a href="index.php?page=member" class="nav-link <?= (strpos($page, 'member') !== false) ? 'active' : '' ?>">
                <i class="bi bi-people me-2"></i> Data Member
            </a>
        </li>

        <?php if($role === 'admin'): ?>
        <!-- <hr class="mx-3 my-2 border-secondary opacity-25">
        -->
        <?php endif; ?>
    </ul>
</div>