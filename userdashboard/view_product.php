<?php
session_start();
include '../db_conn.php';

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

if (isset($product_id)) {
    $query = "UPDATE products SET views = views + 1 WHERE product_id = ?";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $product_id);
        
        if ($stmt->execute()) {
            echo "";
        } else {
            echo "" . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} 

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <?php include('head.php'); ?>

         <style type="text/css">
        
.prods {
    margin: auto;
    display: flex;
    flex-direction: row;
    max-width: 1000px;
    width: 100%;
    flex-wrap: wrap;
    overflow: hidden;
    height: auto;
}

.prods div {
    margin: 20px auto;
}
.prodcard {
    background-position: cover;
    width: 170px;
    height: 200px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    overflow: hidden; 
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    transition: transform 0.3s; 
}

.prodcard img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important; 
}

.prodcard:hover {
    transform: scale(1.05);
    box-shadow: 0 1rem 1rem 0 #85929e8a;
}

</style>


        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');  /** Poppins Font **/


/** gobal layout */
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root{
    --primary-color: #FF4500;
    --accent-color: #FF4500;
    --grey:#484848;
    --bg-grey: #efefef;
    --shadow: #949494;
}

.container{
    padding-top: 0px;
    display: flex;
    position: relative;
    align-items: center;
    justify-content: center;
    height: auto;
}

.row{
    display: flex;
    gap: 20px;
}

.col-6{
    width: 50%;
}

.single-product{
    width: 1080px;
    position: relative;
}
/** Breadcrumb **/

.single-product .breadcrumb{
    background: #48484810;
    padding: 8px 4px;
    border-radius: 8px;
    font-size: 15px;
}

.breadcrumb span{
    display: inline-flex;
    flex-direction: row;
    gap: 8px;
    margin-left: 8px;
}
.breadcrumb span:not(:last-child)::after{
    content: '/';
}

.breadcrumb span a{
    text-decoration: none;
    color: var(--primary-color);
}

/** product image **/

.single-product .product-image{
    width: 100%;
}

.product-image .product-image-main{
    position: relative;
    display: block;
    height: 480px;
    background: var(--bg-grey);
    padding: 10px;
}

