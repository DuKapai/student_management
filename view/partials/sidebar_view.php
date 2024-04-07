<?php
if (!defined('APP_ROOT_PATH')) {
    die('Can not access');
}
$modulePage = trim($_GET['c'] ?? null);
$modulePage = strtolower($modulePage);
?>
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="public/img/DuKapai 1_1.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="pull-left">
                <?= getSessionUsername(); ?>
            </a>
            <form class="d-inline-block" method="post" action="index.php?c=login&m=logout">
                <button type="submit" class="btn btn-success" name="btnLogout"> Logout </button>
            </form>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="index.php?c=dashboard" class="nav-link <?= $modulePage == 'dashboard' ? 'active' : null; ?> ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?c=department" class="nav-link <?= $modulePage == 'department' ? 'active' : null; ?>">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Departments
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?c=course" class="nav-link <?= $modulePage == 'course' ? 'active' : null; ?>">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Courses
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?c=classroom" class="nav-link <?= $modulePage == 'classroom' ? 'active' : null; ?>">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Class rooms
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?c=account" class="nav-link <?= $modulePage == 'account' ? 'active' : null; ?>">
                    <i class="nav-icon fas fa-tree"></i>
                    <p>
                        Account
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Users
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Teachers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Students</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>