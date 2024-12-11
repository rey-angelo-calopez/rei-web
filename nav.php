<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$currentPath = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

$logged_username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if (empty($logged_username) && $currentPath !== 'signinup') {

} else {
   header("Location: userdashboard/");
    exit;
}

?>

<nav class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title" onclick="window.location.href='index.php'; document.getElementById('nav-check').checked = false;">
      <img src="./assets/img/logo.png" alt="logo" style="height: 70px;" />
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>

  <ul class="nav-list">
    <li class="btnclick" style="color:white" onclick="window.location.href='index.php'; document.getElementById('nav-check').checked = false;">Home</li>
    
    <?php if ($currentPath !== 'view_product'): ?>
      <li class="btnclick" style="color:white" onclick="window.location.href='./#Services'; document.getElementById('nav-check').checked = false;">Services</li>
      <li class="btnclick" style="color:white" onclick="window.location.href='products.php'; document.getElementById('nav-check').checked = false;">Shop</li>
      <li class="btnclick" style="color:white" onclick="window.location.href='./#Hardware'; document.getElementById('nav-check').checked = false;">Hardware</li>
      <li class="btnclick" style="color:white" onclick="window.location.href='/#'; document.getElementById('nav-check').checked = false;">Support</li>
    <?php endif; ?>
    
    <?php if (empty($logged_username)): ?>
      <li class="btnclick" onclick="window.location.href='signinup.php'; document.getElementById('nav-check').checked = false;" style="background: orangered; color:white; width: 130px; text-align: center; margin: auto;">
        Sign In
      </li>
    <?php else: ?>
      <li class="btnclick" onclick="window.location.href='userdashboard/'; document.getElementById('nav-check').checked = false;" style="background: orangered; color:white; width: 130px; text-align: center; margin: auto;">
        <?php echo htmlspecialchars($logged_username); ?>
      </li>
    <?php endif; ?>
  </ul>
</nav>
