<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Mazer Admin Dashboard</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/home/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/home/favicon-32x32.png'); ?>"> <!-- ini icon title --->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/home/favicon-16x16.png'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/pages/error.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/pages/auth.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/vendors/iconly/bold.css'); ?>">
</head>

<body>
    <div id="error">


        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
            <img class="img-error" src="<?php echo base_url('assets/admin/dist/assets/images/samples/error-404.png'); ?>" alt="Not Found">
                <div class="text-center">
                    <h1 class="error-title">NOT FOUND</h1>
                    <p class='fs-5 text-gray-600'>The page you are looking not found.</p>
                    <a href="<?php echo site_url('home'); ?>" class="btn btn-lg btn-outline-success mt-3">Go Home</a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>