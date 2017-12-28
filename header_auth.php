<?php
require 'koneksi.php';
session_start();
if (!isset($_SESSION['first_name'])) {
  header('Location:form_signin.html');
}
?>
  <html>
    <head>
       <title>BK STT-PLN - Tambah Kategori</title>
       <link rel="icon" href="image/icon.png" sizes="16x16">
       <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
      <div id="content">
    		<div class="Header">
    			<div class="header-logo">
    				<img src="image/logo.png">
    			</div>
    			<div class="header-text">
    				<h1>BERITA KAMPUSKU</h1>
    				<p>PORTAL BERITA KAMPUS STT-PLN</p>
    			</div>
    		</div>
    		<div class="menu">
    			<div class="menu-kiri">
    				<a href="index.php">Home</a>
    				<a href="Contact-us.html">Contact Us</a>
    			</div>
    			<div class='menu-kanan'>
    				<?php
            $admin_id = $_SESSION['id'];
    				$tmp_logout = "logout.php";
    				if (isset($_SESSION['first_name'])) {
    					$user = $_SESSION['first_name'];
    					echo "Admin: ".$user."<a href=".$tmp_logout."> logout</a>";
    				}
    				else {
    						echo "<a href='form_signin.html'>Sign in!</a>";
    				}
    				?>
    			</div>
    		</div>
