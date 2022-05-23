<!DOCTYPE html>

<html lang="en">

	<head>

        <?php $this->load->view('user/_partials/head') ?>
		<style>
			input[type="radio"]{
				-webkit-appearance: none;
			}
			input[type="radio"] + label{
				background-color: #f0f0f0;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			input[type="radio"]:checked + label{
				background-color: #ffffff;
				box-shadow: 0 5px 15px 5px rgb(0,0,0,0.1);
			}

		</style>
		
	</head>

	<body>

		<?php $this->load->view('user/_partials/navbar') ?>

		<div  style="min-height: 80vh">

			<div class="row my-5 col-lg-8 mx-auto">

				<div class="table-responsive">

					<table class="table table-bordered table-striped table-hover"  id="dataTable" width="100%" cellspacing="0">

						<thead>

							<tr>

								<th>No</th>

								<th>Gambar</th>

								<th>Produk</th>

								<th>Jumlah</th>

								<th class="text-right">Harga</th>

								<th class="text-right">Subtotal</th>

								<th class="text-center">Aksi</th>

							</tr>

						</thead>

						<tbody class="detail_cart"></tbody>

					</table>

				</div>

				<div class="card col-12 px-5 pt-5 pb-4">
					
				<div id="overlay">
					<div class="w-100 d-flex justify-content-center align-items-center">
						<div class="spinner"></div>
					</div>
				</div>

					<form action="<?=site_url('order')?>" method="post">
						<div class="form-group">
							<label for="alamat">Dikirim ke</label>
							<textarea name="alamat" id="alamat" class="form-control"></textarea>
						</div>
						<div class="form-row">
							<div class="form-group col">
								<label for="province">Provinsi</label>
								<select class="form-control form-control-sm autocomplete" id="province" name="province">
								<option selected>-- Pilih Provinsi --</option>
								<?php
									$data = json_decode($province, true);
									for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
										echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
									}
								?>
								</select>
							</div>
							<div class="form-group col">
								<label for="kabKota">Kab/Kota</label>
								<select class="form-control form-control-sm autocomplete" id="kabKota" name="kabKota">
								<option selected>-- Pilih Kab/Kota --</option>
								
								</select>
							</div>
						</div>
						<div class="form-group">
							<label>Jasa Pengiriman</label>
							<div class="form-control border-0">

							<div class="col-8 m-auto card-group pl-2 justify-content-center">
								<input type="radio" name="kurir" value="pos" id="pos" checked>
								<label for="pos" class="col-2 card mr-2">
								<img src="<?= base_url('assets/images/kurir/pos.png')?>" class="col-12 m-auto p-1">
								</label>

								<input type="radio" name="kurir" value="jne" id="jne">
								<label for="jne" class="col-2 card mr-2 ">
								<img src="<?= base_url('assets/images/kurir/jne.png')?>" class="col-12 m-auto p-1">
								</label>

								<input type="radio" name="kurir" value="tiki" id="tiki">
								<label for="tiki" class="col-2 card mr-2">
								<img src="<?= base_url('assets/images/kurir/tiki.png')?>" class="col-12 m-auto p-1">
								</label>
							</div>

							</div>
						</div>
						<div class="form-group">
							<label>Biaya Pengiriman</label>
							<div class="col-12 d-flex flex-column" id="biaya">
							
							</div>
						</div>

						
						<div class="col-12 mt-4" id="totals">
							<div class=" col-6 row ml-auto px-3 py-2 bg-light">
									<div class="col-6 text-muted">Total Pesanan</div>
									<div class="col-6 text-right text-muted" id="total2">Rp. 0</div>
									<div class="col-6 text-muted">Biaya Pengiriman</div>
									<div class="col-6 text-right text-muted" id="ongkir">Rp. 0</div>
									<div class="col-6 font-weight-bold">Total Bayar</div>
									<div class="col-6 text-right font-weight-bold" id="totalAll">Rp. 0</div>
							</div>
						</div>

						<input type="hidden" name="fexpedisi" id="fexpedisi">
						<input type="hidden" name="fetd" id="fetd">
						<input type="hidden" name="fongkir" id="fongkir">

						<div class="form-group text-center mt-3 mb-0">
							<button type="submit" class="btn btn-success btn-checkout">Checkout</button>
						</div>

					</form>

				</div>

			</div>

		</div>

		<?php $this->load->view('user/_partials/footer') ?>

		<?php $this->load->view('user/_partials/js') ?>
		<script>

			$('.cart-nav').remove();

			$(document).ready(function() {

				var ongkir;
				var total;

				//disable select kabupaten sebelum pilih provinsi
				$('#kabKota').attr('disabled', true);
				$('.btn-checkout').prop('disabled', true);

				// Load shopping cart
				$('.detail_cart').load("<?php echo base_url();?>index.php/produk/load_cart",function(){
					$('#total2').html($('#total').html());
					$('#totalAll').html($('#total').html());
				});

				//Hapus Item Cart
				$(document).on('click','.hapus_cart',function(){
					var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
					$.ajax({
						url : "<?php echo base_url();?>index.php/produk/hapus_cart",
						headers: {  'Access-Control-Allow-Origin': '*' },
						method : "POST",
						data : {row_id : row_id},
						success :function(data){
							$('.detail_cart').html(data);
							$('#total2').html($('#total').html());

							$('#totalAll').html( parseInt(total) + parseInt(ongkir) );
							$('#totalAll').formatCurrency();
						}
					});					
				});

				//ketika provinsi dipilih
				$('#province').change(function(){ 
					loading_on();
					$('.btn-checkout').prop('disabled', true);;
					var id=$(this).val();
					$.ajax({
						url : "<?php echo site_url('produk/load_kabKota');?>",
						headers: {  'Access-Control-Allow-Origin': '*' },
						method : "POST",
						data : {id: id},
						async : true,
						success: function(data){
							$('#kabKota').html(data); //mengisi option pada kab/kota
							$('#biaya').html("");	//membuat div biaya kosong
							$('#kabKota').attr('disabled', false);
							loading_off();
	
						}
					});
					return false;
				}); 
				
				//ketika kabupaten dipilih
				$('#kabKota').change(function(){ 
					loading_on();
					$('.btn-checkout').prop('disabled', true);
					$('input:radio[name=kurir]').filter('[value=pos]').prop('checked', true);
					var kab=$('#kabKota').val();
					var kurir= 'pos';
					
					load_ongkir(kab,kurir);
					return false;
				}); 
				
				//ketika kurir dipilih	
				$('input[name="kurir"]').change(function(){ 
					loading_on();
					$('.btn-checkout').prop('disabled', true);
					$('#ongkir').html('Rp. 0');
					$('#totalAll').html($('#total').html());

					$('#fexpedisi').val("");
					$('#fetd').val("");
					$('#fongkir').val("");

					var kab=$('#kabKota').val();
					var kurir=$(this).val();
					load_ongkir(kab,kurir);

					return false;
				}); 

				 
				function load_ongkir(kab,kurir){
					$.ajax({
						url : "<?php echo site_url('produk/load_ongkir');?>",
						headers: {  'Access-Control-Allow-Origin': '*' },
						method : "POST",
						data : {kab: kab, kurir: kurir},
						async : true,
						success: function(data){
							if(kab>0){
								$('#biaya').html(data);
								loading_off();
								//ketika ongkir dipilih	
								$('input[name="ongkir"]').change(function(){ 
									ongkir=$(this).val();
									$('#ongkir').html(ongkir);
									$('#ongkir').formatCurrency();

									total = $('#total').html().replace('Rp. ','').replace(',','');
									$('#totalAll').html( parseInt(total) + parseInt(ongkir) );
									$('#totalAll').formatCurrency();

									$('#fexpedisi').val($('#sexpedisi').html());
									$('#fetd').val($('#setd').html());
									$('#fongkir').val(ongkir);

									$('.btn-checkout').prop('disabled', false);
								});
							}
						}
					});
				}

				function loading_on() {
					document.getElementById("overlay").style.display = "flex";
				}

				function loading_off() {
					document.getElementById("overlay").style.display = "none";
				}
				

			} );

		</script>

	</body>

</html>