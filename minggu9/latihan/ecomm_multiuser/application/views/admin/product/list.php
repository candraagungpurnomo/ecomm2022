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

                        <div class="card mb-4">

                            <div class="card-header">

                                <a href="<?php echo site_url('admin/produk/tambah') ?>"><i class="fas fa-plus"></i> Tambah Produk</a>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                        <thead>

                                            <tr>

                                                <th class="align-middle">Gambar</th>

                                                <th class="align-middle">Produk</th>

                                                <th class="align-middle">Satuan</th>

                                                <th class="align-middle">Stok Minimal</th>

                                                <th class="align-middle">Stok Tersisa</th>

                                                <th class="align-middle">Harga Beli</th>

                                                <th class="align-middle">Harga Jual</th>

                                                <th class="align-middle">Deskripsi</th>

                                                <th class="align-middle">Aksi</th>

                                            </tr>

                                        </thead>

                                        <tfoot>

                                            <tr>

                                                <th class="align-middle">Gambar</th>

                                                <th class="align-middle">Produk</th>

                                                <th class="align-middle">Satuan</th>

                                                <th class="align-middle">Stok Minimal</th>

                                                <th class="align-middle">Stok Tersisa</th>

                                                <th class="align-middle">Harga Beli</th>

                                                <th class="align-middle">Harga Jual</th>

                                                <th class="align-middle">Deskripsi</th>

                                                <th class="align-middle">Aksi</th>

                                            </tr>

                                        </tfoot>

                                        <tbody>

                                        

                                        <?php 

                                            // $no = 0;

                                            foreach ($products as $product): 

                                            // $no++;

                                        ?>

                                        <tr>

                                            <td>

                                                <img src="<?php echo base_url('assets/images/'.$product->gambar) ?>" height="75" class="mx-auto d-block"/>

                                            </td>

                                            <td>

                                                <?= $product->nm_barang ?>

                                            </td>

                                            <td>

                                                <?= $product->satuan ?>

                                            </td>

                                            <td>

                                                <?= $product->stok_min ?>

                                            </td>

                                            <td>

                                                <?= $product->stok ?>

                                            </td>

                                            <td>

                                                <?= 'Rp.&nbsp;'.number_format($product->harga_beli) ?>

                                            </td>

                                            <td>

                                            <?= 'Rp.&nbsp;'.number_format($product->harga) ?>

                                            </td>

                                            <td>

                                                <?= $product->deskripsi ?>

                                            </td>

                                            <td class="text-center">

                                                <a href="<?php echo site_url('admin/produk/edit/'.$product->kd_barang) ?>"

                                                class="btn btn-small d-inline-flex"><i class="fas fa-edit mr-1"></i> Edit</a>

                                                <a onclick="deleteConfirm('<?php echo site_url('admin/produk/hapus/'.$product->kd_barang) ?>')"

                                                href="#!" class="btn btn-small text-danger d-inline-flex"><i class="fas fa-trash mr-1"></i> Hapus</a>

                                            </td>

                                        </tr>

                                        <?php endforeach; ?>



                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </main>

                <?php $this->load->view("admin/_partials/footer.php") ?>

            </div>

        </div>

        <?php $this->load->view("admin/_partials/js.php") ?>

        <?php $this->load->view("admin/_partials/modal.php") ?>

        <script>

            function deleteConfirm(url){

                $('#btn-delete').attr('href', url);

                $('#deleteModal').modal();

            }

            $(document).ready(function() {
                $('#dataTable').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );          


        </script>

    </body>

</html>

