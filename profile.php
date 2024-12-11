<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile Dashboard</title>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f9;
}

.container {
  display: flex;
  min-height: 100vh;
}

.sidebar {
  width: 250px;
  background-color: #333;
  color: #fff;
  padding: 20px;
}

.sidebar-header {
  text-align: center;
  margin-bottom: 30px;
}

.sidebar h2 {
  font-size: 24px;
}

.nav {
  list-style-type: none;
}

.nav li {
  margin: 10px 0;
}

.nav a {
  text-decoration: none;
  color: #fff;
  font-size: 18px;
  display: block;
  padding: 10px;
  border-radius: 4px;
  transition: background-color 0.3s;
}

.nav a:hover {
  background-color: #444;
}

.nav a.active {
  background-color: #007bff;
}

.content {
  flex: 1;
  padding: 30px;
}

.tab {
  display: none;
}

.tab.active {
  display: block;
}

.profile-header {
  text-align: center;
  margin-bottom: 20px;
}

.profile-pic {
  border-radius: 50%;
}

.profile-details {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

.orders-list {
  list-style-type: none;
}

.orders-list li {
  background-color: #fff;
  padding: 15px;
  margin-bottom: 10px;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.status {
  font-weight: bold;
  color: green;
}

.status.pending {
  color: orange;
}

.status.shipped {
  color: blue;
}

.btn {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-right: 10px;
  transition: background-color 0.3s;
}

.btn:hover {
  background-color: #0056b3;
}

/* Responsive Styles */
@media (max-width: 768px) {
  .container {
    flex-direction: column;
  }

  .sidebar {
    width: 100%;
    padding: 10px;
  }

  .content {
    padding: 20px;
  }
}


    </style>
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="sidebar-header">
        <h2>Profile</h2>
      </div>
      <ul class="nav">
        <li><a href="#" class="active" onclick="showTab('overview')">Overview</a></li>
        <li><a href="#" onclick="showTab('orders')">Order History</a></li>
        <li><a href="#" onclick="showTab('settings')">Settings</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
      <!-- Overview Tab -->
      <div id="overview" class="tab active">
        <div class="profile-header">
          <img src="https://via.placeholder.com/100" alt="Profile Picture" class="profile-pic">
          <h3>John Doe</h3>
          <p>Email: john.doe@example.com</p>
        </div>
        <div class="profile-details">
          <h4>Personal Information</h4>
          <p><strong>Username:</strong> john_doe</p>
          <p><strong>Phone:</strong> 123-456-7890</p>
          <p><strong>Address:</strong> 1234 Elm Street, City, Country</p>
        </div>
      </div>

      <!-- Order History Tab -->
      <div id="orders" class="tab">
        <h3>Your Orders</h3>
        <ul class="orders-list">
          <li>Order #12345 - 2 Items - $50.00 - <span class="status">Delivered</span></li>
          <li>Order #12346 - 1 Item - $20.00 - <span class="status">Pending</span></li>
          <li>Order #12347 - 3 Items - $75.00 - <span class="status">Shipped</span></li>
        </ul>
      </div>

      <!-- Settings Tab -->
      <div id="settings" class="tab">
        <h3>Account Settings</h3>
        <button class="btn">Change Password</button>
        <button class="btn">Update Email</button>
        <button class="btn">Update Address</button>
      </div>
    </div>
  </div>

  <script>
function showTab(tabId) {
  const tabs = document.querySelectorAll('.tab');
  tabs.forEach(tab => tab.classList.remove('active'));

  const selectedTab = document.getElementById(tabId);
  selectedTab.classList.add('active');

  const links = document.querySelectorAll('.nav a');
  links.forEach(link => link.classList.remove('active'));
  const activeLink = document.querySelector(`.nav a[href="#${tabId}"]`);
  if (activeLink) activeLink.classList.add('active');
}

document.addEventListener("DOMContentLoaded", () => {
  showTab('overview');
});

</script>
</body>
</html>
