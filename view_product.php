<?php
session_start();
include 'db_conn.php';

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
    padding-top: 200px;
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


/** Responsive Mobile **/
@media screen and (max-width:520px) {
    .container{
        padding: 20px;

        padding-top: 100px;
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
   <?php include ('nav.php'); ?>

    <?php
include 'db_conn.php';

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
                        <div class="col-6">
                            <div class="product-image">
                                <div class="product-image-main">
                                    <img src="assets/img/' . $row["imgsrc"] . '" id="product-main-image">
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
                               
                           
                                <span class="divider"></span>
                                <div class="product-btn-group" style="flex-wrap: wrap" onclick="window.location.href=\'signinup.php\'">
                                    <div class="button buy-now"><i class="bx bxs-zap"></i> Login First</div>
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
include 'db_conn.php';

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
        echo '<img src="assets/img/' . $imgsrc . '" alt="Product image" />';
        
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
include 'db_conn.php';

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

<script type="text/javascript">
const testimonialsContainer = document.querySelector(".testimonials-container");
const testimonial = document.querySelector(".testimonial");
const username = document.querySelector(".username");

const testimonials = [];

document.addEventListener("DOMContentLoaded", function() {
  const productId = <?php echo json_encode($_POST['product_id']); ?>;

  fetch(`get_reviews.php?product_id=${productId}`)
    .then(response => response.json())
    .then(data => {
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
    })
    .catch(() => {
      console.log('Error fetching reviews.');
    });
});

let index = 1;

const updateTestimonial = () => {
  const { name, text } = testimonials[index];
  testimonial.innerHTML = name;
  username.innerHTML = text;
  index++;
  if (index > testimonials.length - 1) index = 0;
};

setInterval(updateTestimonial, 10000);

document.getElementById('quantity').addEventListener('input', function() {
  const max = parseInt(this.max);  
  const value = parseInt(this.value); 

  if (value > max) {
    alert('Quantity exceeds the maximum available stock!');
    this.value = max;  
  }
});

document.querySelectorAll('.prodcard').forEach(prodCard => {
  prodCard.addEventListener('click', function() {
    const productId = prodCard.dataset.productId;
    const form = prodCard.nextElementSibling.querySelector('.productForm');
    form.querySelector('input[name="product_id"]').value = productId;
    form.submit();
  });
});

</script>




</body>
</html>
