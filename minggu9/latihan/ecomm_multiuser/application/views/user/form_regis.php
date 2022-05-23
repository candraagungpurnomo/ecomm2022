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
		
		<div style="min-height: 100vh;" class="bg-light pt-md-5">
			<div class="card col-lg-6 col-md-8 col-12 py-5 m-auto ">
				<div class="card-head"><h3><center> Daftar !</center></h3></div>
				<div class="card-body">
					<?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
							<a href="<?php echo site_url('login');?>" class=""> Masuk disini</a>
                        </div>
					<?php endif; ?>
					<?php if (!$this->session->flashdata('success') && $this->session->flashdata('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
					<?php endif; ?>
					<!-- form -->
					<?=form_open('register', ['class'=>'form-horizontal'])?>
						<div class="form-group row">
							<label class="col-lg-4 col-md-12 col-form-label">Nama Pengguna</label>
							<div class="col-lg-8  col-md-12">
								<input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								name="username" placeholder="Budi" value="<?php echo set_value('username'); ?>">
								<div class="invalid-feedback">
									<span><?php echo form_error('username') ?></span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-md-12 col-form-label">Email</label>
							<div class="col-lg-8  col-md-12">
								<input type="text" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								name="email" placeholder="budi@example.com" value="<?php echo set_value('email'); ?>">
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-md-12 col-form-label">Kata Sandi</label>
							<div class="col-lg-8  col-md-12">
								<input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								name="password" placeholder="Kata Sandi" >
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-md-12 col-form-label">Konfirmasi Kata Sandi</label>
							<div class="col-lg-8  col-md-12">
								<input type="password" class="form-control <?php echo form_error('confpassword') ? 'is-invalid':'' ?>"
								name="confpassword" placeholder="Masukkan ulang kata sandi" >
								<div class="invalid-feedback">
									<?php echo form_error('confpassword') ?>
								</div>
							</div>
						</div>
						<input type="hidden" name="group" value="2"/>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-success">Daftar</button>
						</div>
					</form>
					<div class="register text-center">
						Sudah memiliki akun? <a href="<?php echo site_url('login');?>" class="">Masuk disini</a>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('user/_partials/footer') ?>
		<?php $this->load->view('user/_partials/js') ?>

	</body>
</html