<!DOCTYPE html>
<html lang="en">

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

  <body >

 <?php include('nav.php'); ?>


    <section class="background firstsecton" id="Home">
      <div class="box-main">
        <div class="firsthalf">
          <p class="text-big">Night City is calling</p>
          <p class="text-small">
            Become the cyber-enhanced mercenery, V, <br />and explore the futuristic world of
            Cyberpunk 2077.<br />
          </p>
          <div class="button">
            <button class="btnclick" style="background: orangered;color: white;">Buy Now</button>
          </div>
        </div>
      </div>
    </section>

  
    <section class="background1 thirdsection">
      <div class="box-main1">
        <p class="textbig1">THIS MONTH</p>
        <p class="textbig2">ONLINE GAMES</p>
        <p class="textsmall1">
          Check out this month's biggest releases along with <br />
          dedicated features,guides and more.
        </p>

        
        <div class="button-3">
          <button class="card-1"></button>
          <button class="card-2"></button>
          <button class="card-3"></button>
        </div>
        
                <button class="btnclick" style="margin-bottom: 40px;">Find out more</button>
      </div>
    </section>

    <section class="fourthsection">
      <div class="box-main2">
        <p class="text1">PLAY HAS NO LIMIT</p>
        <p class="textbig3">Introducing PlayStation 5</p>
        <p class="textsmall2">Unleash new gaming possibilities that you never anticipated</p>
      </div>
    </section>

    <section class="fifthsection" id="Hardware">
      <div class="box-main3" >
        <div class="main-p">
          <p class="textbig4">PlayStation 5 Console</p>
          <p class="textsmall3">
            Experience an all-new generation of incredible<br />PlayStation games.
          </p>
          <div class="button-4">
            <button class="btnclick">Learn more</button>
          </div>
        </div>

        <div class="playstationimg">
          <img src="./assets/img/Playstation.png" alt="PlayStation" />
        </div>

      </div>
    </section>

    <section class="background2 sixthsection" >
      <div class="main-box4">
        <img src="assets/img/header20logo.png" alt="Elden" />
        <p class="textbig5">A new fantasy world</p>
        <p class="textsmall4">
          Become the Elden Lord in an epic adventure from Hidetaka Miyazaki<br />
          (Dark Souls) and George R. R. Martin (A Song of Ice and Fire), out<br />
          February 25 on PS4 & PS5
        </p>
        <div class="button-5">
          <button class="btnclick">Pre-order now</button>
        </div>
      </div>
    </section>

    
  <section id="Shop">
  <div style="text-align: center;margin-top: 50px;padding: 30px;">
    <div class="box-main2">
      <p class="text1">POPULAR PRODUCTS</p>
      <p class="textsmall2">Great console games available now.</p>
    </div>
  </div>

  <?php
  include 'db_conn.php';
  $min_view = 10;
  $sql = "
SELECT p.product_id, p.imgsrc, p.category_id
FROM products p
WHERE p.views > $min_view
AND p.category_id IN (
    SELECT DISTINCT p2.category_id
    FROM products p2
    WHERE p2.views > $min_view
)
ORDER BY p.views DESC
";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo '<div class="prods">';
      while($row = $result->fetch_assoc()) {
          $product_id = $row["product_id"];
          $imgsrc = $row["imgsrc"];
          
          echo '<div class="prodcard" data-product-id="' . $product_id . '">';
          echo '<img src="assets/img/' . $imgsrc . '" />';
          echo '</div>';
          
          echo '<form class="productForm" method="POST" action="view_product.php" style="display: none;">';
          echo '<input type="hidden" name="product_id" value="' . $product_id . '" />';
          echo '</form>';
      }
      echo '</div>';
  } else {
      echo "No products found.";
  }

  $conn->close();
  ?>

