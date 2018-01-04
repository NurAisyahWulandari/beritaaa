<?php
  include 'koneksi.php';
  if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $c_name = $_POST['kategori'];
		$admin_id  = $_POST['admin_id'];
    try {
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare('UPDATE category SET category_name=:c_name, admin_id=:admin_id WHERE id=:id');
			$updatedata = array(
        ':id' => $id,
				':c_name' => $c_name,
				':admin_id' => $admin_id
			);
			$pdo->execute($updatedata);
      echo '<script type="text/javascript">';
      echo 'alert("'.$pdo->rowcount().' kategori berhasil diubah");';
      echo 'window.location.href = "kategori.php";';
      echo '</script>';
    } catch (PDOException $e) {
      echo '<script type="text/javascript">';
      echo 'alert("Kategori gagal diubah");';
      echo 'window.location.href = "kategori.php";';
      echo '</script>';
			die();
    }
  }
?>
