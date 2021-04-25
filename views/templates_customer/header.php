<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;600&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>style/main.css" />

  <title>Rental Mobil</title>
</head>

<body>
  <div class="preloader">
    <div class="loading">
      <img src="<?php echo base_url('assets/assets_shop/') ?>image/preloader.gif" alt="Preloader" />
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3 sticky-top">
    <div class="container">
      <a class="navbar-brand font-weight-bold" href="<?php echo base_url('customer/dashboard') ?>"><i
          class="fas fa-car"></i> RENTAL MOBIL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link mr-3" href="<?php echo base_url('customer/dashboard') ?>">Home <span
                class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-3" href="<?php echo base_url('customer/data_mobil') ?>">Mobil</a>
          </li>

          <?php if($this->session->userdata('nama')) { ?>
          <li class="nav-item">
            <a class="nav-link mr-3" href="<?php echo base_url('auth/logout') ?>"> <span class="text-warning">Welcome
                <?php echo $this->session->userdata('nama') ?></span>
              | Logout</a>
          </li>

          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link mr-3" href="<?php echo base_url('auth/login') ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="<?php echo base_url('register') ?>">Register</a>
          </li>
          <?php } ?>

        </ul>
      </div>
    </div>
  </nav>