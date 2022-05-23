<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_partials/head.php") ?>
    </head>
    <body class="sb-nav-fixed">
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <div id="layoutSidenav">
            <?php $this->load->view("admin/_partials/sidebar.php") ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                        <!-- Content -->
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php endif; ?>

                            <!-- Card  -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <a href="<?php echo site_url('admin/produk/') ?>"><i class="fas fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                </div>
                                <div class="card-body">

                                    <form action="" method="post" enctype="multipart/form-data">
                                    <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
                                        oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                                        <input type="hidden" name="id" value="<?php echo $product->kd_barang?>" />

                                        <div class="form-group">
                                            <label for="image">Gambar</label>
                                            <input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
                                            type="file" name="image"/>
                                            <input type="hidden" name="gambar_lama" value="<?= $product->gambar ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('image') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input id="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                                            type="text" name="nama" placeholder="Nama Produk" value="<?= $product->nm_barang ?>"/>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama') ?>
                                            </div>
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="col">
                                                <label for="hargabeli">Harga Beli</label>
                                                <input id="hargabeli" class="form-control <?php echo form_error('hargabeli') ? 'is-invalid':'' ?>"
                                                type="number" min="1" name="hargabeli" value="<?= $product->harga_beli ?>"/>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('hargabeli') ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="harga">Harga Jual</label>
                                                <input id="harga" class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
                                                type="number" min="1" name="harga" value="<?= $product->harga ?>"/>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('harga') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="col">
                                                <label for="satuan">Satuan</label>
                                                <input id="satuan" class="form-control <?php echo form_error('satuan') ? 'is-invalid':'' ?>"
                                                type="text" name="satuan" value="<?= $product->satuan ?>"/>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('satuan') ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="stok">Stok Produk</label>
                                                <input id="stok" class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>"
                                                type="number" min="1" name="stok" value="<?= $product->stok ?>"/>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('stok') ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="stokmin">Stok Minimal</label>
                                                <input id="stokmin" class="form-control <?php echo form_error('stokmin') ? 'is-invalid':'' ?>"
                                                type="number" min="0" name="stokmin" value="<?= $product->stok_min ?>"/>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('stokmin') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea id="deskripsi" class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
                                            type="number" name="deskripsi" placeholder="Deskripsi Produk" rows="3"><?= $product->deskripsi ?></textarea>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('harga') ?>
                                            </div>
                                        </div>

                                        <input class="btn btn-success" type="submit" name="btn" value="Save" />
                                    </form>

                                </div>
                        <!-- end ofContent -->
                    </div>
                </main>
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
        </div>
        <?php $this->load->view("admin/_partials/js.php") ?>
    </body>
</html>
