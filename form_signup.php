<!DOCTYPE html>
<html>
<head>
	<title>Form signup</title>
	<link rel="icon" href="image/icon.png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- TAG FORM -->
	<a href="index.php"><img src="image/home-icon.png" alt="back" width="50px"></a>
	<div class="login-table">
		<h1>Sign Up</h1>
		<form action="proses_signup.php" method="post">
			<table>
				<tr>
					<td>First Name</td>
					<td><input type="text" name="firstname" autocomplete="off" required/></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" name="lastname" autocomplete="off" required/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="Email" name="email" required/></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" required/></td>
				</tr>
				<tr>
					<td>Retype Password</td>
					<td><input type="password" name="retypepassword" required/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Sign Up"></td>
				</tr>
				<tr>
					<td colspan="2">
						<?php
							require 'koneksi.php';
							session_start();
							if (isset($_SESSION['first_name'])){
								$msg = "Jika ingin menggunakan akun lain silahkan untuk logout terlebih dahulu!";
							}
							else {
								$msg = "Sudah punya akun? <a href='form_signin.html'>Masuk disini!</a>";
							}
						 ?>
						<center><br>
							<?php echo $msg; ?>
						</center>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