.product-image-main img{
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.product-image-slider{
    display: flex;
    gap: 10px;
    margin: 10px 0;
}

.product-image-slider img{
    width: 90px;
    height: 90px;
    background: var(--bg-grey);
    padding: 6px;
    cursor: pointer;
}

/** product title **/

.product-title{
    margin-top: 20px;

}
.product-title h2{
    font-size: 32px;
    line-height: 2.4rem;
    font-weight: 700;
    letter-spacing: -0.02rem;
}

/** product rating **/
.product-rating{
    display: flex;
    margin-top: 4px;
    margin-bottom: 10px;
    align-items: center;
}

.product-rating span:not(:last-child){
    color: #ffc600;
}
.product-rating .review{
    color: var(--grey);
    font-size: 12px;
    font-weight: 500;
}
/** Product price **/
.product-price{
    display: flex;
    position: relative;
    margin: 10px 0;
    align-items: center;
}

.product-price .offer-price{
    font-size: 48px;
    font-weight: 700;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type="number"] {
  -moz-appearance: textfield;
}



.product-price .sale-price{
    font-size: 22px;
    font-weight: 500;
    text-decoration: line-through;
    color: var(--grey);
    margin-left: 12px;
}

/** Product Details **/
.product-details{
    margin: 10px 0;
}
.product-details h3{
    font-size: 18px;
    font-weight: 500;
}
.product-details p{
    margin: 5px 0;
    font-size: 14px;
    line-height: 1.2rem;
}

/** Product size **/
.product-size{
    margin: 10px 0;
}
.product-size h4{
    font-size: 16px;
    font-weight: 500;
}

.product-size .size-layout{
    margin: 5px 0;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}

.product-size .size-layout .size-input{
    display: none;
}
.product-size .size-layout .size{
    background: var(--bg-grey);
    padding: 10px 18px;
    border: 1px solid var(--bg-grey);
    border-radius: 4px;
    margin-left: 0px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
}
.product-size .size-layout .size:hover{
    border: 1px solid var(--grey);
}

.product-size .size-layout input[type="radio"]:checked + .size{
    background-color: rgb(35, 35, 35);
    border: 1px solid var(--grey);
    color: var(--bg-grey);
    box-shadow: 0 3px 6px var(--shadow);

}

.input-container {
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 8px;
      padding: 10px;
      background-color: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #quantity {
      margin-top: 10px;
      width: 100px;
      padding: 10px;
      text-align: center;
      font-size: 16px;
      border: 2px solid #ccc;
      border-radius: 8px;
      outline: none;
      transition: border-color 0.3s;
    }

   

/** Product Color **/
.product-color{
    margin: 10px 0;
    justify-content: center;
}
.product-color h4{
    font-size: 16px;
    font-weight: 500;
}
.product-color .color-layout{
    margin: 5px 0;
    display: flex;
    gap: 10px;
}

.product-color .color-layout label{
    border-radius: 4px;
    cursor: pointer;
    content: '';
    width: 40px;
    height: 40px;
    display: inline-block;
}

.product-color .color-layout .black{
    
    background-color: black;
}

.product-color .color-layout .red{
    background-color: red;
}
.product-color .color-layout .blue{
    background-color: blue;
}

.product-color .color-layout input[type="radio"]:checked + label{
    box-shadow: 0 3px 6px var(--shadow);
}

.product-color .color-layout .color-input{
    display: none;
}


/** divider **/
.divider{
    display: block;
    height: 1px;
    width: 100%;
    background: #48484830;
    margin: 20px 0;
}

/** product Button Group **/

.product-btn-group{
    display: flex;
    gap: 15px;
}
.product-btn-group .button{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    padding: 10px 24px;
    font-size: 16px;
    font-weight: 500;
}
.product-btn-group .buy-now{
    background-color: var(--accent-color);
    color: #fff;
    border: 1px solid var(--accent-color);
    border-radius: 4px;
    cursor: pointer;
}

.product-btn-group .buy-now i{
    font-size: 20px;
}
.product-btn-group .buy-now:hover{
    box-shadow: 0 3px 6px var(--shadow);
}

.product-btn-group .add-cart{
    
    background-color: var(--bg-grey);
    color: var(--grey);
    border-radius: 4px;
    cursor: pointer;
}
.product-btn-group .add-cart i{
    font-size: 20px;
}
.product-btn-group .add-cart:hover{
    box-shadow: 0 3px 6px var(--shadow);
    background: var(--grey);
    color: #fff;
}
.product-btn-group .heart{
    color: var(--grey);
    cursor: pointer;
}
.product-btn-group .heart i{
    font-size: 20px;
}
.product-btn-group .heart:hover{
    color: var(--accent-color);
}




@media screen and (max-width:520px) {
    .container{
        padding: 20px;

        padding-top: 0px;
        height: auto;
    }
    .row{
        display: block;
    }

    .col-6{
        width: 100%;
        display: block;
    }
    .single-product{
        width: 100%;
        position: relative;
    }

    .product-image .product-image-main{
        width: 100%;
        height: 280px;
    }
    .product-image-slider{
        gap: 5px;
    }

    .breadcrumb{
        display: none;
    }

    .product-title h2{
        font-size: 24px;
        line-height: 1.6rem;
    }
    .product-size{
        display: block;
    }
    .product-size .size-layout{
        display: block;
        margin: 10px 0;

    }
    .product-size .size-layout .size{
        padding: 6px 10px;
    }
    .product-btn-group{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
}




.testimonial-container {
  background-color: rgba(255, 69, 0, .5);
  color: #fff;
  border-radius: 15px;
  margin: 20px auto;
  padding: 50px 80px;
  max-width: 768px;
  width: 90%;
}

.fa-quote {
  color:red;
  font-size: 28px;
  position: absolute;
  top: 70px;
}

.fa-quote-left {
  left: 40px;
}

.fa-quote-right {
  right: 40px;
}

.testimonial {
 margin-top: 30px;
  line-height: 28px;
  text-align: center;
}

.user {
  display: flex;
  align-items: center;
  justify-content: center;
}

.user .user-image {
  border-radius: 50%;
  height: 75px;
  width: 75px;
  object-fit: cover;
}

.user .user-details {

  margin-left: 10px;
}

.user .username {
  margin-top: 30px;
}

.user .role {
  font-weight: normal;
  margin: 10px 0;
}





.containerfeedback {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  padding: 0 20px;
}

.rating {
  display: flex;
  width: 100%;
  justify-content: center;
  overflow: hidden;
  flex-direction: row-reverse;
  height: 150px;
  position: relative;
}

.rating-0 {
  filter: grayscale(100%);
}

.rating > input {
  display: none;
}

.rating > label {
  cursor: pointer;
  width: 40px;
  height: 40px;
  margin-top: auto;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 76%;
  transition: .3s;
}

.rating > input:checked ~ label,
.rating > input:checked ~ label ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23FF4500' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}


.rating > input:not(:checked) ~ label:hover,
.rating > input:not(:checked) ~ label:hover ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23FF4500' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}

.emoji-wrapper {
  width: 100%;
  text-align: center;
  height: 100px;
  overflow: hidden;
  position: absolute;
  top: 0;
  left: 0;
}

.emoji-wrapper:before,
.emoji-wrapper:after{
  content: "";
  height: 15px;
  width: 100%;
  position: absolute;
  left: 0;
  z-index: 1;
}

.emoji-wrapper:before {
  top: 0;
  background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji-wrapper:after{
  bottom: 0;
  background: linear-gradient(to top, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji {
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: .3s;
}

.emoji > svg {
  margin: 15px 0; 
  width: 70px;
  height: 70px;
  flex-shrink: 0;
}

#rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
#rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
#rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
#rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
#rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }

.feedback {
  max-width: 360px;
  background-color: #fff;
  width: 100%;
  padding: 30px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-items: center;
  box-shadow: 0 4px 30px rgba(0,0,0,.05);
}





.review_form {

    margin: auto;
    max-width: 300px;
    width: 90%; 
     font-family: 'Poppins', sans-serif;

}



.review_form textarea {
    position: relative;
  width: 100%;
  padding: 10px;
  min-height: 200px;
  background: #f5f5f5;
  color: #333;
  border:none;
  outline: none;
  font-family: 'Poppins', sans-serif;
  margin: 8px 0;
  font-size: 14px;
  letter-spacing: 1px;
  font-weight: 400;
}








.progress-bar {
  background-color: #fff;
  border-radius:100px;
  height: 4px;
  width: 100%;
  transform-origin: left;
  animation: grow 10s linear infinite;
}

@keyframes grow {
  0% {
    transform: scaleX(0);
  }
}

@media (max-width: 768px) {
  .testimonial-container {
    padding: 20px 30px;
  }

  .fa-quote {
    display: none;
  }
}
        
.prods {
    margin: auto;
    display: flex;
    flex-direction: row;
    max-width: 1000px;
    width: 100%;
    flex-wrap: wrap;
    overflow: hidden;
    height: auto;
}

.prods div {
    margin: 20px auto;
}
.prodcard {
    background-position: cover;
    width: 170px;
    height: 200px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    overflow: hidden; 
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    transition: transform 0.3s; 
}

.prodcard img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important; 
}

.prodcard:hover {
    transform: scale(1.05);
    box-shadow: 0 1rem 1rem 0 #85929e8a;
}


@media  (min-width: 520px ) and (max-width: 1080px) {
   .container{
    display: block;
    height: auto;
    padding: 20px;
   }
    
}
    </style>
</head>
<body>
   <div class="button buy-now" onclick="window.location.href='index.php'"  style="    background-color: #F4F4F4;
    color: #FF4500;
    border: 1px solid #FF4500;
    border-radius: 4px;
    width: 110px;
    padding: 5px;
    margin: 50px auto;
    text-align: center;
    cursor: pointer;"><i class="bx bxs-left-arrow"></i> Go Back</div>


<?php
include '../db_conn.php';

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $review_sql = "SELECT * FROM reviews WHERE product_id = ?";
        $review_stmt = $conn->prepare($review_sql);
        $review_stmt->bind_param("i", $product_id);
        $review_stmt->execute();
        $review_result = $review_stmt->get_result();

        $review_count = $review_result->num_rows;

        $total_rating = 0;
        while ($review = $review_result->fetch_assoc()) {
            $total_rating += $review['rating'];
        }
        $average_rating = $review_count > 0 ? $total_rating / $review_count : 0;

        echo '<div class="container" style="">
                <div class="single-product">
                    <div class="row">
                        <div class="col-6" >
                            <div class="product-image" >
                                <div class="product-image-main">
                                    <img src="../assets/img/' . $row["imgsrc"] . '" id="product-main-image">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="product">
                                <div class="product-title">
                                    <h2>' . $row["name"] . '</h2>
                                </div>
                                <div class="product-rating">';
        
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $average_rating) {
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: #FF4500;transform: ;msFilter:;"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>';
            } else {
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: #FF4500;transform: ;msFilter:;"><path d="m6.516 14.323-1.49 6.452a.998.998 0 0 0 1.529 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082a1 1 0 0 0-.59-1.74l-5.701-.454-2.467-5.461a.998.998 0 0 0-1.822 0L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.214 4.107zm2.853-4.326a.998.998 0 0 0 .832-.586L12 5.43l1.799 3.981a.998.998 0 0 0 .832.586l3.972.315-3.271 2.944c-.284.256-.397.65-.293 1.018l1.253 4.385-3.736-2.491a.995.995 0 0 0-1.109 0l-3.904 2.603 1.05-4.546a1 1 0 0 0-.276-.94l-3.038-2.962 4.09-.326z"></path></svg>';
            }
        }

        echo '<span class="review" style="margin-left:5px">(' . $review_count . ' Reviews)</span>
        </div>
        <div class="product-price">
            <span class="offer-price">PHP ' . $row["price"] . '</span>
        </div>
        <div class="product-details">
            <h3>Description</h3>
            <p>' . $row["description"] . '</p>
        </div>
        <div class="product-size">
            <h4>Quantity</h4>
                <input type="number" value="1" min="1" max="' . $row["stock_quantity"] . '" id="quantity">
      
        </div>
   
        <span class="divider"></span>
        <div class="product-btn-group" style="flex-wrap: wrap">
            <div class="button buy-now"><i class="bx bxs-zap"></i> Buy Now</div>

              <form class="productForm" id="addToCartForm" method="POST">
    <input type="hidden" name="user_id" id="user_id" value="'. $user_id .'"> 
    <input type="hidden" name="product_id" id="product_id" value="' . $product_id . '"> 
    <input type="hidden" name="quantity" id="new-input-container" placeholder="Quantity" required>
    <div class="button add-cart"><i class="bx bxs-cart"></i> Add to Cart</div>
    </form>

        </div>
    </div>
</div>
</div>
</div>
</div>';


    } else {
        echo "Product not found.";
    }

    $stmt->close();
    $review_stmt->close();
} else {
    echo "No product ID provided.";
}

