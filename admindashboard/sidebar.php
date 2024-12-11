<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



if (empty($_SESSION['admin_id'])) {
    echo "<script>window.history.back();</script>";
    exit(); 
}


$admin_id = $_SESSION['admin_id'];  

$currentPath = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);



?>
<div class="sidebar">
    <ul class="sidebar--items">
        <li>
            <a href="index.php" class="<?php echo ($currentPath == 'index') ? 'active' : ''; ?>">
                <span class="icon"><i class="ri-handbag-line"></i></span>
                <div class="sidebar--item">Products</div>
            </a>
        </li>
        
        
        <!-- <li>
            <a href="orders.php" class="<?php echo ($currentPath == 'orders') ? 'active' : ''; ?>">
                <span class="icon"><i class="ri-booklet-line"></i></span>
                <div class="sidebar--item">Orders</div>
            </a>
        </li>
         -->
        <li>
            <a href="categories.php" class="<?php echo ($currentPath == 'categories') ? 'active' : ''; ?>">
                <span class="icon"><i class="ri-list-check-2"></i></span>
                <div class="sidebar--item">Categories</div>
            </a>
        </li>


        <li>
            <a href="reviews.php" class="<?php echo ($currentPath == 'reviews') ? 'active' : ''; ?>">
                <span class="icon"><i class="ri-feedback-line"></i></span>
                <div class="sidebar--item">Reviews</div>
            </a>
        </li>
        
       <!--  <li>
            <a href="settings.php" class="<?php echo ($currentPath == 'settings') ? 'active' : ''; ?>">
                <span class="icon"><i class="ri-settings-3-line"></i></span>
                <div class="sidebar--item">Settings</div>
            </a>
        </li> -->
    </ul>
    <ul class="sidebar--bottom--items">
        <li>
            <a href="logout.php" class="<?php echo ($currentPath == 'logout') ? 'active' : ''; ?>">
                <span class="icon"><i class="ri-logout-box-r-line"></i></span>
                <div class="sidebar--item">Logout</div>
            </a>
        </li>
    </ul>
</div>
