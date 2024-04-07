<?php
if (!defined('APP_ROOT_PATH')) {
    die('Can not access');
}
?>
<link rel="shortcut icon" href="public/img/images (1).png" type="x-icon">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management Student - Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <?php
        $state = trim($_GET['state'] ?? null);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <div class="card card-success mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Login</h3>
                        <br/>
                        <?php if($state === 'error'): ?>
                            <p class="text-danger text-bold text-center">
                                Enter username and password, please !
                            </p>
                        <?php endif; ?>
                        <?php if($state === 'fail'): ?>
                            <p class="text-danger text-bold text-center">
                                Account invalid.
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <form action="index.php?c=login&m=handle" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                            <button class="btn btn-success" type="submit" name="btnLogin"> Submit </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>