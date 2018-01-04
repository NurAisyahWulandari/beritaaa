<?php require 'header.php'; ?>

<!--start main-->
<div class="main-content">
	<div class="navigate">
		<p>Category
			<?php
			if (isset($_SESSION['first_name'])) {
				echo "<a href='kategori.php'>
							<img src='image/plus.png' alt='plus' width='20px'>
							</a>";
			}
			?>
		</p>
		<ul>
			<?php
				$stmt = $conn->prepare('SELECT id, category_name FROM category ORDER BY category_name ASC');
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
					echo "<li><a href='search.php?category=".$row->id."'>".$row->category_name."</a></li>";
				}
			?>
		</ul>
	</div>

	<div class="article">
		<?php
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$stmt = $conn->prepare("SELECT article.id, article.title, article.description, article.image, article.created_at, admin.first_name FROM article, admin WHERE article.admin_id=admin.id AND article.id=$id");
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_OBJ);
		}
		 ?>
		 <input id="kembali" type="button" value="KEMBALI" onclick="history.back()">
		 <p style="text-align:left; font-style:italic;">Tanggal : <?php echo $row->created_at; ?>, Oleh : <?php echo $row->first_name; ?></p>
		 <center>
       <h2><?php echo $row->title; ?></h2><br>
       <img src="image/<?php echo $row->image; ?>" alt="image" width="500px"><br><br>
     </center>
		 <p style="text-align:justify; font-size:18px;"><?php echo $row->description; ?></p>
		 <?php
		 if (isset($_SESSION['first_name'])) {?>
			 <a id='warning' href='berita_edit_form.php?id=<?php echo $row->id; ?>'>UBAH</a>
			 <a id="danger" onclick="return confirm('Apakah yakin menghapus berita ini?')" href="berita_hapus.php?id=<?php echo $row->id; ?>">HAPUS</a>
			 <?php
		 }
		 ?>
	</div>
</div>
<!--end main-->

<?php require 'footer_auth.php'; ?>
