<!DOCTYPE html>
<html lang="en">
	<head>
    <?php $this->load->view('user/_partials/head') ?>
	</head>
	<body>
		<?php $this->load->view('user/_partials/navbar') ?>
        <div style="min-height: 60vh">
            <div class="col-10 m-auto pt-5">
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
                        
                    </table>

                    <div class="table-responsive mt-5 ">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <tfoot></tfoot>
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
		<?php $this->load->view('user/_partials/footer') ?>
		<?php $this->load->view('user/_partials/js') ?>
        <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
                $('#dataTable').DataTable({
                    "dom":  ''
                });
            } );
		</script>

	</body>

</html