<?php
	include "koneksi.php";

	session_start();
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$pwd  = $_POST['password'];
		$pwd	=	md5($pwd);

		$pdo = $conn->prepare('SELECT * FROM admin WHERE email = :email and password = :pwd');
		$pdo->execute(array(
				':email' => $email,
				':pwd'  => $pwd
			));
		$count = $pdo->rowcount();
		$row = $pdo->fetch(PDO::FETCH_OBJ);

		$tmp = "form_signin.html";
		if ($count == 0) {
			echo "
				<center>
					<p>Wrong username or password!</p><br>
					<a href=".$tmp.">Back to login</a>
				</center>
			";
		} else{
			$_SESSION['id']=$row->id;
			$_SESSION['first_name']=$row->first_name;
			header("location:index.php");
		}
	}
?>
