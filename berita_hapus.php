<?php
  include 'koneksi.php';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    try {
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare('DELETE FROM article WHERE id=:id');
			$deletedata = array(
        ':id' => $id
			);
			$pdo->execute($deletedata);
      echo '<script type="text/javascript">';
      echo 'alert("'.$pdo->rowcount().' berita berhasil dihapus");';
      echo 'window.location.href = "index.php";';
      echo '</script>';
    } catch (PDOException $e) {
      echo '<script type="text/javascript">';
      echo 'alert("Berita gagal dihapus");';
      echo 'window.location.href = "index.php";';
      echo '</script>';
			die();
    }
  }
?>
