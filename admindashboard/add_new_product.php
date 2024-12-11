<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
    <style type="text/css">
        
        .container{
    padding-top: 50px;
    display: flex;
    position: relative;
    align-items: center;
    justify-content: center;
    height: auto;
}
input , textarea {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      padding: 10px;
    }


    select {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;

      background-color: #fff;
      margin: 0px;
      border: 1px solid grey;
      padding: 10px;
      -moz-appearance: textfield; 
  -webkit-appearance: none;   
  appearance: none; 
    }


input[type="file"]{

    display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 3px;
      padding: 10px;
      background-color: #fff;
      margin: 0px;
      border: 1px solid grey;
        -moz-appearance: textfield; 
  -webkit-appearance: none;   
  appearance: none; 
}

input[type="number"] {
            -moz-appearance: textfield;
            -webkit-appearance: none;
            appearance: none;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .numonly { border:1px solid grey; }

button {
    margin-top: 30px;
    float: right;
     display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    padding: 10px 24px;
    color:White;
    border: none;
    background-color: #FF4500;
    font-size: 16px;
    border-radius: 5px;
    font-weight: 500;
    cursor: pointer;
}


.product > div { margin-top:3px }
    </style>


</head>
<body class="body">
    <?php include('header.php'); ?>
<section class="main">
    <?php include('sidebar.php'); ?>
    <div class="main--container" style="padding-top: 30px;">
        <div style="text-align:center;">Add New Product</div>
        <div class="container" style="margin-top:0px;padding-top: 10px;">
            <div class="single-product">
                <div class="row">
                    <div class="col-6" style="margin-bottom: 20px">
                    </div>
                    <div class="col-6">
                        <div class="product">
                            <form action="add_newproduct.php" method="POST" enctype="multipart/form-data">
                            <div class="product-image">
                                    <div>Product Image</div>
                                    <input type="file" name="productImage" required>
                                </div>
                                <div class="product-title">
                                    <div>Category</div>
                                    <select id="category" name="category">
                                        <?php
                                        include '../db_conn.php';
                                        $category_sql = "SELECT * FROM categories";
                                        $category_result = $conn->query($category_sql);
                                        while($category = $category_result->fetch_assoc()) {
                                            echo "<option value='".$category['category_id']."'>".$category['name']."</option>";
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
      

                                <div class="product-title">
                                    <div>Name</div>
                                    <input required type="text" id="input_name" name="name" placeholder="Enter product name">
                                </div>
                                <div class="product-price">
                                    <div>Price</div>
                                    <input required type="number" id="input_price" name="price" placeholder="Enter product price" class="numonly">
                                </div>

                                <div class="product-size">
                                    <div>Available Stocks</div>
                                    <input required type="number" id="input_stockquantity" name="stock_quantity" placeholder="Enter available stock quantity" class="numonly">
                                </div>
                                <div class="product-details">
                                    <div>Description</div>
                                    <textarea required id="input_description" name="description" placeholder="Enter product description"></textarea>
                                </div>
       
                                <div class="product-btn-group">
                                    <button type="submit" class="button buy-now">Add Product</button>
                                </div>
 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/main.js"></script>
</body>
</html>
