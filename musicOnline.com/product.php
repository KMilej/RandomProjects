

<?php
/*
  HF5735 Web Development: Dynamically Generated Content 
  Author: Kamil Milej | Date: 30.05.2025 
  Version: 1.0
*/


$pageTitle = 'Main';

include('header.php');

?>

<section class="advert">
<div class="advertising">
    <div class="slideshow">
        <img src="images/slide/slidepage1.jpg" class="slide" alt="Ad 1">
        <img src="images/slide/slidepage2.jpg" class="slide" alt="Ad 2">
        <img src="images/slide/slidepage3.jpg" class="slide" alt="Ad 3">
    </div>
</div>

<main>
    <div class="products">
        <div class="section-title">Home Page</div>
        <?php $products = getHomePageProducts(30) ?>
       
        <div class="product">
            <?php foreach($products as $product): ?> 
                <div class="productimg">
                    <img src="<?php echo "images/products/{$product['image']}" ?>" alt="">
                    <div class="productinfo">
                        <p class="title">
                            <a href="pages.php?id=<?php echo $product['id'] ?>">
                                <?php echo htmlspecialchars($product['title']); ?>
                            </a>
                        </p>
                        <p class="description">
                            <?php echo $product['description'] ?>
                        </p>
                        <p class="price">
                            <?php echo $product['price'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>   
</main>

<?php
include('footer.php');
?>
