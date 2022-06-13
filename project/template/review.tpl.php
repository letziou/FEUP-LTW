<?php declare(strict_types = 1); 
      require_once('database/review.class.php');
      require_once('util/session.php');
?>

<?php function drawReviews(string $restaurantName, array $reviews) { ?>
  <h2>Reviews about <?=$restaurantName?></h2>
  <section id="review-container">
      <?php foreach ($reviews as $review) { ?>
        <article class="review">
          <span class="user"><?=$review->fname?> <?=$review->lname?></span>
          <span class="date"><?=$review->published?></span>
          <p><?=$review->text?></p>
          <span class="score"><?=$review->score?></span>       
      </article>  
    <?php } ?> 
  </section>
<?php } ?>

<?php function drawReviewForm(Session $session, int $id_Restaurant) { ?>
    <div class="reviewForm">

      <h3> Write your review: </h3>
      <form action="/actions/action_createReview.php" id="formReview" method="post" class="postReview">
      <div class="form-content">
        <input id="Comment" type="comment" name="comment" placeholder="Write your thoughts" />
        <input id="Score" type="score" name="score" placeholder="score" />
        <input type="hidden" id="id_Restaurant" type="id_Restaurant" name="id_Restaurant" value=<?=$id_Restaurant?>  />
        </form> 
        </div>
        <span id=buttons>
          <button class="postReview_button" form="formReview"> Post Review</button>
          </br>
        </span> 
    </div> 

<?php } ?>