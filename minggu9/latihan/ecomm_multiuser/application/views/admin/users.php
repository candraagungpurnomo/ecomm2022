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

                                &nbsp;

                            </div>

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                        <thead>

                                            <tr>

                                                <th class="align-middle">Kode Konsumen</th>

                                                <th class="align-middle">Foto</th>

                                                <th class="align-middle">Username</th>

                                                <th class="align-middle">Nama Konsumen</th>

                                                <th class="align-middle">Email</th>

                                                <th class="align-middle">Alamat</th>

                                                <th class="align-middle">Kode POS</th>

                                                <th class="align-middle">No. HP</th>

                                            </tr>

                                        </thead>

                                        <tfoot>

                                            <tr>

                                                <th class="align-middle">Kode Konsumen</th>

                                                <th class="align-middle">Foto</th>

                                                <th class="align-middle">Username</th>

                                                <th class="align-middle">Nama Konsumen</th>

                                                <th class="align-middle">Email</th>

                                                <th class="align-middle">Alamat</th>

                                                <th class="align-middle">Kode POS</th>

                                                <th class="align-middle">No. HP</th>

                                            </tr>

                                        </tfoot>

                                        <tbody>

                                        

                                        <?php foreach($users as $user) : ?>

                                            <tr>

                                                <td width="2"><?=$user->kd_konsumen?></td>

                                                <td><img src="<?php echo base_url('assets/images/'.$user->foto) ?>" height="75" class="mx-auto d-block"/></td>

                                                <td><?=$user->username?></td>

                                                <td><?=$user->nm_konsumen?></td>

                                                <td><?=$user->email?></td>

                                                <td><?=$user->alamat?></td>

                                                <td><?=$user->kodepos?></td>

                                                <td><?=$user->no_hp?></td>

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

