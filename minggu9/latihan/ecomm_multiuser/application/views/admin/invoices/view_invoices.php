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
                                                <th>No nota</th>
                                                <th>Konsumen</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Tujuan</th>
                                                <th>Total Biaya</th>
                                                <th>Status Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No nota</th>
                                                <th>Konsumen</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Tujuan</th>
                                                <th>Total Biaya</th>
                                                <th>Status Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach($invoices as $invoice) : ?>
                                            <tr>
                                                <td><?=$invoice->no_nota?></td>
                                                <td><?=$invoice->nm_konsumen."<br>(".$invoice->email.")"?></td>
                                                <td><?=$invoice->tgl_jual?></td>
                                                <td><?=$invoice->tujuan?></td>
                                                <td class="text-right">Rp. <?=number_format($invoice->total_biaya)?></td>
                                                <td>
                                                    <?php if($invoice->status=="Sudah dibayar"){?>
                                                        <?=$invoice->status?><br>
                                                        <button type="button btn-sm" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$invoice->no_nota?>">
                                                            <small>Lihat Bukti Pembayaran</small>
                                                        </button>
                                                    <?php }else{
                                                        echo "<span class='text-danger font-weight-bold'>Belum Dibayar</span>";
                                                    } ?>
                                                    
                                                </td>
                                                <td>
                                                    <?=anchor(	'admin/penjualan/detail/' . $invoice->no_nota, 'Details',['class'=>'btn btn-primary btn-sm'])?> 
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?=$invoice->no_nota?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="<?=base_url('uploads/bukti/').$invoice->image?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

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
                        {
                            extend: 'copy',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                            }
                        },
                        {
                            extend: 'csv',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                            }
                        },
                        
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                            }
                        },
                        
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                            }
                        },
                    ]
                } );
            } );

        </script>
    </body>

</html>

