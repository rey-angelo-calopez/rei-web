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
  height: auto;
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
        Reviews
      </div>
            <div class="shopping-cart" style="margin-top:20px">
 
    
<?php
include '../db_conn.php';

$query = "SELECT *, products.imgsrc as imgsrcprof FROM reviews
INNER JOIN products ON products.product_id = reviews.product_id
INNER JOIN users ON users.user_id = reviews.user_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $review_id = $row['review_id'];
        $product_id = $row['product_id'];
        $review = $row['review'];
        $product_image = $row['imgsrcprof'];
        $full_name = $row['full_name'];
        $average_rating = $row['rating'];
        
        ?>
        <div class="item">
            <div class="image">
                    <img src="../assets/img/<?php echo $product_image; ?>" style="height: 70px;width: 70px;" />
                </div>
            <div class="flexrow">
                <div class="description" style="display: flex; width:100%; justify-content: flex-start;flex-direction: column;">
                    <div style="font-weight: 300; font-size: 15px;width: 100%;"><?php echo htmlspecialchars($review); ?></div>

                    <div style="font-weight: 300; font-size: 13px;font-style: italic;">— <?php echo htmlspecialchars($full_name); ?></div>

                    <div>
                    <?php

                     for ($i = 1; $i <= 5; $i++) {
            if ($i <= $average_rating) {
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: #FF4500;transform: ;msFilter:;"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>';
            } else {
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: #FF4500;transform: ;msFilter:;"><path d="m6.516 14.323-1.49 6.452a.998.998 0 0 0 1.529 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082a1 1 0 0 0-.59-1.74l-5.701-.454-2.467-5.461a.998.998 0 0 0-1.822 0L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.214 4.107zm2.853-4.326a.998.998 0 0 0 .832-.586L12 5.43l1.799 3.981a.998.998 0 0 0 .832.586l3.972.315-3.271 2.944c-.284.256-.397.65-.293 1.018l1.253 4.385-3.736-2.491a.995.995 0 0 0-1.109 0l-3.904 2.603 1.05-4.546a1 1 0 0 0-.276-.94l-3.038-2.962 4.09-.326z"></path></svg>';
            }
        }

        ?>
        </div>
                </div>
            </div>
            <div class="quantity-input delete-btn" style="border:none; padding-top: 5px; padding-right: 25px; cursor: pointer; background: #FF4500;" data-review-id="<?php echo $review_id; ?>">
                <i class="ri-delete-bin-line" style="color: white;"></i>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p style='padding:5px;text-align:center'>No reviews found.</p>";
}

mysqli_close($conn);
?>





</div>





</section>


<script>



    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var reviewId = this.getAttribute('data-review-id');
            var confirmation = confirm('Are you sure you want to delete this review ?');
            if (confirmation) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_review.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert('Review deleted successfully.');
                        location.reload();
                    }
                };
                xhr.send('review_id=' + reviewId);
            }
        });
    });
</script>

    <script src="assets/js/main.js"></script>
</body>
</html>