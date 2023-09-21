<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">

    <!-- script for js and jquery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <script src="<?php echo base_url('assets/bootstrap/jquery/jquery-3.6.4.min.js'); ?>"></script>


    <!-- css for this page  -->
    <link rel="stylesheet" type="text/css" href="../assets/css/welcomepage.css">

</head>

<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 logo-head">
                            <a class="navbar-brand" href="<?php echo base_url('buyer_dash/Buyer_dashboard'); ?>">
                                <img src="../assets/image/logo.png" height="45 alt=" art">
                                <?php echo $this->session->userdata('firstname'); ?> <?php echo $this->session->userdata('lastname'); ?></h1>
                            </a>
                        </div>
                    </div>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('buyer_dash/Buyer_dashboard'); ?>"><b>Home</b> <span class="sr-only"></span></a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="artDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b>Art</b>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="artDropdown">
                            <a class="dropdown-item" href="<?php echo base_url('buyer_dash/Avilable_art'); ?>">Avilable</a>
                            <a class="dropdown-item" href="<?php echo base_url('Arttype/Sold_art'); ?>">Sold</a>
                            <a class="dropdown-item" href="<?php echo base_url('Arttype/Expired_art'); ?>">Expired</a>
                        </div>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('buyer_dash/My_order'); ?>" class="nav-link"><b>My Order</b></a>

                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('buyer_dash/My_sold'); ?>" class="nav-link"><b>My Collection</b></a>

                    </li>


                    <!-- TODO: user login and registration -->
                    <li class="nav-item">
                        <!-- <a href="admin/login.php" class="nav-link"><b>Admin</b></a> -->
                        <a href="<?php echo base_url('admin_dash/Admin_dashboard/log'); ?>" class="nav-link"><b>Logout</b></a>

                    </li>

                </ul>


            </div>
        </nav>
        <hr class="my-1">

    </div>