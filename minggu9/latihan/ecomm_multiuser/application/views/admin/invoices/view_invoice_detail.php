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
                                <table>
                                    <tr>
                                        <td>Status Pembayaran</td>
                                        <td >&nbsp; : &nbsp;</td>
                                        <td><?=$invoice->status?></td>
                                    </tr>
                                    <tr>
                                        <td>Tujuan Pengiriman</td>
                                        <td >&nbsp; : &nbsp;</td>
                                        <td><?=$invoice->tujuan?></td>
                                    </tr>
                                    <tr>
                                        <td>Expedisi</td>
                                        <td >&nbsp; : &nbsp;</td>
                                        <td><?=$invoice->expedisi?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Pengiriman</td>
                                        <td >&nbsp; : &nbsp;</td>
                                        <td><?=$invoice->wkt_pengiriman?></td>
                                    </tr>
                                    <tr>
                                        <td>Ongkos Pengiriman</td>
                                        <td >&nbsp; : &nbsp;</td>
                                        <td><?="Rp. ".number_format($invoice->ongkir)?></td>
                                    </tr>
                                </table>
                                <div class="table-responsive mt-5">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah beli</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                            $total = 0;
                                            foreach($orders as $order) : 
                                            $subtotal = $order->jml_brg * $order->harga;
                                        ?>
                                        <tr>
                                            <td><?=$order->nm_barang?></td>
                                            <td><?="Rp. ".number_format($order->harga)?></td>
                                            <td><?=$order->jml_brg?></td>
                                            <td><?="Rp. ".number_format($subtotal)?></td>
                                        </tr>
                                        <?php 
                                            $total += $subtotal;
                                            endforeach;
                                        ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah beli</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <div class="d-flex justify-content-end font-weight-bold">
                                        <table class="mt-2 mb-5">
                                            <tr>
                                                <td>Total Pembelian</td>
                                                <td >&nbsp; : &nbsp;</td>
                                                <td><?="Rp. ".number_format($total)?></td>
                                            </tr>
                                            <tr>
                                                <td>Ongkos Pengiriman</td>
                                                <td >&nbsp; : &nbsp;</td>
                                                <td><?="Rp. ".number_format($invoice->ongkir)?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Biaya</td>
                                                <td >&nbsp; : &nbsp;</td>
                                                <td><?="Rp. ".number_format($invoice->total_biaya)?></td>
                                            </tr>
                                        </table>
                                    </div>

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
                    dom: 'B',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
        </script>
    </body>
</html>