$conn->close();
?>



<section style="margin-top: 50px;margin-bottom: 50px;">
    <div style="text-align: center;">Related Products</div>

  <?php
include '../db_conn.php';

$product_id = $_POST['product_id'];
$sql_category = "SELECT category_id FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql_category);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->bind_result($category_id);
$stmt->fetch();
$stmt->close();

if (!$category_id) {
    echo "Product not found.";
    $conn->close();
    exit;
}

$sql = "SELECT product_id, imgsrc FROM products WHERE category_id = ? AND product_id != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $category_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '<div class="prods">';
    while ($row = $result->fetch_assoc()) {
        $related_product_id = $row["product_id"];
        $imgsrc = $row["imgsrc"];
        
        echo '<div class="prodcard" onclick="submitForm(' . $related_product_id . ')">';
        echo '<img src="../assets/img/' . $imgsrc . '"  style="height:100px;width:100px" />';
        
        echo '<form class="productForm" method="POST" action="view_product.php" style="display: none;">';
        echo '<input type="hidden" name="product_id" value="' . $related_product_id . '" />';
        echo '</form>';
        
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "<center style='font-size:10px'>No related products found.</center>";
}

$conn->close();
?>

<script>
function submitForm(productId) {
    const form = document.querySelector('input[name="product_id"][value="' + productId + '"]').closest('form');
    form.submit();
}
</script>

