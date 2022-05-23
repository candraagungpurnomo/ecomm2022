<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">

    <button class="btn btn-link btn-lg order-1 order-lg-0 text-white ml-2" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    <a class="navbar-brand pl-1" href="<?php echo site_url('admin')?>">Admin UMKM Jatimakmur</a>

    <!-- Navbar Search-->

    <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

        <div class="input-group">

            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />

            <div class="input-group-append">

                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>

            </div>

        </div>

    </form> -->

    <!-- Navbar-->

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle text-white" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw mr-2"></i><?=$this->session->userdata('username')?></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="#">Settings</a><a class="dropdown-itetim"kmu href="#">Activity Log</a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="<?php echo site_url('login/logout')?>">Logout</a>

            </div>

        </li>

    </ul>

</nav>