</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const prodCards = document.querySelectorAll('.prodcard');
  
  prodCards.forEach(prodCard => {
    prodCard.addEventListener('click', function() {
      const productId = prodCard.dataset.productId;
      
      // Log to see the product card's next sibling and check the structure
      console.log("Clicked product card:", prodCard);
      
      // Ensure next sibling exists and is a form
      const nextSibling = prodCard.nextElementSibling;
      console.log("Next sibling of product card:", nextSibling); // Log the next sibling

      // Check if the next sibling is a valid form element
      if (nextSibling && nextSibling.classList && nextSibling.classList.contains('productForm')) {
        const form = nextSibling;
        const input = form.querySelector('input[name="product_id"]');
        input.value = productId;
        form.submit();
      } else {
        console.error("Product form not found for product ID:", productId);
      }
    });
  });
});
</script>








</section>








    <section class="nba">
      <div class="nba-main">
        <div class="nbaimg">
          <img src="assets/img/nba.jpg" alt="NBA2K22" />
        </div>
        <div class="main-n">
          <p class="textnba">NBA 2K22 MyTEAM offer</p>
          <p class="textnba1">
            Join PlayStation Plus and get three NBA 2K22 MyTEAM Packs each month* for as long<br />
            as you are a member through March 2022. An NBA 2K account is required to open<br />
            MyTEAM Packs in MyTEAM Mode.
          </p>
          <div class="button-nba">
            <button class="btnclick">Learn more</button>
          </div>
        </div>
      </div>
    </section>

    <section class="specialsection">
      <div class="mainspecial">
        <p class="sp1">The latest mutiplayer games</p>
        <p class="sp2">
          Join the PS Plus community in these online games, available now<br />Overcome dynamic
          battlegrounds with the help of your squad, an<br />
          exhilarating first-person shooter featuring all-out warfare on a massive scale.<br /><br />NBA
          2K22<br /><br />
          Craft a roster composed of current stars and NBA legends and build<br />
          your own dream team in NBA 2K22. Compete in real NBA and WNBA <br />environments for an
          immersive and authentic basketball experience.
        </p>
        <div class="sp">
          <button class="btnclick">Find out more</button>
        </div>
      </div>
    </section>

    <section class="eightsection" id="Services">
      <div class="main-box6">
        <p class="textbig6">Explore our Services on Store</p>
        <p class="textsmall6">
          Deep discounts, curated collections and seasonal sales on PS5, PS4 and PS VR hits, all in
          one<br />place.
        </p>
        <div class="button-7">
          <button class="deal-1"></button>
          <button class="deal-2"></button>
          <button class="deal-3"></button>
        </div>
      </div>
    </section>

    <section class="ninthsection background4">
      <div class="main-box7">
        <p class="textbig7">
          Limited time offer<br />
          on Playstation Store
        </p>
        <p class="textsmall7">
          These are the some limited time offers<br />
          for next months on Playstation platform and will not be avaliable any time soon.
        </p>
        <div class="offer1">
          <button class="btnclick">Explore the deals</button>
        </div>
        <p class="current">Current time:</p>

        <div class="datetime">
          <div class="date">
            <span id="dayname">Day</span>,
            <span id="month">Month</span>
            <span id="daynum">00</span>,
            <span id="year">Year</span>
          </div>
          <div class="time">
            <span id="hour">00</span>: <span id="minutes">00</span>:
            <span id="seconds">00</span>
            <span id="period">AM</span>
          </div>
        </div>
      </div>
    </section>

    <section class="ten">
      <div class="lastmain">
        <div class="ten1">
          <p>Follow us on other social media platform</p>
        </div>
        <div class="flogo">
          <a href="https://www.instagram.com/accounts/login/"
            ><img src="assets/img/insta.png" alt="instagram" class="insta"
          /></a>
          <a
            href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D"
            ><img src="assets/img/twit.png" alt="twitter" class="twit"
          /></a>
          <a href="https://www.youtube.com/"
            ><img src="assets/img/youtube.png" alt="youtube" class="youtube"
          /></a>
        </div>
      </div>
    </section>

    <footer class="foot">
      <p class="footertext">Copyright &copy; 2024 - All right reserved</p>
    </footer>
  </body>
</html>
