<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('welcome/') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DFStore</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('welcome/') ?>">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Halaman Utama</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kategori
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-tshirt"></i>
                    <span>Pakaian</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('kategori/pakaian_pria') ?>">Pakaian Pria</a>
                        <a class="collapse-item" href="<?php echo base_url('kategori/pakaian_wanita') ?>">Pakaian Wanita</a>
                        <a class="collapse-item" href="<?php echo base_url('kategori/pakaian_anak') ?>">Pakaian Anak</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('kategori/elektronik') ?>">
                    <i class="fas fa-fw fa-tv"></i>
                    <span>Elektronik</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('kategori/kebutuhan_pokok') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Kebutuhan Pokok</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('kategori/kesehatan') ?>">
                    <i class="fas fa-fw fa-futbol"></i>
                    <span>Kesehatan</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Informasi
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('kategori/aboutus') ?>">
                    <i class="fas fa-fw fa-exclamation-circle"></i>
                    <span>Tentang Kami</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('kategori/klien') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Klien Kami</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('kategori/kontak') ?>">
                    <i class="fas fa-fw fa-phone"></i>
                    <span>Kontak</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <button class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-target="#filter"><i class="fas fa-sm fa-filter mr-2"></i>Filter</button>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#filterharga"><i class="fas fa-sm fa-filter mr-2"></i>Harga</button>

                    <!-- Topbar Search -->
                    <form method="post" action="<?php echo base_url().'welcome/search' ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Cari barang...">
                            <?php echo form_error('keyword'); ?>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                        </div>
                    </form>
                    
                        <div class="navbar">
                            <ul class="nav navbar-nav navbar -right">
                                <li>
                                    <?php 
                                    $keranjang = '<i class="fas fa-fw fa-shopping-cart"></i> '.$this->cart->total_items().' item(s)'
                                    ?>

                                    <?php echo anchor('dashboard/detail_keranjang',$keranjang)  ?>
                                </li>
                            </ul>

                            <ul class="na navbar-nav navbar-right">
                                <?php if($this->session->userdata('username')) { ?>
                                    <li><div>Selamat Datang <?php echo $this->session->userdata('username') ?></div></li>
                                    <li class="ml-2"><?php echo anchor('auth/logout','Logout') ?></li>
                                <?php } else { ?>
                                    <li><?php echo anchor('auth/login','Login') ?></li>
                                <?php } ?>
                            </ul>
                            
                        </div>

                    </ul>

                </nav>
                <!-- End of Topbar -->

<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Pencarian Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url().'welcome/filter';?>" method="post" enctype="multipart/form-control">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control">
                <?php echo form_error('nama_brg'); ?>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                  <option value="Pakaian Pria">Pakaian Pria</option>
                  <option value="Pakaian Wanita">Pakaian Wanita</option>
                  <option value="Pakaian Anak">Pakaian Anak</option>
                  <option value="Elektronik">Elektronik</option>
                  <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
                  <option value="Kesehatan">Kesehatan</option>
                </select>
            </div>
            
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="filterharga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Pencarian Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url().'welcome/filterharga';?>" method="post" enctype="multipart/form-control">
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                  <option value="Pakaian Pria">Pakaian Pria</option>
                  <option value="Pakaian Wanita">Pakaian Wanita</option>
                  <option value="Pakaian Anak">Pakaian Anak</option>
                  <option value="Elektronik">Elektronik</option>
                  <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
                  <option value="Kesehatan">Kesehatan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Harga Minimum</label>
                <input type="number" name="hargamin" class="form-control">
            </div>
            <div class="form-group">
                <label>Harga Maksimal</label>
                <input type="number" name="hargamax" class="form-control">
            </div>
            
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
