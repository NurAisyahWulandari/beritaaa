<?php
include 'koneksi.php';
session_start();
if (isset($_SESSION['first_name'])) {
?>
  <html>
    <head>
       <title>Tambah Berita Baru</title>
       <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    <!-- tag form -->
      <div class="news-table">
        <h1>Tambah Berita Baru</h1>
        <form Action = "news_sql.php" method="POST" enctype="multipart/form-data">
           <table>
              <tr>
                <td>Judul</td>
                <td><input type="text" name="txtjudul" autocomplete="off"/></td>
              </tr>

              <tr>
                <td>Berita</td>
                <td><textarea name="txtberita" rows="5" cols="50"> </textarea></td>
              </tr>

              <tr>
                <td>Select Image</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" value="Save" name="submit"></td>
              </tr>

           </table>
        </form>
      </div>
  	<!-- tag form -->
    </body>
  </html>
<?php
}
else {
    header('Location:form_signin.html');
}
?>
