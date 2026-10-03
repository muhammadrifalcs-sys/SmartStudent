<?php 
session_start();
if (isset($_SESSION['login'])) {
	header("location: media.php?conten=home");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - SMART STUDENT</title>
	<link rel="stylesheet" type="text/css" href="desain/login.css">
	<style>
    body{
        background-image: url('bg.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    </style>
</head>
<body>
<?php 
if (isset($_GET['validasi'])) {
	if($_GET['validasi']=='gagal'){
		$validasi = "Username Atau Password Salah";
	}
}else{
	$validasi = "";
}
?>

<h1 class="judul">POLITEKNIK ISTIKOM BINA CITRA INFORMATIKA</h1>
<h2 style="text-align: center">APLIKASI SMART STUDENT</h2>

<center>
<img src="Rfid.jpeg" style="width: 150px;border-radius: 15px;" />
</center>

<div class="box-login">
	<form action="cek_login.php" method="post">
		<table width="100%">
			<tr>
				<td colspan="2" align="center" class="form-login">Form Login</td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="validasi">
					<?php echo $validasi;?>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td>
					<input type="text" name="username"  class="input-login" id="username"  placeholder="Input Username" required>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password"  class="input-login" id="password"  placeholder="Input Password" required>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" class="btn-login">&#128274; Login</button>
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>