</section>



<?php
include '../db_conn.php';

$product_id = $_POST['product_id'];

$sql = "SELECT reviews.review, reviews.user_id, users.full_name 
        FROM reviews 
        INNER JOIN users ON reviews.user_id = users.user_id
        WHERE reviews.product_id = ? 
        LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

$testimonial = null;

if ($result->num_rows > 0) {
    $testimonial = $result->fetch_assoc();
}

$stmt->close();
$conn->close();
?>

<section style="margin-top: 50px;margin-bottom: 150px;">
       <div style="text-align: center;">Product Reviews</div>
    <div style="text-align: center;">
        <?php if ($testimonial): ?>
            <div class="testimonial-container">
                <div class="progress-bar"></div>
                <div class="fas fa-quote-left fa-quote"></div>
                <div class="fas fa-quote-right fa-quote"></div>
                <p class="testimonial">
                    <?php echo htmlspecialchars($testimonial['review']); ?>
                </p>
                <div class="user">
                    <div class="user-details">
                        <p class="username" style="font-style: italic;font-size: 12px;">
                            <?php echo htmlspecialchars($testimonial['full_name']); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <center style='font-size:10px'>No reviews found for this product.</center>
        <?php endif; ?>
    </div>
</section>


<section style="margin-top: 50px;margin-bottom: 150px;">
       <div style="text-align: center;">Submit A Review</div>
       <div class="containerfeedback">
  <div class="feedback">
    <div class="rating">
      <input type="radio" name="rating" id="rating-5">
      <label for="rating-5"></label>
      <input type="radio" name="rating" id="rating-4">
      <label for="rating-4"></label>
      <input type="radio" name="rating" id="rating-3">
      <label for="rating-3"></label>
      <input type="radio" name="rating" id="rating-2">
      <label for="rating-2"></label>
      <input type="radio" name="rating" id="rating-1">
      <label for="rating-1"></label>

    

      <div class="emoji-wrapper">
        <div class="emoji">
          <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <circle cx="256" cy="256" r="256" fill="#FDAA48"/>
          <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
          <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
          <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
          <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
          <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
          <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
          <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
          <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
        </svg>
          <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <circle cx="256" cy="256" r="256" fill="#FDAA48"/>
          <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
          <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
          <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
          <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
          <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
          <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
          <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
          <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
          <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
          <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
        </svg>
          <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <circle cx="256" cy="256" r="256" fill="#FDAA48"/>
          <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
          <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
          <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
          <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
          <g fill="#fff">
            <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
            <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
          </g>
          <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
          <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
        </svg>
          <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <circle cx="256" cy="256" r="256" fill="#FDAA48"/>
    <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
    <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
    <g fill="#fff">
      <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
      <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
    </g>
    <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
    <g fill="#fff">
      <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
      <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
    </g>
    <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
    <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
  </svg>
          <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <circle cx="256" cy="256" r="256" fill="#FDAA48"/>
          <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
          <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
          <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
          <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
          <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
          <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
          <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
          <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
          <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
        </svg>
          <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <g fill="#FDAA48">
            <circle cx="256" cy="256" r="256"/>
            <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
          </g>
          <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
          <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
          <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
          <g fill="#38c0dc">
            <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
          </g>
          <g fill="#d23f77">
            <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
          </g>
          <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
          <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
          <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
        </svg>
        </div>
      </div>
    </div>
  </div>
