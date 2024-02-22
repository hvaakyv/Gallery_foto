<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHOTOKYV</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="asset/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
          <h1>PHOTOKYV</h1>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link " href="home.php" aria-expanded="false">
                <span>
                  <i class="ti ti-photo"></i>
                </span>
                <span class="hide-menu ">Images</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                <i class="ti ti-photo-heart"></i>
                </span>
                <span class="hide-menu">All Post</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="album.php" aria-expanded="false">
                <span>
                 <i class="ti ti-album"></i>
                </span>
                <span class="active hide-menu">Album</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="logout.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="asset/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
      <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                  <form  action="update_album.php" method="post" enctype="multipart/form-data">

                  <?php
           include "koneksi.php";
           $albumid=$_GET['albumid'];
           $sql=mysqli_query($conn,"select * from album where albumid='$albumid'");
           while($data=mysqli_fetch_array($sql)){
       ?>

        <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
                  <div class="mb-3">
                      <label for="namaalbum" class="form-label">Judul Foto </label>
                      <input type="text" class="form-control"name="namaalbum" id="namaalbum" value="<?=$data['namaalbum']?>">
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi Foto</label>
                      <input type="text" class="form-control" name="deskripsi" id="deskripsi"  value="<?=$data['deskripsi']?>">
                    </div>   
                    <?php
            }
        ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <script src="asset/libs/jquery/dist/jquery.min.js"></script>
  <script src="asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="asset/js/sidebarmenu.js"></script>
  <script src="asset/js/app.min.js"></script>
  <script src="asset/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="asset/libs/simplebar/dist/simplebar.js"></script>
  <script src="asset/js/dashboard.js"></script>
</body>

</html>