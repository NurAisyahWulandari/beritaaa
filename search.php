<?php
  require 'header.php';
?>
<div class="main-content"><!-- start main content -->
  <!-- start navigate -->
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
        $stmt = $conn->prepare('SELECT * FROM category ORDER BY category_name ASC');
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
          echo "<li><a href='search.php?category=".$row->id."'>".$row->category_name."</a></li>";
        }
        for ($i=0; $i <50 ; $i++) {
          echo "<br>";
        }
      ?>
    </ul>
  </div>
  <!-- end navigate -->

  <!-- start noarticle -->
  <?php
    if (isset($_GET['category'])) {
      $key = $_GET['category'];
    }
    $page1=0;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if ($page=="" || $page=="1") {
        $page1=0;
      }else {
        $page1=($page*6)-6;
      }
    }

    $stmt = $conn->prepare('SELECT article.id, article.title, article.description, article.image, article.created_at, category.category_name FROM article INNER JOIN category ON article.category_id=category.id AND category.id='.$key.' ORDER BY article.created_at DESC LIMIT '.$page1.',6');
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
      $tmp_desc = substr($row->description, 0, 400);
        echo "<div class='nonarticle'>";
        echo "<h3>".$row->title."</h3>";
        echo "<p><img src='image/".$row->image."' width='600px'>".$tmp_desc." <i>(".$row->created_at." - ".$row->category_name.") </i><a href='index_detail.php?id=".$row->id."'>Read More</a><br>";
        if (isset($_SESSION['first_name'])) {
        echo "
          <table>
            <tr>
              <td><a id='warning' href='berita_edit_form.php?id=".$row->id."'>UBAH</a></td>";?>
              <td><a id="danger" onclick="return confirm('Apakah yakin menghapus berita ini?')" href="berita_hapus.php?id=<?php echo $row->id; ?>">HAPUS</a></td>
<?php echo "</tr>
          </table>
        ";
        }
        echo "</div>";
    }
  ?>
  <!-- start noarticle -->
</div><!-- end main content -->

<?php

  $stmt = $conn->prepare('SELECT * FROM article WHERE category_id='.$key.'');
  $stmt->execute();
  $totrow = $stmt->rowCount();
  $totrow = ceil($totrow/6);
  echo "<div class='paginate'>";
  echo "Page : ";
  for ($i=1; $i<=$totrow ; $i++) {
    echo "<a href='search.php?page=".$i."&category=".$key."' style='text-decoration:none;'> ".$i."</a>";
  }
  echo "<br><br></div>";
  require 'footer.php';
?>
