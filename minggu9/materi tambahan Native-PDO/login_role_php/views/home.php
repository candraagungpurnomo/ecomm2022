<h2 style="margin-top: 0;">
<small>Selamat datang</small>
<br />
<?php echo $_SESSION['nama'] ?>
</h2>
<hr />

<div class="form-group">
<label>Role</label>
<br /><?php echo ucwords($_SESSION['role']) ?>
</div>

<?php
// Cek role user
if($_SESSION['role'] == 'admin'){ // Jika role-nya admin
?>
<div class="form-group">
<label>Hak Akses</label>
<br />
<ol style="margin-left: -25px;">
<li>
Akses menu home. Aksi yang diperbolehkan : Read
</li>
<li>
Akses menu berita. Aksi yang diperbolehkan : Create, Read, Update, Delete
</li>
<li>
Akses menu pengguna. Aksi yang diperbolehkan : Create, Read, Update, Delete
</li>
<li>
Akses menu Kontak. Aksi yang diperbolehkan : Read
</li>
</ol>
</div>
<?php
}else{ // Jika role-nya operator
?>
<div class="form-group">
<label>Hak Akses</label>
<br />
<ol style="margin-left: -25px;">
<li>
Akses menu home. Aksi yang diperbolehkan : Read
</li>
<li>
Akses menu berita. Aksi yang diperbolehkan : Read, Update, Delete
<li>
Akses menu Kontak. Aksi yang diperbolehkan : Read
</li>
</ol>
</div>
<?php
}
?>
