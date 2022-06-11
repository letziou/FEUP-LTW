<?php declare(strict_types = 1); 
      require_once('database/review.class.php');
?>

<?php function drawReviews(string $restaurantName, array $reviews) { ?>
  <h2>Reviews about <?=$restaurantName?></h2>
  <section id="review-container">
      <?php foreach ($reviews as $review) { ?>
        <article class="menu-item">
          <p><?=$review->id_User?></p>
          <p><?=$review->comment?></p>       
      </article>  
    <?php } ?> 
  </section>
<?php } ?>