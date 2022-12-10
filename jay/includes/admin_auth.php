<?php
  if(!isset($_SESSION['id'])&& !isset($_SESSION['username'])){
    header("Location:login.php?error=Login is needed to access chatroom");
  }
 ?>
