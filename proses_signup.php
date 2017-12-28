<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$first = $_POST['firstname'];
		$last = $_POST['lastname'];
		$email  = $_POST['email'];
		$pwd  = $_POST['password'];
		$pwd	=	md5($pwd);

		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare(
				'INSERT INTO admin (first_name, last_name, email, password)
				 VALUES(:first, :last, :email, :pwd)'
			);
			$insertdata = array(
				':first' => $first,
				':last' => $last,
				':email'  => $email,
				':pwd'  => $pwd
			);
			$pdo->execute($insertdata);
			echo '<script type="text/javascript">';
      echo 'alert("'.$pdo->rowcount().' akun admin berhasil dibuat");';
      echo 'window.location.href = "form_signin.html";';
      echo '</script>';
		}
		catch(PDOException $e){
			echo '<script type="text/javascript">';
      echo 'alert("Akun gagal dibuat, lakukan pendaftaran ulang!");';
      echo 'window.location.href = "form_signup.html";';
      echo '</script>';
			die();
		}
	}
?>
