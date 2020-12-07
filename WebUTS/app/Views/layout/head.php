<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel ="stylesheet" href="/css/style.css">
    <title><?=$title;?> </title>
  </head>
  <body>

  <div class="header">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= base_url('/'); ?>">
    <img src="/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
   Admin Perpustakaan
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/'); ?>">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/about'); ?>">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Lainnya
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('/buku'); ?>">Cari Buku</a>
          <a class="dropdown-item" href="<?= base_url('/admin'); ?>">Peminjaman</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>  
    </ul>
  </div>

</div>
</nav>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container text-center text-white ">
  <img src="/img/perpusss.png" width="250px"class="rounded">
  </div>
</div>
<!-- Akhir Jumbotron -->
</div>

