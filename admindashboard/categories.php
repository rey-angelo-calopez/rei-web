<?php
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
     <style>
     


* {
  box-sizing: border-box;
}



.shopping-cart {
  width: 750px;
  height: auto;
  margin: 80px auto;
  background: #FFFFFF;
  box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
  border-radius: 6px;


  display: flex;
  flex-direction: column;


  max-height: 400px;
  overflow-y: auto;
}


.title {
  height: 60px;
  border-bottom: 1px solid #E1E8EE;
  padding: 20px 30px;
  color: #5E6977;
  font-size: 18px;
  font-weight: 400;
}


.item {
  padding: 20px 30px;
  height: 120px;
  display: flex;
}

.centeradd {
    margin: -50px auto;
    text-align: center; 
}


.item {
  border-top:  1px solid #E1E8EE;
  border-bottom:  1px solid #E1E8EE;
}


.buttons {
  position: relative;
  padding-top: 30px;
  margin-right: 60px;
}



input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type="number"] {
  -moz-appearance: textfield;
}

.flexrow { display:flex; height:auto; width:100%; }
.flexrow div { background:transparent; justify-content:center;align-content:center;align-content:center;padding:0px }
.quantity-input { margin-top: 10px;
      width: 30px;
      height: 30px;
      padding: 10px;
      
      text-align: center;
      margin:auto;
      flex: 0 0 1;
      font-size: 16px;
      border: 2px solid #ccc;
      border-radius: 8px;
      outline: none;
      margin-right: 10px;
      overflow: hidden; }

.quantity-input input {
  width: 100%;
  text-align: center;
}

.is-active {
  animation-name: animate;
  animation-duration: .8s;
  animation-iteration-count: 1;
  animation-timing-function: steps(28);
  animation-fill-mode: forwards;
}


@keyframes animate {
  0%   { background-position: left;  }
  50%  { background-position: right; }
  100% { background-position: right; }
}


.image {
  margin-right: 10px;
}


.description {
  padding-top: 10px;
  margin-right: 0px;
  width: 115px;
}


.description span {
  display: block;
  font-size: 14px;
  color: #43484D;
  font-weight: 400;
}


.description span:first-child {
  margin-bottom: 5px;
}
.description span:last-child {
  font-weight: 300;
  margin-top: 8px;
  color: #86939E;
}


.quantity {
  padding-top: 20px;
  margin-right: 60px;
}
.quantity input {
  -webkit-appearance: none;
  border: none;
  text-align: center;
  width: 32px;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}


button[class*=btn] {
  width: 30px;
  height: 30px;
  background-color: #E1E8EE;
  border-radius: 6px;
  border: none;
  cursor: pointer;
}
.minus-btn img {
  margin-bottom: 3px;
}
.plus-btn img {
  margin-top: 2px;
}
button:focus,
input:focus {
  outline:0;
}


.total-price {
  width: 83px;
  padding-top: 27px;
  text-align: center;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}


@media (max-width: 800px) {

  .flexrow {
    flex-direction: column;
    justify-content: center;
    align-items: center;
    align-content: center;
  }

  .quantity-input { margin:auto; margin-bottom:10px }
  .total-price { margin-bottom:10px }


    .description { align-content:center;align-content:center;justify-content:center; text-align:center;background:red;width:auto; }
    .description > div {
        margin-bottom: 10px;
    }

  .shopping-cart {
    width: 100%;
    height: 350px;
    overflow-y:auto;
  }
  .item {
    height: auto;
    flex-wrap: wrap;
    justify-content: center;
  }
  .image img {
    width: 50%;
  }
  .buttons {
    margin-right: 20px;
  }
}

    </style>
</head>
<body class="body">
   <?php include('header.php'); ?>


   <section class="main">

        <?php include('sidebar.php'); ?>

        
        <div class="main--container">
              <div class="title" style="text-align:center;">
        Categories
      </div>
            <div class="shopping-cart" style="margin-top:20px">
 
    

<?php
include '../db_conn.php';

$category_sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $category_sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $category_id = $row['category_id'];
        $name = $row['name'];

        $product_count_sql = "SELECT COUNT(*) AS total FROM products WHERE category_id = $category_id";
        $product_result = mysqli_query($conn, $product_count_sql);

        if ($product_result && mysqli_num_rows($product_result) > 0) {
            $product_row = mysqli_fetch_assoc($product_result);
            $total = $product_row['total'];
        } else {
            $total = 0;
        }
?>
        <div class="item">
            <div class="flexrow">
                <div class="description" style="display: flex;justify-content: flex-start;">
                    <div style="font-weight: 300;font-size: 15px">(<?php echo htmlspecialchars($total); ?>)</div><div style="font-weight: 300;font-size: 15px">&nbsp;<?php echo htmlspecialchars($name); ?></div>
                </div>
            </div>
            <div class="quantity-input delete-btn" style="border:none;padding-top: 5px; padding-right: 25px; cursor: pointer; background: #FF4500;" data-category-id="<?php echo $category_id; ?>">
                <i class="ri-delete-bin-line" style="color: white;"></i>
            </div>
        </div>
<?php
    }
} else {
    echo "No categories found.";
}

mysqli_close($conn);
?>





</div>



<div class="centeradd">
    <input type="text" id="newCategory" name="newCategory" style="padding: 4px 10px;border: 1px solid grey;" placeholder="New Category">
    <button id="addCategoryBtn" style="background-color: #FF4500;color:White;padding: 5px 10px;border: none;outline: none;border-radius:5px;">Add</button>
</div>
</div>


</section>


<script>

    document.getElementById('addCategoryBtn').addEventListener('click', function() {
        var newCategory = document.getElementById('newCategory').value.trim();
        
        if (newCategory === '') {
            alert('Please enter a category name.');
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_category.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                if (response == 'exists') {
                    alert('Category already exists.');
                } else if (response == 'success') {
                    alert('Category added successfully.');
                    location.reload(); 
                } else {
                    alert('An error occurred while adding the category.');
                }
            }
        };
        xhr.send('category_name=' + encodeURIComponent(newCategory));
    });


    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var categoryId = this.getAttribute('data-category-id');
            var confirmation = confirm('Are you sure you want to delete this category and all its products?');
            if (confirmation) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_category.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert('Category and products deleted successfully.');
                        location.reload();
                    }
                };
                xhr.send('category_id=' + categoryId);
            }
        });
    });
</script>

    <script src="assets/js/main.js"></script>
</body>
</html>