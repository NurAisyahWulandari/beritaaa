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
        <?php
         $admin_id = $_SESSION['id'];
         $id = $_GET['id'];
         $stmt = $conn->prepare("SELECT * FROM article WHERE id=$id");
         $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_OBJ);
         ?>
        <h1>Edit berita</h1>
        <form class="" action="berita_edit_exec.php" method="post" enctype="multipart/form-data">
          <table>
            <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
           <tr>
             <th>Judul</th>
             <td><input type="text" name="judul" style="width:370px;" value="<?php echo $row->title; ?>" required></td>
           </tr>
           <tr>
             <th>Deskripsi</th>
             <td><textarea name="deskripsi" rows="15" cols="50" required><?php echo $row->description; ?></textarea></td>
           </tr>
           <tr>
             <th>Pilih Gambar</th>
             <td><input type="file" name="fileToUpload" required></td>
           </tr>
           <tr>
             <th>Kategori</th>
             <td>
               <select name="c_id" required>
                 <?php
                 $stmt = $conn->prepare("SELECT article.id AS article_id, category.id AS cat_id, category.category_name FROM article INNER JOIN category ON article.category_id=category.id AND article.id=$id");
                 $stmt->execute();
                 $row = $stmt->fetch(PDO::FETCH_OBJ);
                 echo "<option value='".$row->cat_id."'>- ".$row->category_name." -</option>";
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
