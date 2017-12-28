<?php require 'header.php'; ?>
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
						$stmt = $conn->prepare('SELECT category_name FROM category ORDER BY category_name ASC');
						$stmt->execute();
						while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
							echo "<li><a href='#'>".$row->category_name."</a></li>";
						}
					?>
				</ul>
			</div>
			<div class="article">
				<h3>HTML</h3>
				<p><img src="image/HTML.png">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<a href="html-desc.html">Read More</a>
				</p>
				<h3>CSS</h3>
				<p><img src="image/css.png">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<a href="css-desc.html">Read More</a></p>
			</div>
		</div>
<?php require 'footer.php'; ?>
