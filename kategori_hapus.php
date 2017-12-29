<?php
  include 'koneksi.php';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    try {
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare('DELETE FROM category WHERE id=:id');
			$deletedata = array(
        ':id' => $id
			);
			$pdo->execute($deletedata);
      echo '<script type="text/javascript">';
      echo 'alert("'.$pdo->rowcount().' kategori berhasil dihapus");';
      echo 'window.location.href = "kategori.php";';
      echo '</script>';
    } catch (PDOException $e) {
      echo '<script type="text/javascript">';
      echo 'alert("Kategori gagal dihapus");';
      echo 'window.location.href = "kategori.php";';
      echo '</script>';
			die();
    }
  }
?>
