<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark border-right border-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <ul class="m-0 p-0 pt-4">
                    <!-- <a class="nav-link" href="<?php //echo site_url('admin') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a> -->
                    
                    <h6 class="m-0 p-0">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produk" aria-expanded="false" aria-controls="produk">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Produk
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    </h6>
                    <div class="collapse" id="produk" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo site_url('admin/produk') ?>">Daftar Produk</a>
                            <a class="nav-link" href="<?php echo site_url('admin/produk/tambah') ?>">Tambah Produk</a>
                        </nav>
                    </div>
                    
                    <h6 class="m-0 p-0">
                    <a class="nav-link" href="<?php echo site_url('admin/penjualan') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Penjualan
                    </a>
                    </h6>

                    <h6 class="m-0 p-0">
                    <a class="nav-link" href="<?php echo site_url('admin/konsumen') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Konsumen
                    </a>
                    </h6>

                    <!-- <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Pengaturan
                    </a> -->
                </ul>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <span class="font-weight-bold"><?=$this->session->userdata('username')?></span>
        </div>
    </nav>
</div>