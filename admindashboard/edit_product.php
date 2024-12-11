<?php
session_start();
include '../db_conn.php';

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
    align-items: left;
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


input {
    padding: 5px 10px;
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

@media only screen and (max-width: 767px) {



    input { width:100% }
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

    if (isset($_POST['delete'])) {
        $delete_sql = "DELETE FROM products WHERE product_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $product_id);
        if ($delete_stmt->execute()) {
            echo "Product deleted successfully";
        } else {
            echo "Error deleting product";
        }
        $delete_stmt->close();
    } else {
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
                            <div class="col-6" style="margin-bottom: 20px">
                                <div class="product-image">
                                    <div class="product-image-main">
                                        <img src="../assets/img/' . $row["imgsrc"] . '" id="product-main-image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product">
                                    <div class="">
                                        <div>Game Poster</div>
                                        <input type="file" id="productImage">
                                    </div>
                                    <div class="product-title">
                                        <div>Title</div>
                                        <input value="' . $row["name"] . '" id="edit_inputname">
                                        <input value="' . $row["product_id"] . '" type="hidden" id="edit_productid">
                                    </div>
                                    <div class="product-rating" style="display:none">';

            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $average_rating) {
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: #FF4500;"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>';
                } else {
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" style="fill: #FF4500;"><path d="m6.516 14.323-1.49 6.452a.998.998 0 0 0 1.529 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082a1 1 0 0 0-.59-1.74l-5.701-.454-2.467-5.461a.998.998 0 0 0-1.822 0L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.214 4.107zm2.853-4.326a.998.998 0 0 0 .832-.586L12 5.43l1.799 3.981a.998.998 0 0 0 .832.586l3.972.315-3.271 2.944c-.284.256-.397.65-.293 1.018l1.253 4.385-3.736-2.491a.995.995 0 0 0-1.109 0l-3.904 2.603 1.05-4.546a1 1 0 0 0-.276-.94l-3.038-2.962 4.09-.326z"></path></svg>';
                }
            }

            echo '<span class="review" style="margin-left:5px">(' . $review_count . ' Reviews)</span>
                                    </div>
                                    <div class="product-price" style="display:flex; flex-direction:column;justify-content:flex-start;">
                                        <div>Price</div>
                                        <div><input value="' . $row["price"] . '" id="edit_inputprice" class="numonly"></div>
                                    </div>
                                    <div class="product-details">
                                        <div>Description</div>
                                        <div><textarea id="edit_description" style="width:100%;min-height:150px;max-height:150px;padding:10px">' . $row["description"] . '</textarea></div>
                                    </div>
                                    <div class="product-size">
                                        <div>Available Stocks</div>
                                        <input value="' . $row["stock_quantity"] . '" id="edit_stockquantity" class="numonly">
                                    </div>
                                    <span class="divider"></span>
                                    <div class="product-btn-group" style="flex-wrap: wrap">
                                        <button type="submit" class="button buy-now" id="saveChangesButton"><i class="bx bxs-save"></i> Save Changes</button>
                                        <button type="button" class="button add-cart" id="deleteProductButton"><i class="bx bxs-delete"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<script type="text/javascript">
    document.getElementById(\'saveChangesButton\').addEventListener(\'click\', function() {
        var productId = document.getElementById(\'edit_productid\').value;
        var productName = document.getElementById(\'edit_inputname\').value;
        var productPrice = document.getElementById(\'edit_inputprice\').value;
        var productDescription = document.getElementById(\'edit_description\').value;
        var stockQuantity = document.getElementById(\'edit_stockquantity\').value;
        var productImage = document.getElementById(\'productImage\').files[0]; 

        var formData = new FormData();
        formData.append(\'product_id\', productId);
        formData.append(\'name\', productName);
        formData.append(\'price\', productPrice);
        formData.append(\'description\', productDescription);
        formData.append(\'stock_quantity\', stockQuantity);

        if (productImage) {
            formData.append(\'productImage\', productImage); 
        }

        var xhr = new XMLHttpRequest();
        xhr.open(\'POST\', \'update_this_product.php\', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert(\'Product updated successfully\');
                window.location.href = \'index.php\'; 
            } else {
                alert(\'Error updating product\');
            }
        };
        xhr.send(formData);
    });


    document.getElementById(\'deleteProductButton\').addEventListener(\'click\', function() {
        var productId = document.getElementById(\'edit_productid\').value;

        var confirmation = confirm("Are you sure you want to delete this product?");

        if (confirmation) {
            var xhr = new XMLHttpRequest();
            xhr.open(\'POST\', \'delete_this_product.php\', true);
            xhr.setRequestHeader(\'Content-Type\', \'application/x-www-form-urlencoded\');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert(\'Product deleted successfully\');
                    window.location.href = \'index.php\'; 
                } else {
                    alert(\'Error deleting product\');
                }
            };
            xhr.send(\'product_id=\' + encodeURIComponent(productId));
        } else {
            alert("Product deletion canceled.");
        }
    });
</script>
                </div>';
        } else {
            echo "Product not found.";
        }

        $stmt->close();
        $review_stmt->close();
    }
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



    




</section>



<script>
    document.addEventListener("DOMContentLoaded", function() {

    const inputs = document.querySelectorAll('.numonly');
    inputs.forEach(input => {
        input.addEventListener('input', function(event) {
            let value = event.target.value;
            value = value.replace(/[^0-9.]/g, '');

            const decimalCount = (value.match(/\./g) || []).length;
            if (decimalCount > 1) {
                value = value.replace(/\.+$/, '');
            }

            if (value.includes('.')) {
                const parts = value.split('.');
                parts[1] = parts[1].slice(0, 2);
                value = parts.join('.');
            }

            event.target.value = value;
        });
    });

    const testimonialsContainer = document.querySelector(".testimonials-container");
    const testimonial = document.querySelector(".testimonial");
    const username = document.querySelector(".username");

    const testimonials = [];
    const productId = <?php echo json_encode($_POST['product_id']); ?>;

    var xhrReviews = new XMLHttpRequest();
    xhrReviews.open("GET", 'get_reviews.php?product_id=' + productId, true);
    xhrReviews.onload = function () {
        if (xhrReviews.status === 200) {
            var data = JSON.parse(xhrReviews.responseText);
            if (data.message) {
                console.log(data.message);
            } else {
                data.forEach(function(testimonialData) {
                    testimonials.push({
                        name: testimonialData.review,
                        text: testimonialData.user_id
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

    document.getElementById('quantity').addEventListener('input', function() {
        var max = parseInt(this.max);
        var value = this.value === '' ? 1 : parseInt(this.value);

        if (value > max) {
            alert('Quantity exceeds the maximum available stock!');
            this.value = max;
        } else {
            this.value = value;
        }
    });

    const prodcards = document.querySelectorAll('.prodcard');
    prodcards.forEach(function(prodcard) {
        prodcard.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            var form = this.nextElementSibling.querySelector('.productForm');
            form.querySelector('input[name="product_id"]').value = productId;
            form.submit();
        });
    });

    const quantityInput = document.getElementById('quantity');
    const newInputContainer = document.getElementById('new-input-container');
    newInputContainer.value = quantityInput.value;
    
    quantityInput.addEventListener('input', function() {
        newInputContainer.value = quantityInput.value;
    });
});

</script>

<script src="assets/js/main.js"></script>
</body>
</html>
