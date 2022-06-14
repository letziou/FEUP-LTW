<?php declare(strict_types = 1); 
      require_once('database/review.class.php');
      require_once('util/session.php');
?>

<?php function drawReviews(Session $session, int $id_Restaurant, string $restaurantName, array $reviews) { ?>
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
  <?php if ($session->isLoggedIn()) drawReviewForm($session, $id_Restaurant);
    } ?>

<?php function drawReviewForm(Session $session, int $id_Restaurant) { ?>
    <div class="reviewForm">

      <h3> Write your review: </h3>
      <form action="/actions/action_createReview.php" id="formReview" method="post" class="postReview">
      <div class="form-content">
        <input id="Comment" type="comment" name="comment" placeholder="Write your thoughts"/>
        <p>Rating: 
          <select name="score" id="score">
            <option value="1">1/5</option>
            <option value="2">2/5</option>
            <option value="3">3/5</option>
            <option value="4">4/5</option>
            <option value="5">5/5</option>
          </select> 
        <input type="hidden" id="id_Restaurant" type="id_Restaurant" name="id_Restaurant" value=<?=$id_Restaurant?>  />
        </form> 
        </div>
        <span id=buttons>
          <button class="postReview_button" form="formReview"> Post Review</button>
          </br>
        </span> 
    </div> 

<?php } ?>