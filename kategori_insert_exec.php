<?php
  include 'koneksi.php';
  if(isset($_POST['submit'])){
		$c_name = $_POST['kategori'];
		$admin_id  = $_POST['admin_id'];
    try {
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare(
				'INSERT INTO category (category_name, admin_id)
				 VALUES(:c_name, :admin_id)'
			);
			$insertdata = array(
				':c_name' => $c_name,
				':admin_id' => $admin_id
			);
			$pdo->execute($insertdata);
      echo '<script type="text/javascript">';
      echo 'alert("'.$pdo->rowcount().' kategori berhasil dibuat");';
      echo 'window.location.href = "kategori.php";';
      echo '</script>';
    } catch (PDOException $e) {
      echo '<script type="text/javascript">';
      echo 'alert("Kategori gagal dibuat");';
      echo 'window.location.href = "kategori.php";';
      echo '</script>';
			die();
    }
  }
?>
