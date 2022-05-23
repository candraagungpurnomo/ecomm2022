<!DOCTYPE html>
<html lang="en">
	<head>
    <?php $this->load->view('user/_partials/head') ?>
	</head>
	<body>
		<?php $this->load->view('user/_partials/navbar') ?>
        <div style="min-height: 60vh">
            <div class="col-10 m-auto">
                    <div class="table-responsive mt-5">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No nota</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Dikirim ke</th>
                                    <th>Total Biaya</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Detail Pembelian</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No nota</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Dikirim ke</th>
                                    <th>Total Biaya</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Detail Pembelian</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach($invoices as $invoice) : ?>
                                <tr>
                                    <td><?=$invoice->no_nota?></td>
                                    <td><?=$invoice->tgl_jual?></td>
                                    <td><?=$invoice->tujuan?></td>
                                    <td class="text-right">Rp. <?=number_format($invoice->total_biaya)?></td>
                            <td> 
                                <?php if(isset($invoice->image)){?>
                                    <img src="<?=base_url('uploads/bukti/').$invoice->image?>" height="50px">
                                <?php
                                    }else{echo "Anda belum upload<br> bukti pembayaran";
                                        echo "<br><small class='text-danger'>bayar sebelum ".date("j F", strtotime($invoice->due_date))."</small>";} 
                                ?>
                            </td> 
                                    <td>
                                        <?=$invoice->status?>
                                        <?php 
                                            if($invoice->status=="Belum dibayar"){
                                               echo anchor(	'order/update_bayar/' . $invoice->no_nota, 'Bayar',['class'=>'btn btn-danger btn-sm btn-pay']); 
                                            }else if($invoice->status=="Sudah dibayar"){
                                                echo anchor(	'order/printNota/' . $invoice->no_nota, 'Cetak Nota',['class'=>'btn btn-success btn-sm ']);
                                            }
                                        ?>
                                        
                                    </td>
                                    <td ><?=anchor(	'order/my_order_detail/' . $invoice->no_nota, 'Lihat Detail',['class'=>'btn btn-info btn-sm'])?> </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
		<?php $this->load->view('user/_partials/footer') ?>
		<?php $this->load->view('user/_partials/js') ?>
        <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
                $('#dataTable').DataTable();
            } );
		</script>

	</body>
</html>