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
                <form action="kategori_insert_exec.php" method="POST">
                   <table>
                     <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                     <h2>Tambah Kategori</h2>
                      <tr>
                        <td>Nama kategori </td>
                        <td><input type="text" name="kategori" required/></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input type="submit" value="SAVE" name="submit"></td>
                      </tr>
                   </table>
                </form>
              </div>
              <br>
            <!-- new category form -->
            <div class="news-table">
              <h2>List Kategori</h2>
              <table border="" style="text-align:center;">
                <tr style="background-color:blue; color:white;">
                  <th style="padding: 5px;">No</th>
                  <th>Nama Kategori</th>
                  <th>Admin</th>
                  <th colspan="2">Aksi</th>
                </tr>
              <?php
                $stmt = $conn->prepare('SELECT category.id, category.category_name, admin.first_name FROM admin INNER JOIN category ON category.admin_id=admin.id ORDER BY category.category_name ASC');
                $stmt->execute();
                $no = 1;

                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                  echo "<tr>
                        <td>".$no++."</td>";
                  echo "<td>".$row->category_name."</td>";
                  echo "<td>".$row->first_name."</td>";
                  echo "<td><a id='warning' href='kategori_edit.php?id=".$row->id."'>UBAH</a></td>";
                  echo "<td><a id='danger' href='kategori_hapus.php?id=".$row->id."'>HAPUS</a></td>
                        </tr>";
                }
              ?>
            </table>
          </div>
          </center>
    			</div>
        </div>
        <!--end main-->
<?php require 'footer_auth.php'; ?>
