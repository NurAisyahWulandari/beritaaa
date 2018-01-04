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
        $stmt = $conn->prepare('SELECT id, category_name FROM category ORDER BY category_name ASC');
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
          echo "<li><a href='search.php?category=".$row->id."'>".$row->category_name."</a></li>";
        }
      ?>
    </ul>
  </div>
  <div class="article">
    <center>
    <!-- category form -->
      <div class="news-table">
        <h1>Tambah berita baru</h1>
        <form class="" action="berita_insert_exec.php" method="post" enctype="multipart/form-data">
          <table>
            <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
           <tr>
             <th>Judul</th>
             <td><input type="text" name="judul" style="width:370px;" required></td>
           </tr>
           <tr>
             <th>Deskripsi</th>
             <td><textarea name="deskripsi" rows="10" cols="50" required></textarea></td>
           </tr>
           <tr>
             <th>Pilih Gambar</th>
             <td><input type="file" name="fileToUpload" required></td>
           </tr>
           <tr>
             <th>Kategori</th>
             <td>
               <select name="c_id" required>
                 <option value="">- Pilih kategori -</option>
                 <?php
                 $stmt = $conn->prepare('SELECT * FROM category');
                 $stmt->execute();
                 while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                   echo "<option value='".$row->id."'>".$row->category_name."</option>";
                 }
                 ?>
               </select>
             </td>
           </tr>
           <tr>
             <td></td>
             <td><input type="button" value="KEMBALI" onclick="history.back()"><input type="submit" value="SIMPAN" name="submit"></td>
           </tr>
         </table>
       </form>
      </div>
      <!-- end category form -->
  </center>
  </div>
</div>
<!--end main-->
<?php require 'footer_auth.php'; ?>
