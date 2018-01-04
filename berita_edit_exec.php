<?php
  include 'koneksi.php';
  if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $image = $_FILES['fileToUpload']['name'];
    $admin_id  = $_POST['admin_id'];
    $c_id = $_POST['c_id'];

    $target_dir = "image/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      // Check if image file is a actual image or fake image
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        //echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }

	    if ($uploadOk == 1) {
	    	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		    // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    //     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    // } else {
		    //     echo "Sorry, there was an error uploading your file.";
		    // }
			}
    try {
      $mydate = date("Y-m-d");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare('UPDATE article SET title=:judul, description=:deskripsi, image=:image, admin_id=:admin_id, category_id=:c_id, updated_at=:mydate WHERE id=:id');
			$updatedata = array(
        ':id' => $id,
        ':judul' => $judul,
        ':deskripsi' => $deskripsi,
        ':image' => $image,
        ':admin_id' => $admin_id,
				':c_id' => $c_id,
        ':mydate' => $mydate
			);
			$pdo->execute($updatedata);
      echo '<script type="text/javascript">';
      echo 'alert("'.$pdo->rowcount().' berita berhasil diubah");';
      echo 'window.location.href = "index.php";';
      echo '</script>';
    } catch (PDOException $e) {
      echo '<script type="text/javascript">';
      echo 'alert("Kategori gagal diubah");';
      echo '</script>';
			die();
    }
  }
?>
