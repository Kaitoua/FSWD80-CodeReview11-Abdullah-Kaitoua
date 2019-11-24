<?php if ( !isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
} ?>
 <footer class="bg-light text-center">
    <h1 class="p-3">Travel-O-Matic</h1>
    <p >Abdullah Kaitoua</p>
  </footer>
