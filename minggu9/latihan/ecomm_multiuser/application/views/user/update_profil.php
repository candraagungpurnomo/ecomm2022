<!DOCTYPE html>

<html lang="en">

	<head>

	<?php $this->load->view('user/_partials/head') ?>

	<style>

		.invalid-feedback p{ margin:0px}

	</style>

	</head>

	<body>

		<?php $this->load->view('user/_partials/navbar') ?>

		

		<div style="min-height: 100vh;" class="bg-light pt-md-5 pb-5">

			<div class="col-lg-6 col-md-8 col-12 m-auto">

				<div class="col-12 d-flex justify-content-between">

					<h2>Profile</h2>

					<div><button id="btn-edit" type="button" class="btn btn-sm btn-warning my-2"><i class="fas fa-edit mr-1"></i>Edit</button></div>

				</div>

				<?php if ($this->session->flashdata('success')): ?>

                    <div class="alert alert-success" role="alert">

                        <?php echo $this->session->flashdata('success'); ?>

                    </div>

				<?php endif; ?>

				<?php if ($this->session->flashdata('error')): ?>

                    <div class="alert alert-danger" role="alert">

                        <?php echo $this->session->flashdata('error'); ?>

                    </div>

				<?php endif; ?>

				<form action="" method="post" enctype="multipart/form-data" class="mt-5">

                                    

                    <input type="hidden" name="id" value="<?php echo $konsumenDetail->kd_konsumen?>" />



                    <div class="form-group form-row mb-4">

                        <div class="col-4">

							<div class="img-container border border-2 rounded-circle">

								<img class="rounded-circle" src="<?= $konsumenDetail->foto;?>" alt="">

							</div>

						</div>

						<div class="col d-flex align-items-center">

							<input class="form-control-file" type="file" name="image"/>

							<input type="hidden" name="gambar_lama" value="<?= $konsumenDetail->foto ?>"/>

						</div>

                    </div>                    



                    <div class="form-group form-row">

                        <div class="col">

							<label for="username">Nama Pengguna</label>

							<input id="username" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"

							type="text" name="username" value="<?= $konsumenDetail->username ?>"/>

							<div class="invalid-feedback">

								<?php echo form_error('username') ?>

							</div>

						</div>

						<div class="col">

							<label for="password">Kata Sandi</label>

							<input id="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"

							type="password" name="password"/>

							<div class="invalid-feedback">

								<?php echo form_error('password') ?>

							</div>

						</div>

					</div>

										

					<div class="form-group">

                        <label for="nm_konsumen">Nama Lengkap</label>

                        <input id="nm_konsumen" class="form-control <?php echo form_error('nm_konsumen') ? 'is-invalid':'' ?>"

                        type="text" name="nm_konsumen" value="<?= $konsumenDetail->nm_konsumen ?>"/>

                        <div class="invalid-feedback">

                            <?php echo form_error('nm_konsumen') ?>

                        </div>

					</div>

										

					<div class="form-group">

                        <label for="email">Email</label>

                        <input id="email" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"

                        type="email" name="email" value="<?= $konsumenDetail->email ?>"/>

                        <div class="invalid-feedback">

                            <?php echo form_error('email') ?>

                        </div>

					</div>

										

					<div class="form-group">

                        <label for="no_hp">Nomer Telp/HP.</label>

                        <input id="no_hp" class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>"

                        type="text" name="no_hp" value="<?= $konsumenDetail->no_hp ?>"/>

                        <div class="invalid-feedback">

                            <?php echo form_error('no_hp') ?>

                        </div>

                    </div>



                    <div class="form-group form-row">

                        <div class="col">

							<label for="kodepos">Kode POS</label>

							<input id="kodepos" class="form-control <?php echo form_error('kodepos') ? 'is-invalid':'' ?>"

							type="text" name="kodepos" value="<?= $konsumenDetail->kodepos ?>"/>

							<div class="invalid-feedback">

								<?php echo form_error('kodepos') ?>

							</div>

						</div>

						<div class="col">

							<label for="kota">Kota</label>

							<input id="kota" class="form-control <?php echo form_error('kota') ? 'is-invalid':'' ?>"

							type="text" name="kota" value="<?= $konsumenDetail->kota ?>"/>

							<div class="invalid-feedback">

								<?php echo form_error('Kota') ?>

							</div>

						</div>

					</div>

										

                    <div class="form-group">

                        <label for="alamat">Alamat</label>

                        <textarea id="alamat" class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"

                        type="number" name="alamat" placeholder="alamat Produk" rows="3"><?= $konsumenDetail->alamat ?></textarea>

                        <div class="invalid-feedback">

                            <?php echo form_error('harga') ?>

                        </div>

                    </div>



                    <input class="btn btn-success" type="submit" name="btn" value="Update Biodata" id="submit"/>

                </form>

			</div>

		</div>



		<?php $this->load->view('user/_partials/footer') ?>

		<?php $this->load->view('user/_partials/js') ?>

		<script>

			$(document).ready(function() {

				disablededit();				

				

				$( "#btn-edit" ).click(function() {

					enablededit();

				});



				function disablededit() {

					$('input').attr('readonly', true);

					$('textarea').attr('readonly', true);

					$('#submit').attr('disabled', true);

				}

				function enablededit() {

					$('input').removeAttr('readonly', true);

					$('textarea').removeAttr('readonly', true);

					$('#submit').removeAttr('disabled', true);

				}

			} );

		</script>

	</body>

</html