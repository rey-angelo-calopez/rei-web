
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



.second-card-row {
    margin-top: 50px;
}

.filter-container {
  margin-top: 80px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: space-between;
  align-content: space-between;
  flex-direction: row;
  gap: 20px;
  padding: 20px;
  border-radius: 10px;
}

.search-container input {
  padding: 10px;
  width: 100%;
  max-width: 300px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

.category-container select {
  padding: 10px;
  width: 100%;
  -webkit-appearance: none;  
    -moz-appearance: none;    
    appearance: none;  
  max-width: 250px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}
@media (max-width: 768px) {
  .filter-container {
    width: 100%;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    align-content: center;
  }
  
  .search-container input, .category-container select {
    width: 100%;
    max-width: 100%;
  }
}
    </style>
</head>
<body class="body">
    
<?php include('head.php'); ?>

<section class="main">
<?php include('nav.php'); ?>

    <div class="main--container">
        <div class="filter-container" style="display: flex; justify-content: space-between;">
            <div class="search-container">
                <input type="text" id="search" placeholder="Search...">
            </div>
            
            <div class="category-container">
                <select id="category">
                    <option value="all">All Categories</option>
                    <?php
                        include 'db_conn.php';
                        $category_sql = "SELECT * FROM categories";
                        $category_result = $conn->query($category_sql);
                        while ($category = $category_result->fetch_assoc()) {
                            echo "<option value='".$category['name']."'>".$category['name']."</option>";
                        }
                        $conn->close();
                    ?>
                </select>
            </div>
        </div>

        <div id="products-list" class="prods"></div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let allProducts = [];

    fetchProducts();

    document.getElementById("search").addEventListener("input", filterProducts);
    document.getElementById("category").addEventListener("change", filterProducts);

    function fetchProducts() {
        const url = `fetch_products.php`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                allProducts = data;
                filterProducts();
            })
            .catch(error => console.log('Error fetching products:', error));
    }

    function filterProducts() {
        const search = document.getElementById("search").value.toLowerCase();
        const category = document.getElementById("category").value;

        const filteredProducts = allProducts.filter(product => {
            const matchesSearch = product.prodname.toLowerCase().includes(search);
            const matchesCategory = category === 'all' || product.catname === category;
            return matchesSearch && matchesCategory;
        });

        displayProducts(filteredProducts);
    }

    function displayProducts(products) {
        let productsHtml = '';
        if (products.length > 0) {
            products.forEach(product => {
                productsHtml += `
                    <div class="prodcard" data-product-id="${product.product_id}">
                        <img src="./assets/img/${product.imgsrc}" alt="${product.prodname}" 
                             style="background: url('./assets/img/${product.imgsrc}'); object-fit: cover; display: block; margin: 0 auto;" />
                        <form class="productForm" action="view_product.php" method="POST">
                            <input type="hidden" name="product_id" value="${product.product_id}">
                        </form>
                    </div>
                `;
            });
        } else {
            productsHtml = '<p>No products found.</p>';
        }
        document.getElementById("products-list").innerHTML = productsHtml;

        bindProductCardClick();
    }

    function bindProductCardClick() {
        document.querySelectorAll('.prodcard').forEach(function(card) {
            card.addEventListener('click', function() {
                const productId = card.getAttribute('data-product-id');
                const form = card.querySelector('.productForm');
                form.querySelector('input[name="product_id"]').value = productId;
                form.submit();
            });
        });
    }
});
</script>





    <script src="assets/js/main.js"></script>
</body>
</html>