</div>
    
<form class="review_form" id="review_form">
    <input id="starrating" value="" type="hidden" name="ratingamount">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>"> 
    <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id; ?>"> 

    <textarea placeholder="Write your review here..." name="review"></textarea>
    <div class="button submitreviewbtn" style="background-color: #FF4500; color: white; border-radius: 4px; width: 110px; padding: 5px; margin: 0px auto; text-align: center; float: right; cursor: pointer;">
        <i class="bx bxs-star"></i> Submit
    </div>
</form>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {

    document.querySelector(".submitreviewbtn").addEventListener("click", function (e) {
        e.preventDefault();

        var reviewText = document.querySelector("textarea[name='review']").value;
        var rating = document.getElementById("starrating").value;
        var userId = document.getElementById("user_id").value;
        var productId = document.getElementById("product_id").value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "submit_review.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert("Review submitted successfully!");
                window.location.reload();
            }
        };
        xhr.onerror = function () {
            alert("There was an error submitting the review. Please try again.");
        };
        xhr.send("review=" + encodeURIComponent(reviewText) + "&rating=" + encodeURIComponent(rating) + "&user_id=" + encodeURIComponent(userId) + "&product_id=" + encodeURIComponent(productId));
    });

    const radioButtons = document.querySelectorAll('input[name="rating"]');
    const starrating = document.getElementById('starrating');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.checked) {
                starrating.value = this.id.split('-')[1];
            }
        });
    });

    function checkRating() {
        const rating = document.getElementById("starrating").value;
        const reviewForm = document.getElementById("review_form");

        if (parseFloat(rating) >= 1) {
            reviewForm.style.display = "block";
        } else {
            reviewForm.style.display = "none";
        }
    }

    setInterval(checkRating, 100);

});

