<?php require 'header_auth.php'; ?>
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
    						$stmt = $conn->prepare('SELECT category_name FROM category ORDER BY category_name ASC');
    						$stmt->execute();
    						while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    							echo "<li><a href='#'>".$row->category_name."</a></li>";
    						}
    					?>
    				</ul>
    			</div>
    			<div class="article">
            <center>
            <!-- new category form -->
              <div class="news-table">
                <?php
                 $admin_id = $_SESSION['id'];
                 $id = $_GET['id'];
                 $stmt = $conn->prepare("SELECT * FROM category WHERE id=$id");
                 $stmt->execute();
                 $row = $stmt->fetch(PDO::FETCH_OBJ);
                 ?>
                <!-- start form -->
                <form action="kategori_edit_exec.php" method="POST">
                   <table>
                     <h2>Edit Kategori</h2>
                     <tr>
                       <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                       <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                       <td>Nama kategori </td>
                       <td colspan="2"><input type="text" name="kategori" placeholder="<?php echo $row->category_name; ?>" required/></td>
                     </tr>
                     <tr>
                       <td></td>
                       <td><input type="submit" value="SAVE" name="submit"></td>
                     </tr>
                   </table>
                </form>
                <!-- end form -->
              </div>
          </center>
    			</div>
        </div>
        <!--end main-->
<?php require 'footer_auth.php'; ?>
