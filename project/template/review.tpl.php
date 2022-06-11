<?php declare(strict_types = 1); 
      require_once('database/review.class.php');
?>

<?php function drawReviews(string $restaurantName, array $reviews) { ?>
  <h2>Reviews about <?=$restaurantName?></h2>
  <section id="review-container">
      <?php foreach ($reviews as $review) { ?>
        <article class="review">
          <span class="user"><?=$review->id_User?></span>
          <span class="date"><?=$review->published?></span>
          <p><?=$review->comment?></p>
          <span class="score"><?=$review->score?></span>       
      </article>  
    <?php } ?> 
  </section>
<?php } ?>