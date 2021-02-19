<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col menu_fixed">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="<?= site_url("Admin") ?>" class="site_title"><i class="fa fa-pie-chart"></i> <span>SIPELIK</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="<?= base_url("assets/image/avatar5.png") ?>" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2><?= $akun['nama']; ?></h2>
            <span><?= $akun['username']; ?></span>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <!-- <h3>SI LAB</h3> -->
            <ul class="nav side-menu">
              <li><a href="<?= site_url("Admin") ?>"><i class="fa fa-home"></i> HOME </a></li>

              <?php if ($this->session->userdata('id_role') == "1") { ?>
                <li><a><i class="fa fa-key"></i> MASTER DATA USER<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?= site_url("Admin/data_user") ?>">Master Data Super Admin</a></li>
                    <li><a href="<?= site_url("Admin/data_user") ?>">Master Data Admin Provinsi</a></li>
                    <li><a href="<?= site_url("Admin/data_user") ?>">Master Data Admin Kabupaten</a></li>
                    <li><a href="<?= site_url("Admin/data_user") ?>">Master Data Admin Kecamatan</a></li>
                  </ul>
                </li>
                <?php } ?>
                <?php if ($this->session->userdata('id_role') == "1") { ?>
                <li><a><i class="fa fa-key"></i> MASTER DATA KONFLIK <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?= site_url("Admin/data_konflik") ?>">Master Data Jenis Konflik</a></li>
                    <li><a href="<?= site_url("Admin/data_lokasi") ?>">Master Data Konflik Provinsi</a></li>
                    <li><a href="<?= site_url("Admin/data_kabupaten") ?>">Master Data Konflik Kabupaten</a></li>
                    <li><a href="<?= site_url("Admin/data_kecamatan") ?>">Master Data Konflik Kecamatan</a></li>
                  </ul>
                </li>
              <?php } ?>
              <?php if ($this->session->userdata('id_role') == "1") { ?>
                <li><a href="<?= site_url('Map/v_map') ?>"><i class="fa fa-search"></i> PETA KONFLIK </a></li>
              <?php } else { ?>
                <li><a href="<?= site_url('Admin/v_map'); ?>"><i class="fa fa-search"></i> PELAPORAN </a></li>
              <?php } ?>
              <li><a href="<?= site_url("Admin/v_grafik") ?>"><i class="fa fa-pie-chart"></i> GRAFIK</a></li>
            </ul>
          </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="fa fa-gears" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="fa fa-arrows-alt" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="fa  fa-eye-slash" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('Auth/logout'); ?>">
            <span class="fa fa-sign-out" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
          <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <img src="images/img.jpg" alt=""><?= $akun['nama']; ?>
              </a>
              <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="javascript:;"> Profile</a>
                <a class="dropdown-item" href="javascript:;">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Settings</span>
                </a>
                <a class="dropdown-item" href="javascript:;">Help</a>
                <a class="dropdown-item" href="<?= base_url('Auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">

      <!-- <div class="row"> -->
      <!-- <div class="col-md-12 col-sm-12 "> -->
      <?php $this->load->view($content); ?>
      <!-- </div> -->
      <!-- </div> -->
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        Sipelik</a>
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
  </div>
</div>