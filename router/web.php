<?php
// routing : duong dan truy cap
// http://localhost/students/index.php?c=login&m=index
// c : ten cua controller nam trong thu muc controller
$c = trim($_GET['c'] ?? 'login');
$c = ucfirst($c); // viet hoa chua cai dau tien
// vd : LoginController

switch ($c) {
    case 'Login':
        require APP_PATH_CONTROLLER . 'LoginController.php';
        break;
    case 'Dashboard':
        require APP_PATH_CONTROLLER . 'DashboardController.php';
        break;
    case 'Department':
        require APP_PATH_CONTROLLER . 'DepartmentController.php';
        break;
    case 'Course':
        require APP_PATH_CONTROLLER . 'CourseController.php';
        break;
    case 'Classroom':
        require APP_PATH_CONTROLLER . 'ClassroomController.php';
        break;
    case 'Account':
        require APP_PATH_CONTROLLER . 'AccountController.php';
        break;
    default:
        echo 'Not found request';
        break;
}
