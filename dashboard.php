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
    <!-- new category form -->
      <div class="news-table">
         <table>
           <br><br>
           <tr>
             <td><a href="kategori.php" id="default">Pengaturan kategori</a></td>
             <td><a href="berita_insert_form.php" id="default">Tambah berita</a></td>
           </tr>
         </table>
      </div>
  </center>
  </div>
</div>
<!--end main-->
<?php require 'footer_auth.php'; ?>