</script>
</section>




<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {

    document.querySelector(".add-cart").addEventListener("click", function (e) {
        e.preventDefault();

        var userId = document.getElementById("user_id").value;
        var productId = document.getElementById("product_id").value;
        var quantity = document.getElementById("quantity").value;

        if (quantity === "" || isNaN(quantity) || parseInt(quantity) <= 0) {
            alert("Please enter a valid quantity.");
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'addtocart.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.onerror = function () {
            alert("Error adding to cart. Please try again.");
        };
        xhr.send("user_id=" + userId + "&product_id=" + productId + "&quantity=" + quantity);
    });

    const testimonialsContainer = document.querySelector(".testimonials-container");
    const testimonial = document.querySelector(".testimonial");
    const username = document.querySelector(".username");

    const testimonials = [];
    var productId = <?php echo json_encode($_POST['product_id']); ?>;

    var xhrReviews = new XMLHttpRequest();
    xhrReviews.open("GET", 'get_reviews.php?product_id=' + productId, true);
    xhrReviews.onload = function () {
        if (xhrReviews.status === 200) {
            var data = JSON.parse(xhrReviews.responseText);
            if (data.message) {
                console.log(data.message);
            } else {
                data.forEach(function (review) {
                    testimonials.push({
                        name: review.review,
                        text: review.user_id
                    });
                });
                console.log(testimonials);
            }
        } else {
            console.log('Error fetching reviews.');
        }
    };
    xhrReviews.onerror = function () {
        console.log('Error fetching reviews.');
    };
    xhrReviews.send();

    let index = 1;
    const updateTestimonial = () => {
        if (testimonials.length > 0) {
            const { name, text } = testimonials[index];
            testimonial.innerHTML = name;
            username.innerHTML = text;
            index++;
            if (index >= testimonials.length) index = 0;
        }
    };
    setInterval(updateTestimonial, 10000);

    document.getElementById('quantity').addEventListener('input', function () {
        var max = parseInt(this.max);
        var value = this.value === '' ? 1 : parseInt(this.value);

        if (value > max) {
            alert('Quantity exceeds the maximum available stock!');
            this.value = max;
        } else {
            this.value = value;
        }
    });

    var prodcards = document.querySelectorAll('.prodcard');
    prodcards.forEach(function (prodcard) {
        prodcard.addEventListener('click', function () {
            var productId = this.getAttribute('data-product-id');
            var form = this.nextElementSibling.querySelector('.productForm');
            form.querySelector('input[name="product_id"]').value = productId;
            form.submit();
        });
    });

    const quantityInput = document.getElementById('quantity');
    const newInputContainer = document.getElementById('new-input-container');
    newInputContainer.value = quantityInput.value;

    quantityInput.addEventListener('input', function () {
        newInputContainer.value = quantityInput.value;
    });

});

</script>

<script src="assets/js/main.js"></script>
</body>
</html>
