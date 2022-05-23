<?php
// Cek apakah terdapat cookie dengan nama message
if(isset($_COOKIE["message"])){ // Jika ada
echo '<div class="alert alert-danger">'.$_COOKIE["message"].'</div>'; // Tampilkan pesannya

setcookie("message","delete",time()-1, "/"); // Kita delete cookie message
}
?>

<form method="post" action="system/login.php">
<div class="form-group">
<label>Username</label>
<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" name="password" placeholder="Password" required>
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
