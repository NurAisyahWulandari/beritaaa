<?php
	include 'koneksi.php';
	if(isset($_POST['submit'])){
		$judul = $_POST['judul'];
		$deskripsi = $_POST['deskripsi'];
		$image = $_FILES['fileToUpload']['name'];
    $admin_id = $_POST['admin_id'];
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
	        //echo "File is not an image.";
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
			//$mydate=getdate(date("U"));
			//$mydate="$mydate[year]$mydate[mon]$mydate[mday]";
			$mydate = date("Y-m-d");
			$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare(
            'INSERT INTO article (title, description, image, created_at, updated_at, admin_id, category_id)
						 VALUES (:judul, :deskripsi, :image, :mydate, :mydate, :admin_id, :c_id)'
      );
			$insertdata = array(
        ':judul' => $judul,
        ':deskripsi' => $deskripsi,
				':image' => $image,
				':mydate' => $mydate,
				':mydate' => $mydate,
				':admin_id' => $admin_id,
				':c_id' => $c_id
      );
			$pdo->execute($insertdata);
			echo '<script type="text/javascript">';
      echo 'alert("'.$pdo->rowcount().' berita berhasil ditambah");';
      echo 'window.location.href = "index.php";';
      echo '</script>';
		} catch (PDOexception $e) {
			echo '<script type="text/javascript">';
      echo 'alert("Berita gagal ditambah, silahkan coba lagi!");';
      echo 'window.location.href = "berita_insert_form.php";';
      echo '</script>';
			die();
		}
	}
?>
