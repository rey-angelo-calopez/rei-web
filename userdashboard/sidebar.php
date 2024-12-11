<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



if (empty($_SESSION['user_id'])) {
    echo "<script>window.history.back();</script>";
    exit(); 
}


$user_id = $_SESSION['user_id'];  


$currentPath = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);


 
?>


?>
<div class="sidebar">
    <ul class="sidebar--items">
        <li>
            <a href="index.php" class="<?php echo ($currentPath == 'index') ? 'active' : ''; ?>">
                <span class="icon"><i class="ri-heart-line"></i></span>
                <div class="sidebar--item">Popular Products</div>
            </a>
        </li>
        <li>
            <a href="products.php" class="<?php echo ($currentPath == 'products') ? 'active' : ''; ?>">
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
            <a href="shoppingcart.php" class="<?php echo ($currentPath == 'shoppingcart') ? 'active' : ''; ?>">
                <span class="icon"><i class="ri-shopping-cart-2-line"></i></span>
                <div class="sidebar--item">Cart</div>
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
