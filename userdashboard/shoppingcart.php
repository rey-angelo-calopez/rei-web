<?php
session_start();


$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

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


  .shopping-cart {
    width: 100%;
    height: auto;
    overflow: hidden;
  }
  .item {
    height: auto;
    flex-wrap: wrap;
    justify-content: center;
  }
  .image img {
    width: 50%;
  }
  .image,
  .quantity,
  .description {
    width: 100%;
    text-align: center;
    margin: 6px 0;
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
            <div class="shopping-cart" style="margin-top:20px">
 
      <div class="title">
        Shopping Cart
      </div>
<?php
include('../db_conn.php');

$user_id = $_SESSION['user_id']; 


$sql = "SELECT c.product_id, SUM(c.quantity) AS total_quantity, p.name, p.price, p.imgsrc
        FROM cart c
        JOIN products p ON c.product_id = p.product_id
        WHERE c.user_id = ?
        GROUP BY c.product_id, p.name, p.price, p.imgsrc";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $total_cart_price = 0; 
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $total_quantity = $row['total_quantity'];
            $product_name = $row['name'];
            $product_price = $row['price'];
            $product_image = $row['imgsrc'];

            $item_total = $product_price * $total_quantity; 
            $total_cart_price += $item_total; 

?>
            <div class="item">
                <div class="image">
                    <img src="../assets/img/<?php echo $product_image; ?>" style="height: 70px;width: 70px;" />
                </div>

                <div class="flexrow">
                    <div class="description">
                        <span><?php echo $product_name; ?></span>
                    </div>

                    <div class="quantity-input">
                        <input type="number" style="border: none;" name="quantity" value="<?php echo $total_quantity; ?>" class="quantity-input-field" data-product-id="<?php echo $product_id; ?>" />
                    </div>

                    <div class="total-price" data-price="<?php echo $product_price; ?>" data-quantity="<?php echo $total_quantity; ?>" data-product-id="<?php echo $product_id; ?>">
                        P<?php echo number_format($item_total, 2); ?>
                    </div>

                    <div class="quantity-input delete-btn" style="border:none;padding-top: 5px;cursor: pointer; background: #FF4500;" data-product-id="<?php echo $product_id; ?>">
                        <i class="ri-delete-bin-line" style="color: white;"></i>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "<p style='text-align:center;padding-top:20px'>Your cart is empty.</p>";
    }

    $stmt->close();
} else {
    echo "Error: Could not execute query.";
}

$conn->close();
?>

<div class="title" style="text-align: right;">
   Total Amount : <span id="total-priceall">P</span>
</div>


</div>
</div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function updateTotalPrice() {
        let totalPrice = 0;
        document.querySelectorAll('.total-price').forEach(function(priceElement) {
            let price = parseFloat(priceElement.getAttribute('data-price'));
            let quantity = parseInt(priceElement.getAttribute('data-quantity'));
            if (!isNaN(price) && !isNaN(quantity)) {
                totalPrice += price * quantity;
            }
        });

        console.log('Total Price:', totalPrice);
        document.getElementById('total-priceall').textContent = 'P' + totalPrice.toFixed(2);
    }

    setInterval(updateTotalPrice, 100)

    document.querySelectorAll('.quantity-input-field').forEach(function(input) {
        input.addEventListener('input', function() {
            var productId = this.getAttribute('data-product-id');
            var newQuantity = parseInt(this.value);
            var pricePerUnit = parseFloat(this.closest('.flexrow').querySelector('.total-price').getAttribute('data-price'));
            var totalPriceElement = this.closest('.flexrow').querySelector('.total-price');

            if (!isNaN(newQuantity) && newQuantity > 0) {
                var newTotalPrice = pricePerUnit * newQuantity;
                totalPriceElement.textContent = 'P' + newTotalPrice.toFixed(2);
                totalPriceElement.setAttribute('data-quantity', newQuantity);

                fetch('update_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'product_id=' + productId + '&quantity=' + newQuantity
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Cart updated successfully');
                        updateTotalPrice();
                    } else {
                        console.log('Error updating cart');
                    }
                })
                .catch(error => {
                    console.error('Error during fetch:', error);
                });
            }
        });
    });

    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            var itemElement = this.closest('.item');
            itemElement.remove();

            fetch('delete_from_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=' + productId
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Product removed from cart');
                    updateTotalPrice();
                } else {
                    console.log('Error removing product: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error during fetch:', error);
            });
        });
    });

    updateTotalPrice();
});

</script>


    <script src="assets/js/main.js"></script>
</body>
</html>